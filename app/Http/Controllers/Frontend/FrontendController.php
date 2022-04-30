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
}
