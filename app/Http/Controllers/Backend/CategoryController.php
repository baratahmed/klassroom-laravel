<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
   
    public function index()
    {
        // $categories = Category::orderBy('id','desc')->get();
        // return view('backend.category.index',[
        //     'categories' => $categories,
        // ]);

        $data = [];
        $data['categories'] = Category::select('id','name','status')->orderBy('id','desc')->paginate(10);
            //return $data;
        return view('backend.category.index',$data);


    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
       $this->validate($request,[
           'name' => 'required|unique:categories,name',
           'status'  => 'required',
       ]);
       Category::create([
           'name' => trim($request->name),
           'slug' => Str::slug(trim($request->name)),
           'status' => $request->status,
       ]);
       Session::flash('success','Category has been created successfully!!');
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
