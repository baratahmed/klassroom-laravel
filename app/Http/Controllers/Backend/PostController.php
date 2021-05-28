<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $data = [];
        $data['posts'] = Post::with('category','user')->select('id','user_id','category_id','title','thumbnail_path','content','status')->orderBy('id','desc')->paginate(10);

        return view('backend.post.index',$data);
    }

    public function create()
    {
        $data = [];
        $data['categories'] = Category::where('status',1)->orderBy('id','desc')->select('name','id')->get(); 
        return view('backend.post.create',$data);
    }

    public function store(Request $request)
    {
       $this->validate($request,[
           'title' => 'required',
           'content'  => 'required',
           'category_id'  => 'required',
           'status'  => 'required',
       ]);
       Post::create([
           'title' => trim($request->title),
           'content' => trim($request->content),
           'category_id' => $request->category_id,
           'user_id' => auth()->id(),
           'thumbnail_path' => 'https://via.placeholder.com/640x480.png/008811?text=aut',
           'status' => $request->status,
       ]);
       Session::flash('success','Post has been created successfully!!');
       return redirect()->back();
    }

    public function show($id)
    {
        $category = Category::with('posts','posts.user')->select('id','name','slug','status','created_at')->orderBy('id','desc')->find($id);
        return view('backend.category.show',[
            'category' => $category,
        ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit',[
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
       
        $this->validate($request,[
            'name' => 'required|unique:categories,name,'.$id,
            'status'  => 'required',
        ]);
        $category = Category::find($id);
        $category->update([
            'name' => trim($request->name),
            'slug' => Str::slug(trim($request->name)),
            'status' => $request->status,
        ]);
        Session::flash('success','Category has been updated successfully!!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('success','Category has been deleted successfully!!');
        return redirect()->route('categories');
    }
}
