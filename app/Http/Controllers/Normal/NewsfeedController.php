<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Models\Player\NewsFeed;
use App\Http\Requests\StoreNewsFeedRequest;
use App\Http\Requests\UpdateNewsFeedRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Auth;


class NewsFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('templates.host.news_feed.news_feed_new')
                ->with('news_feed',NewsFeed::orderBy('created_at','DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $i = 0;
        return view('templates.host.news_feed.news_feed_new', compact('i'))
                ->with('news_feed',NewsFeed::orderBy('created_at','DESC')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsFeedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img_path' => 'mimes:png,jpg|max:5048'
        ]);

        $newImageName = uniqid().'-'.now()->timestamp.'.'.

        $request->img_path->extension();

        $request->img_path->move(public_path('images'), $newImageName);

        $slug = SlugService::createSlug(NewsFeed::class, 'slug', $request->title);

        NewsFeed::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(NewsFeed::class, 'slug', $request->title),
            'img_path' => $newImageName,
            'user_id' => Auth::user()->id
        ]);

        $role = Auth::user()->role;

        if ($role == 1) {
            return redirect()->route('admin-dashboard');
        }
        elseif ($role == 2) {
            return redirect()->route('host-dashboard');
        }
        elseif ($role == 3) {
            return redirect()->route('player-dashboard');
        }
        else {
            return redirect('/');
        }

        // return redirect()->route('news-feed.store')->with('success','New news Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player\NewsFeed  $newsFeed
     * @return \Illuminate\Http\Response
     */
    public function show($newsFeed)
    {
        //
        return view('templates.host.news_feed.news_feed_view')
                ->with('news', NewsFeed::where('slug', $newsFeed)->first());
    }

    public function readmore($newsFeed)
    {
        //
        return view('templates.host.news_feed.news_feed_readmore')
                ->with('news', NewsFeed::where('slug', $newsFeed)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player\NewsFeed  $newsFeed
     * @return \Illuminate\Http\Response
     */
    public function edit( $newsFeed)
    {
        //
        return view('templates.host.news_feed.news_feed_edit')
                ->with('news', NewsFeed::where('slug', $newsFeed)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsFeedRequest  $request
     * @param  \App\Models\Player\NewsFeed  $newsFeed
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsFeedRequest $request, NewsFeed $newsFeed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player\NewsFeed  $newsFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy($newsFeed)
    {
        //
        $news = NewsFeed::find($newsFeed);

        if(!empty($news)) {
			$news->delete();
            return redirect()->route('news-feed.create')->with('success', 'The News has been successfully deleted!');
          } else {
            return redirect()->route('news-feed.create')->with('error', 'Please try again!');
          }
    }
}
