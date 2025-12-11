<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class StagingTools extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static string $view = 'filament.pages.staging-tools';

    protected static ?string $navigationGroup = 'System';
    protected static ?string $title = 'Database Tools';
    protected static ?int $navigationSort = 99;

    public $migrationOutput = '';
    public $exportOutput = '';
    public $isRunningMigration = false;
    public $isRunningExport = false;

    public function mount()
    {
        // Check if we should show this page based on environment
        if (!in_array(app()->environment(), ['local', 'staging'])) {
            abort(404);
        }
    }

    public function runMigrations()
    {
        $this->isRunningMigration = true;
        $this->migrationOutput = 'Running migrations...' . PHP_EOL;

        try {
            // Run migrations with force option
            Artisan::call('migrate', [
                '--force' => true,
            ]);

            $output = Artisan::output();
            $this->migrationOutput .= $output . PHP_EOL;
            $this->migrationOutput .= 'Migrations completed successfully!' . PHP_EOL;

        } catch (\Exception $e) {
            $this->migrationOutput .= 'Error: ' . $e->getMessage() . PHP_EOL;
            Log::error('Migration failed in staging tools: ' . $e->getMessage());
        } finally {
            $this->isRunningMigration = false;
        }
    }

    public function exportDatabase()
    {
        $this->isRunningExport = true;
        $this->exportOutput = 'Starting database export...' . PHP_EOL;

        try {
            // Create db_dump directory if it doesn't exist
            $dumpDir = base_path('db_dump');
            if (!File::exists($dumpDir)) {
                File::makeDirectory($dumpDir, 0755, true);
            }

            $filename = 'database_dump_' . date('Y-m-d_H-i-s') . '.sql';
            $filePath = $dumpDir . '/' . $filename;

            $this->exportOutput .= 'Exporting database to: ' . $filePath . PHP_EOL;

            // Use the existing DatabaseDump command
            Artisan::call('db:dump', [
                '--filename' => $filename,
            ]);

            $output = Artisan::output();
            $this->exportOutput .= $output . PHP_EOL;

            if (File::exists($filePath)) {
                $fileSize = number_format(filesize($filePath) / 1024 / 1024, 2);
                $this->exportOutput .= "Database export completed successfully! File size: {$fileSize} MB" . PHP_EOL;

                // Return the file for download
                return response()->download($filePath, 'database_export_' . date('Y-m-d_H-i-s') . '.sql');
            } else {
                $this->exportOutput .= 'Database export failed - file not created' . PHP_EOL;
            }

        } catch (\Exception $e) {
            $this->exportOutput .= 'Error: ' . $e->getMessage() . PHP_EOL;
            Log::error('Database export failed in staging tools: ' . $e->getMessage());
        } finally {
            $this->isRunningExport = false;
        }
    }

    public static function shouldRegisterNavigation(): bool
    {
        // Show this page in local and staging environments
        return in_array(app()->environment(), ['local', 'staging']);
    }
}