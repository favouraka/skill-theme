<x-filament::page>
    <div class="space-y-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4">Database Tools (Local/Staging)</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                This page provides tools for managing your database in local and staging environments.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Migration Section -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <h3 class="font-semibold text-gray-800 dark:text-gray-200 mb-3">Run Database Migrations</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                        Force run database migrations to update your database schema.
                    </p>

                    <x-filament::button
                        wire:click="runMigrations"
                        :disabled="$isRunningMigration"
                        color="primary"
                        class="w-full"
                    >
                        @if($isRunningMigration)
                            Running Migrations...
                        @else
                            Run Migrations
                        @endif
                    </x-filament::button>

                    @if($migrationOutput)
                        <div class="mt-4 p-3 bg-gray-100 dark:bg-gray-900 rounded border border-gray-200 dark:border-gray-700">
                            <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">Migration Output:</h4>
                            <pre class="text-sm text-gray-700 dark:text-gray-300 overflow-auto max-h-64 whitespace-pre-wrap">{{ $migrationOutput }}</pre>
                        </div>
                    @endif
                </div>

                <!-- Export Section -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <h3 class="font-semibold text-gray-800 dark:text-gray-200 mb-3">Export Database</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                        Export the entire database as an SQL file for backup or migration purposes. The file will download automatically.
                    </p>

                    <x-filament::button
                        wire:click="exportDatabase"
                        :disabled="$isRunningExport"
                        color="secondary"
                        class="w-full"
                    >
                        @if($isRunningExport)
                            Exporting Database...
                        @else
                            Export Database
                        @endif
                    </x-filament::button>

                    @if($exportOutput)
                        <div class="mt-4 p-3 bg-gray-100 dark:bg-gray-900 rounded border border-gray-200 dark:border-gray-700">
                            <h4 class="font-medium text-gray-800 dark:text-gray-200 mb-2">Export Output:</h4>
                            <pre class="text-sm text-gray-700 dark:text-gray-300 overflow-auto max-h-64 whitespace-pre-wrap">{{ $exportOutput }}</pre>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Environment Info -->
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow p-4">
            <h3 class="font-semibold text-gray-800 dark:text-gray-200 mb-2">Environment Information</h3>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-600 dark:text-gray-400">Current Environment:</span>
                <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                    {{ app()->environment() }}
                </span>
            </div>
        </div>
    </div>
</x-filament::page>