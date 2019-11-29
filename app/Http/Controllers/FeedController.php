<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedStoreRequest;
use App\Models\Feed;
use App\Repositories\FeedRepository;
use Illuminate\Http\Request;


class FeedController extends Controller
{
    protected $feedRepo;
    public function __construct(FeedRepository $feedRepository)
    {
        $this->feedRepo = $feedRepository;
    }

    public function list()
    {
        $items = $this->feedRepo->getAllItem();
        return view('Feed.list', ['items' => $items]);
    }

    public function show($feedId)
    {
        $items = $this->feedRepo->getFeedItem($feedId);
        return view('Feed.list', ['items' => $items]);
    }

    public function create(FeedStoreRequest $request)
    {
        $this->feedRepo->create($request->all());
        return redirect()->route('feed_list')->with('success', 'Create new feed successful !');
    }

    public function delete(Request $request)
    {
        $feedDeleted = $this->feedRepo->delete($request->feed_id);
        return redirect()->route('feed_list')->with('success', 'Delete Feed: ' . $feedDeleted->title . ' successful !');
    }
}
