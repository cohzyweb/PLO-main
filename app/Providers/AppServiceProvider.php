<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Event;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Spatie\Backup\Events\BackupWasSuccessful;
use App\Listeners\UploadBackupToDropbox;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // DB::listen(function ($query) {
        //     logger($query->sql);
        //     logger($query->bindings);
        // });

        // Storage::extend('dropbox', function (Application $app, array $config) {

        //     $adapter = new DropboxAdapter(new DropboxClient(
        //         $config['authorization_token']
        //     ));

        //     return new FilesystemAdapter(
        //         new Filesystem($adapter, $config),
        //         $adapter,
        //         $config
        //     );

        // });

        // Register backup event listener
        Event::listen(
            BackupWasSuccessful::class,
            UploadBackupToDropbox::class
        );
    }
}
