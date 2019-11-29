<?php


namespace App\Repositories;

use App\Models\Feed;
use Feeds;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class FeedRepository
{
    public function all()
    {
        return Feed::all();
    }

    public function getFeedItem($feedId)
    {
        $feed = Feed::find($feedId);
        if (!$feed) {
            throw new ModelNotFoundException('Feed not found !');
        }
        $feedCollection = collect();
        $feed = Feeds::make($feed->link, true);
        $items = $feed->get_items();
        foreach ($items as $item) {
            $feedCollection->push([
                'feed_title' => $feed->get_title(),
                'title' => $item->get_title(),
                'url' => $item->get_permalink(),
                'description' => $item->get_description(),
                'created_at' => $item->get_date('d-m-Y H:i:s'),
            ]);
        }
        $feedCollection->sortByDesc('created_at');
        return $feedCollection;
    }

    public function getAllItem()
    {
        $feedCollection = collect();
        $feeds = Feed::all();
        foreach ($feeds as $feed) {
            $feed = Feeds::make($feed->link, true);
            $items = $feed->get_items();
            foreach ($items as $item) {
                $feedCollection->push([
                    'feed_title' => $feed->get_title(),
                    'title' => $item->get_title(),
                    'url' => $item->get_permalink(),
                    'description' => $item->get_description(),
                    'created_at' => $item->get_date('d-m-Y H:i:s'),
                ]);
            }
        }
        $feedCollection->sortByDesc('created_at');
        return $feedCollection;
    }

    public function create($data)
    {
        $feed = new Feed();
        $feed->fill($data);
        $feed->save();
        return $feed;
    }

    public function delete($feedId)
    {
        $feed = Feed::find($feedId);
        if (!$feed) {
            throw new ModelNotFoundException('Feed not found');
        }
        $feed->delete();
        return $feed;
    }
}