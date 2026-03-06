<?php

namespace App\Console\Commands;

use App\Services\DiaryService;
use Illuminate\Console\Command;

class FetchDiariesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'diary:fetch {cast}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch diaries of the specified cast.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        DiaryService::fetch($this->argument('cast'));
    }
}
