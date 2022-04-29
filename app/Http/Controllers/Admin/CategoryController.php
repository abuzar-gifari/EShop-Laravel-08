<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    
    public function AddCategory(){
        return view('admin.category.add_category');
    }

    public function InsertCategory(Request $request){
       $category = new Category();
       if ($request->hasFile('image')) {
           $file = $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $fileName = time().'.'.$ext;
           $file->move('assets/uploads/categories',$fileName);
           $category->image=$fileName;
       }

       $category->name = $request->input('name');
       $category->title = $request->input('title');
       $category->description = $request->input('description');
       $category->status = $request->input('status') == TRUE ? '1':'0';
       $category->popular = $request->input('popular') == TRUE ? '1':'0';
       $category->meta_title = $request->input('meta_title');
       $category->meta_keywords = $request->input('meta_keywords');
       $category->meta_desc = $request->input('meta_desc');
       $category->save();
       return redirect('/dashboard');

    }
}
