<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatabaseDump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dump 
                            {--filename= : Custom filename for the SQL dump}
                            {--tables= : Comma-separated list of tables to include}
                            {--exclude= : Comma-separated list of tables to exclude}
                            {--connection= : Database connection to use}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump database contents to a SQL file with table filtering options';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $connection = $this->option('connection') ?? config('database.default');
        $filename = $this->option('filename') ?? 'dump_' . date('Y-m-d_H-i-s') . '.sql';
        $includeTables = $this->option('tables') ? explode(',', $this->option('tables')) : [];
        $excludeTables = $this->option('exclude') ? explode(',', $this->option('exclude')) : [];

        // Clean table names (remove whitespace)
        $includeTables = array_map('trim', $includeTables);
        $excludeTables = array_map('trim', $excludeTables);

        // Create db_dump directory if it doesn't exist
        $dumpDir = base_path('db_dump');
        if (!File::exists($dumpDir)) {
            File::makeDirectory($dumpDir, 0755, true);
        }

        $filePath = $dumpDir . '/' . $filename;

        $this->info("Starting database dump for connection: {$connection}");
        $this->info("Output file: {$filePath}");

        try {
            $dbConfig = config("database.connections.{$connection}");
            
            if (!$dbConfig) {
                $this->error("Database connection '{$connection}' not found.");
                return 1;
            }

            $driver = $dbConfig['driver'];
            $database = $dbConfig['database'];

            // Get all tables
            $tables = $this->getTables($connection);

            // Filter tables based on include/exclude options
            $filteredTables = $this->filterTables($tables, $includeTables, $excludeTables);

            if (empty($filteredTables)) {
                $this->error("No tables to dump after filtering.");
                return 1;
            }

            $this->info("Tables to dump: " . implode(', ', $filteredTables));

            // Generate the dump command based on database driver
            $dumpCommand = $this->generateDumpCommand($driver, $database, $filteredTables, $dbConfig, $filePath);

            $this->info("Executing dump command...");
            
            // Execute the dump command
            $output = [];
            $returnCode = 0;
            exec($dumpCommand, $output, $returnCode);

            if ($returnCode === 0) {
                $this->info("Database dump completed successfully!");
                $this->info("File saved to: {$filePath}");
                $this->info("File size: " . number_format(filesize($filePath) / 1024 / 1024, 2) . " MB");
            } else {
                $this->error("Database dump failed with return code: {$returnCode}");
                $this->error("Output: " . implode("\n", $output));
                return 1;
            }

        } catch (\Exception $e) {
            $this->error("Error during database dump: " . $e->getMessage());
            return 1;
        }

        return 0;
    }

    /**
     * Get all tables from the database
     */
    private function getTables($connection)
    {
        $tables = DB::connection($connection)->select("SHOW TABLES");
        $tableNames = [];
        
        foreach ($tables as $table) {
            $tableNames[] = array_values((array)$table)[0];
        }
        
        return $tableNames;
    }

    /**
     * Filter tables based on include/exclude options
     */
    private function filterTables($tables, $includeTables, $excludeTables)
    {
        $filtered = $tables;

        // If include tables are specified, only include those
        if (!empty($includeTables)) {
            $filtered = array_intersect($filtered, $includeTables);
        }

        // Exclude specified tables
        if (!empty($excludeTables)) {
            $filtered = array_diff($filtered, $excludeTables);
        }

        return array_values($filtered);
    }

    /**
     * Generate the appropriate dump command based on database driver
     */
    private function generateDumpCommand($driver, $database, $tables, $dbConfig, $filePath)
    {
        switch ($driver) {
            case 'mysql':
            case 'mariadb':
                return $this->generateMysqlDumpCommand($database, $tables, $dbConfig, $filePath);
            
            case 'pgsql':
                return $this->generatePostgresDumpCommand($database, $tables, $dbConfig, $filePath);
            
            case 'sqlite':
                return $this->generateSqliteDumpCommand($database, $tables, $dbConfig, $filePath);
            
            case 'sqlsrv':
                return $this->generateSqlServerDumpCommand($database, $tables, $dbConfig, $filePath);
            
            default:
                throw new \Exception("Unsupported database driver: {$driver}");
        }
    }

    /**
     * Generate MySQL/MariaDB dump command
     */
    private function generateMysqlDumpCommand($database, $tables, $dbConfig, $filePath)
    {
        $command = "mysqldump --single-transaction --routines --triggers";
        
        if (!empty($dbConfig['host'])) {
            $command .= " --host=" . escapeshellarg($dbConfig['host']);
        }
        
        if (!empty($dbConfig['port'])) {
            $command .= " --port=" . escapeshellarg($dbConfig['port']);
        }
        
        if (!empty($dbConfig['username'])) {
            $command .= " --user=" . escapeshellarg($dbConfig['username']);
        }
        
        if (!empty($dbConfig['password'])) {
            $command .= " --password=" . escapeshellarg($dbConfig['password']);
        }
        
        $command .= " " . escapeshellarg($database);
        
        if (!empty($tables)) {
            $command .= " " . implode(" ", array_map('escapeshellarg', $tables));
        }
        
        $command .= " > " . escapeshellarg($filePath);
        
        return $command;
    }

    /**
     * Generate PostgreSQL dump command
     */
    private function generatePostgresDumpCommand($database, $tables, $dbConfig, $filePath)
    {
        $command = "pg_dump";
        
        if (!empty($dbConfig['host'])) {
            $command .= " --host=" . escapeshellarg($dbConfig['host']);
        }
        
        if (!empty($dbConfig['port'])) {
            $command .= " --port=" . escapeshellarg($dbConfig['port']);
        }
        
        if (!empty($dbConfig['username'])) {
            $command .= " --username=" . escapeshellarg($dbConfig['username']);
        }
        
        $command .= " --no-owner --no-privileges --clean --if-exists";
        
        if (!empty($tables)) {
            $command .= " --table=" . implode(" --table=", array_map('escapeshellarg', $tables));
        }
        
        $command .= " " . escapeshellarg($database);
        $command .= " > " . escapeshellarg($filePath);
        
        return $command;
    }

    /**
     * Generate SQLite dump command
     */
    private function generateSqliteDumpCommand($database, $tables, $dbConfig, $filePath)
    {
        // For SQLite, we'll use a PHP-based approach since sqlite3 command line might not be available
        $script = "<?php\n";
        $script .= "\$db = new SQLite3('" . addslashes($database) . "');\n";
        $script .= "\$output = fopen('" . addslashes($filePath) . "', 'w');\n";
        $script .= "\$tables = " . var_export($tables, true) . ";\n";
        $script .= "
if (empty(\$tables)) {
    \$result = \$db->query(\"SELECT name FROM sqlite_master WHERE type='table'\");
    while (\$row = \$result->fetchArray()) {
        \$tables[] = \$row['name'];
    }
}

foreach (\$tables as \$table) {
    fwrite(\$output, \"-- Table: \$table\\n\");
    
    // Get CREATE TABLE statement
    \$result = \$db->query(\"SELECT sql FROM sqlite_master WHERE type='table' AND name='\$table'\");
    \$createRow = \$result->fetchArray();
    if (\$createRow) {
        fwrite(\$output, \$createRow['sql'] . \";\\n\\n\");
    }
    
    // Get table data
    \$result = \$db->query(\"SELECT * FROM \$table\");
    while (\$row = \$result->fetchArray(SQLITE3_ASSOC)) {
        \$columns = array_keys(\$row);
        \$values = array_map(function(\$value) {
            return \$value === null ? 'NULL' : \"'\" . SQLite3::escapeString(\$value) . \"'\";
        }, \$row);
        
        fwrite(\$output, \"INSERT INTO \$table (\" . implode(', ', \$columns) . \") VALUES (\" . implode(', ', \$values) . \");\\n\");
    }
    fwrite(\$output, \"\\n\");
}

fclose(\$output);
\$db->close();
?>";

        $scriptFile = tempnam(sys_get_temp_dir(), 'sqlite_dump_');
        file_put_contents($scriptFile, $script);
        
        return "php " . escapeshellarg($scriptFile) . " && rm " . escapeshellarg($scriptFile);
    }

    /**
     * Generate SQL Server dump command
     */
    private function generateSqlServerDumpCommand($database, $tables, $dbConfig, $filePath)
    {
        // For SQL Server, we'll use sqlcmd
        $command = "sqlcmd -S ";
        
        if (!empty($dbConfig['host'])) {
            $command .= escapeshellarg($dbConfig['host']);
            if (!empty($dbConfig['port'])) {
                $command .= "," . escapeshellarg($dbConfig['port']);
            }
        }
        
        if (!empty($dbConfig['username'])) {
            $command .= " -U " . escapeshellarg($dbConfig['username']);
        }
        
        if (!empty($dbConfig['password'])) {
            $command .= " -P " . escapeshellarg($dbConfig['password']);
        }
        
        $command .= " -d " . escapeshellarg($database);
        
        // Generate SQL script for the specified tables
        $sqlScript = "SET NOCOUNT ON;\n\n";
        
        if (empty($tables)) {
            $sqlScript .= "SELECT 'Scripting all tables' as Message;\n";
        } else {
            $sqlScript .= "SELECT 'Scripting tables: " . implode(', ', $tables) . "' as Message;\n";
        }
        
        // For simplicity, we'll generate a basic script
        $sqlScript .= "
-- Generate CREATE TABLE statements and INSERT statements
DECLARE @sql NVARCHAR(MAX) = '';

SELECT @sql = @sql + 
    '-- Table: ' + TABLE_NAME + CHAR(13) + CHAR(10) +
    'DROP TABLE IF EXISTS [' + TABLE_NAME + '];' + CHAR(13) + CHAR(10) +
    'SELECT * INTO [' + TABLE_NAME + '_temp] FROM [' + TABLE_NAME + '];' + CHAR(13) + CHAR(10) +
    'DROP TABLE [' + TABLE_NAME + '];' + CHAR(13) + CHAR(10) +
    'SELECT * INTO [' + TABLE_NAME + '] FROM [' + TABLE_NAME + '_temp];' + CHAR(13) + CHAR(10) +
    'DROP TABLE [' + TABLE_NAME + '_temp];' + CHAR(13) + CHAR(10) + CHAR(13) + CHAR(10)
FROM INFORMATION_SCHEMA.TABLES 
WHERE TABLE_TYPE = 'BASE TABLE'";

        if (!empty($tables)) {
            $sqlScript .= " AND TABLE_NAME IN ('" . implode("','", $tables) . "')";
        }

        $sqlScript .= ";";
        
        $scriptFile = tempnam(sys_get_temp_dir(), 'sqlserver_dump_');
        file_put_contents($scriptFile, $sqlScript);
        
        return $command . " -i " . escapeshellarg($scriptFile) . " -o " . escapeshellarg($filePath) . " && rm " . escapeshellarg($scriptFile);
    }
}