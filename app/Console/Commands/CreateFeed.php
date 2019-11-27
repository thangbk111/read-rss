<?php

namespace App\Console\Commands;

use App\Models\Feed;
use Illuminate\Console\Command;

class CreateFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:create {title} {link}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Feed';

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
        $feed = Feed::where('link', $this->argument('link'))->get();
        if (count($feed)) {
            $this->error('Feed Link already exist !');
        } else {
            $feed = new Feed();
            $feed->title = $this->argument('title');
            $feed->link = $this->argument('link');
            if (!$feed->save()) {
                $this->error('Error when create Feed, please try again !');
            } else {
                $this->info('Create Feed successful !');
            }
        }
    }
}
