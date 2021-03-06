<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $trending = Category::where('popular','1')->take(15)->get();
        $featured_products=Product::where('trending','1')->take(15)->get();
        return view('frontend.index',compact('featured_products','trending'));
    }

    public function category(){
        $category = Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }

    public function viewcategory($id){


        $categories=Category::findOrFail($id);
        $products=Product::where('cat_id',$categories->id)->where('status','0')->get();
        return view('frontend.products.index',compact('categories','products'));

    }

    public function SingleProductView($category_name,$product_name){
        $products=Product::where('name',$product_name)->first();
        return view('frontend.products.view-product',compact('products'));
    }
}
