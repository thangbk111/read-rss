<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DisplayFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:display';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show post in a feed by feed id';

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
        //
    }
}
