<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        // $category = new Category;
        // $category->created_by = $request->created_by;
        // $category->title = $request->title;
        // $category->description = $request->description;
        // $category->status = $request->status;
        // $category->save();
        // $data = [
        //     'created_by' => $request->created_by,
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'status' => $request->status
        // ];
        //dd($request->all());
        // $validated = $request->validate([
        //     'title' => 'required|unique:categories|max:100',
        //     'description' => 'nullable|max:255'
        // ]);
        //dd(Category::STATUS['ACTIVE']);
        $data = $request->validated();
        $data['created_by'] = '20';
        $data['status'] = Category::STATUS['ACTIVE'];
        $category = Category::create($data);
        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // $category = Category::find($id);
        // if(empty($category)){
        //     return "Category does not exists.";
        // }
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStoreRequest $request, Category $category)
    {
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id' , $id)->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
