<?php

use App\Models\Cast;
use App\Console\Commands\FetchDiariesCommand;
use Illuminate\Support\Facades\Schedule;

/**
 * Fetch diaries of all casts.
 */
$casts = Cast::all();
foreach ($casts as $cast) {
    // if ($cast->id == 258) {
        Schedule::command(FetchDiariesCommand::class, [$cast->id])
            ->everyTenMinutes()
            ->withoutOverlapping();
    // }
}

Schedule::command('backup:clean')->daily()->at('01:50');
    // ->onSuccess(function () {
    //     \Log::info('Backup clean completed successfully.');
    // })
    // ->onFailure(function () {
    //     \Log::error('Backup clean failed.');
    // });
Schedule::command('backup:run')->daily()->at('02:00');
    // ->onSuccess(function () {
    //     \Log::info('Backup completed successfully.');
    // })
    // ->onFailure(function () {
    //     \Log::error('Backup failed.');
    // });
