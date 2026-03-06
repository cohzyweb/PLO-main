<?php

namespace App\Listeners;

use App\Services\DropboxService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Backup\Events\BackupWasSuccessful;

class UploadBackupToDropbox
{
    protected DropboxService $dropbox;

    public function __construct(DropboxService $dropbox)
    {
        $this->dropbox = $dropbox;
    }

    /**
     * Handle the event.
     */
    public function handle(BackupWasSuccessful $event): void
    {
        try {
            $backupDestination = $event->backupDestination;
            
            // Get all backup files from the destination
            $backupFiles = $backupDestination->getFiles();
            
            if (empty($backupFiles)) {
                Log::warning('No backup files found to upload to Dropbox');
                return;
            }

            // Get the latest backup file (last in array)
            $latestBackupFile = $backupFiles[count($backupFiles) - 1];
            
            // Read backup file content from backup disk
            $backupContent = Storage::disk('backup')->get($latestBackupFile);
            
            if (!$backupContent) {
                Log::error('Failed to read backup file: ' . $latestBackupFile);
                return;
            }

            // Dropbox folder path (can be configured via env)
            $dropboxFolder = env('DROPBOX_BACKUP_FOLDER', '/backups');
            $dropboxPath = rtrim($dropboxFolder, '/') . '/' . $latestBackupFile;

            // Upload to Dropbox
            $this->dropbox->uploadFile($dropboxPath, $backupContent);
            
            Log::info('Backup uploaded to Dropbox successfully: ' . $dropboxPath);
            
        } catch (\Exception $e) {
            Log::error('Failed to upload backup to Dropbox: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
