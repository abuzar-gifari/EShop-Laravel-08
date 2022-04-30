@extends('layouts.frontend')

@section('title')
{{$products->name}}
@endsection

@section('content')
    <div class="container">
        <div class="card-shadow">
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('admin/assets/uploads/products/'.$products->image) }}" alt=""
                        style="width: 100%">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$products->name}}
                            @if ($products->trending=="1")
                                <label style="font-size:15px;" class="float-end badge bg-danger trending_tag">Trending</label>         
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Original Price: <s>Rs {{$products->original_price}}</s></label>
                        <label class="sw-bold">Selling Price: <s>Rs {{$products->selling_price}}</s></label>
                        <p class="mt-3">
                            {!! $products->small_description !!}          
                        </p>
                        <hr>
                        @if ($products->qty>0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out Of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-text"> - </span>
                                    <input type="text" name="quantity" value="1" class="form-control">
                                    <span class="input-group-text"> + </span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist</button>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
