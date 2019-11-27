<?php

namespace App\Console\Commands;

use App\Models\Feed;
use Illuminate\Console\Command;

class DeleteFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a Feed by Feed Id';

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
        $id = $this->argument('id');
        $feed = Feed::find($id);
        if (! $feed) {
            $this->error('Feed not exist !');
        } else {
            if(!$feed->delete()) {
                $this->error('Delete feed has error, please try again !');
            } else {
                $this->info('Delete feed:' . $feed->title .' successful !');
            }
        }
    }
}
