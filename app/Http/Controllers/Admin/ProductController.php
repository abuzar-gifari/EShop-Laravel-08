<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $product=Product::all();
        return view('admin.product.index',compact('product'));
    }

    public function AddProducts(){
        $category=Category::all();
        return view('admin.product.add_product',compact('category'));
    }

    
    public function InsertProducts(Request $request){
        $product = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('admin/assets/uploads/products',$fileName);
            $product->image=$fileName;
        }
 
        $product->name = $request->input('name');
        $product->cat_id = $request->input('cat_id');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->trending = $request->input('trending') == TRUE ? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->save();
        return redirect('/products')->with('msg','Product Added Successfully');
 
     }
 
     
    //  public function EditProducts($id){
    //      $category=Category::findOrFail($id);
    //      return view('admin.category.edit_category',compact('category'));
    //  }
 
 
     public function UpdateProducts(Request $request,$id){
         
        //  $category = Category::find($id);
 
        //  if ($request->hasFile('image')) {
        //      $filepath = 'admin/assets/uploads/categories/'.$category->image;
        //      if (File::exists($filepath)) {
        //          File::delete($filepath);
        //      }
        //      $file = $request->file('image');
        //      $ext = $file->getClientOriginalExtension();
        //      $fileName = time().'.'.$ext;
        //      $file->move('admin/assets/uploads/categories',$fileName);
        //      $category->image=$fileName;
        //  }
  
        //  $category->name = $request->input('name');
        //  $category->title = $request->input('title');
        //  $category->description = $request->input('description');
        //  $category->status = $request->input('status') == TRUE ? '1':'0';
        //  $category->popular = $request->input('popular') == TRUE ? '1':'0';
        //  $category->meta_title = $request->input('meta_title');
        //  $category->meta_keywords = $request->input('meta_keywords');
        //  $category->meta_desc = $request->input('meta_desc');
        //  $category->update();
        //  return redirect('/categories')->with('msg','Category Updated Successfully');
  
     }
 
     public function DeleteProducts($id){
         $product=Product::findOrFail($id);
         if ($product->image) {
             $path='admin/assets/uploads/products'.$product->image;
             if (File::exists($path)) {
                 File::delete($path);
             }            
         }
         $product->delete();
         return redirect()->back()->with('msg','Product Deleted Successfully');
     }
}
