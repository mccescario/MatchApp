<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player\NewsFeed;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsFeedController extends Controller
{
    public function news()
    {
        $feed = NewsFeed::orderBy('created_at','DESC')->get();
        $feed = $feed->makeHidden('user');
        return response()->json($feed, 200);
    }

    public function create(Request $request)
    {

        $rules = [
            'title' => ['required','string'],
            'description' => ['required','string'],
            'img_path' => ['mimes:png,jpg','max:5048']
        ];

        $response = ['success' => false];
        $return = [];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $errors = $validator->errors();
            $response['errors'] = $errors;
            $return = response()->json($response, 422);
        } else {
            $data = [];
            if($request->has('img_path')){
                $newImageName = uniqid().'-'.now()->timestamp.'.'.$request->img_path->extension();
        
                $request->img_path->move(public_path('images'), $newImageName);
        
                $slug = SlugService::createSlug(NewsFeed::class, 'slug', $request->title);

                $data = [
                    'title' => $request->title,
                    'description' => $request->description,
                    'slug' => $slug,
                    'img_path' => $newImageName,
                    'user_id' => $request->user_id
                ];
            } else {
                $data = [
                    'title' => $request->title,
                    'description' => $request->description,
                    'user_id' => $request->user_id
                ];
            }
    
            NewsFeed::create($data);

            $response['success'] = true;
            $return = response()->json($response, 200);
        }

        return $return;
    }
}
