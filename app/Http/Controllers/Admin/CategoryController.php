<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::all();
        return view('admin.category.index',compact('category'));
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
           $file->move('admin/assets/uploads/categories',$fileName);
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

    
    public function EditCategory($id){
        $category=Category::findOrFail($id);
        return view('admin.category.edit_category',compact('category'));
    }


    public function UpdateCategory(Request $request,$id){
        
        $category = Category::find($id);

        if ($request->hasFile('image')) {
            $filepath = 'admin/assets/uploads/categories/'.$category->image;
            if (File::exists($filepath)) {
                File::delete($filepath);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('admin/assets/uploads/categories',$fileName);
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
        $category->update();
        return redirect('/categories');
 
    }

    public function DeleteCategory($id){
        $category=Category::findOrFail($id);
        if ($category->image) {
            $path='admin/assets/uploads/categories'.$category->image;
            if (File::exists($path)) {
                File::delete($path);
            }            
        }
        $category->delete();
        return redirect()->back();
    }
}
