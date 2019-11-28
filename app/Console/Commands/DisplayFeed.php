<?php

namespace App\Console\Commands;

use App\Models\Feed;
use Illuminate\Console\Command;
use Feeds;

class DisplayFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:display {feedId}';

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
        $feed = Feed::find($this->argument('feedId'));
        if (!$feed) {
            $this->error('Feed not exist !');
            return;
        }
        $feed = Feeds::make($feed->link, true);
        $items = $feed->get_items();
        $data = [];
        foreach ($items as $item) {
            $data[] = [
               'title' => $item->get_title(),
               'created_at' => $item->get_date('d-m-Y H:i:s'),
            ];
        }
        $headers = ['Title', 'Created At'];
        $this->table($headers, $data);
    }
}
