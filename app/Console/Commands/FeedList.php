<?php

namespace App\Console\Commands;

use App\Models\Feed;
use Illuminate\Console\Command;

class FeedList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show Feed List';

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
        $headers = ['ID', 'Title', 'Link', 'Updated At', 'Created At'];
        $feeds = Feed::orderBy('id', 'desc')->get()->toArray();
        $this->table($headers, $feeds);
    }
}
