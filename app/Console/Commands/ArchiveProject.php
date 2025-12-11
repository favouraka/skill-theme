<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;
use Carbon\Carbon;

class ArchiveProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:archive 
                            {--E|exclude-env : Exclude .env file}
                            {--X|exclude-vendor : Exclude vendor directory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archive the project';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $excludeEnv = $this->option('exclude-env');
        $excludeVendor = $this->option('exclude-vendor');

        $timestamp = Carbon::now()->format('Y_m_d_H_i_s');
        $archiveName = "project_$timestamp.zip";

        $this->info("Creating project archive: $archiveName");

        $this->info("Excluding: node_modules, public/storage, storage/logs, db_dumps");
        if ($excludeEnv) {
            $this->info("Excluding: .env");
        }
        if ($excludeVendor) {
            $this->info("Excluding: vendor");
        }

        $zip = new ZipArchive();
        if ($zip->open($archiveName, ZipArchive::CREATE | ZipArchive::OVERWRITE)!== TRUE) {
            $this->error("Cannot open <$archiveName>");
            return 1;
        }

        // Get all files and directories to add
        $filesToAdd = [];
        $excludedDirs = [
            'node_modules',
            'public/storage',
            'storage/logs',
            'db_dump',
            'storage/app'
        ];

        if ($excludeEnv) {
            $excludedDirs[] = '.env';
        }
        if ($excludeVendor) {
            $excludedDirs[] = 'vendor';
        }

        // Build list of files to include
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(base_path(), \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $file) {
            $relativePath = substr($file->getRealPath(), strlen(base_path()) + 1);
            
            // Check if this file or any parent directory should be excluded
            $shouldExclude = false;
            foreach ($excludedDirs as $excludedDir) {
                if (strpos($relativePath, $excludedDir . '/') === 0 || $relativePath === $excludedDir) {
                    $shouldExclude = true;
                    break;
                }
            }
            
            if (!$shouldExclude) {
                $filesToAdd[] = [
                    'path' => $file->getRealPath(),
                    'relative' => $relativePath,
                    'is_dir' => $file->isDir()
                ];
            }
        }

        // Add files to archive
        foreach ($filesToAdd as $fileInfo) {
            if ($fileInfo['is_dir']) {
                $zip->addEmptyDir($fileInfo['relative']);
            } else {
                $zip->addFile($fileInfo['path'], $fileInfo['relative']);
            }
        }

        $zip->close();

        $this->info("Archive created successfully: $archiveName");
        $this->info("Size: " . $this->formatFileSize(filesize($archiveName)));
        
        return 0;
    }

    /**
     * Format file size in human readable format
     */
    private function formatFileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return '1 byte';
        } else {
            return '0 bytes';
        }
    }
}