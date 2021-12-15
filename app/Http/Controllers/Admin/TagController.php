<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\TagStoreRequest;
use DB;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->all());
        //DB::enableQueryLog();
        $tags = Tag::query();
        if(!empty($request->status)){
            $tags = $tags->where('status' , $request->status);  
        }
        if(!empty($request->search)){
            $tags = $tags->where(function($query) use($request){
                $query->where('title' , 'LIKE' , '%'. $request->search .'%')
                    ->orWhere('description' , 'LIKE' , '%'. $request->search .'%');
            });
        }
        $tags = $tags->get();  
        // $tags = Tag::where('status' , $request->status)->where('title' , 'LIKE' , '%'. $request->search .'%')->orWhere('description' , 'LIKE' , '%'. $request->search .'%')->get();
       //dd(DB::getQueryLog());
        return $tags;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = '20';
        $data['status'] = Tag::STATUS['ACTIVE'];
        $tag = Tag::create($data);
        return $tag;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return $tag;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagStoreRequest $request, Tag $tag)
    {
        $tag->title = $request->title;
        $tag->description = $request->description;
        $tag->save();
        return $tag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::where('id' , $id)->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
