<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
class TinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return view('category.dashboard',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('category.add',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=> 'required',
            'content'=> 'required',
            'id_category'=>'required'            
        ],[
            'title.required'=>'Vui lòng không để trống',
            'description.required'=>'Vui lòng không để trống',
            'content.required'=>'Vui lòng không để trống',
            'id_category.required'=>'Vui lòng chọn danh mục'
        ]);
        
        try{
                if($request->hasFile('image')){
                    $imagePath=$request->file('image')->store('','tuTao');
                }
                $post=Post::create([
                   'title'=>$request->title, 
                   'description'=>$request->description,
                   'content'=>$request->content,
                   'id_category'=>$request->id_category,
                   'image'=>$imagePath??null
                ]);
            if($post){
                return back()->with('success','Thêm thành công');
            }
            
        }catch(\Exception $e){
            return back()->withErrors(['error'=>"Thêm thất bại rùi á: $e"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::find($id);
        $categories=Category::all();
        return view('category.update')->with(['post'=>$post,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            if($request->hasFile('image')){
                $imagePath=$request->file('image')->store('','tuTao');
            }
            $post=Post::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'content'=>$request->content,
                'id_category'=>$request->id_category,
                'image'=>$imagePath??null
            ]);
            if($post){
                return back()->with('success','Cập nhật thành công');
            }
        }catch(\Exception $e){
            return back()->withErrors(['error'=>'Cập nhật thất bại '.$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        try{
            $post=Post::destroy($id);
            if($post){
                return redirect()->route('posts.index')->with('success','Xoá thành công');
            };
        }catch(\Exception $e){
            return redirect()->route('posts.index')->withErrors(['error'=>"Xoá thất bại: $e"]);
        }
    }
}