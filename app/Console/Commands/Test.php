<?php

namespace App\Console\Commands;

use App\Dto\ApiRowDto;
use App\Models\Row;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        dump(Carbon::createFromFormat(ApiRowDto::apiDateFormat, '2.10.2020'));
        //
    }
}
