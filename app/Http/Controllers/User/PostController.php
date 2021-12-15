<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query();
        if (!empty($request->status)) {
            $posts = $posts->where('status', '=', $request->status);
        }
        $posts = $posts->where('user_id', '=', '2')->get();
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = '2';
        $data['status'] = Post::STATUS['PENDING'];
        $post = Post::create($data);
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($postId)
    {
        $post = Post::where('user_id' , '=' , '2')->where('id' , '=' , $postId)->first();
        if(empty($post)){
             return "Post does not exists.";
        }
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(PostStoreRequest $request,$postId)
    {
        $post = Post::where('user_id' , '=' , 2)->where('id' , '=' , $postId)->first();
        if(empty($post)){
            return "Post does not exists.";
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('user_id' , '=' , 2)->where('id' , $id)->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
