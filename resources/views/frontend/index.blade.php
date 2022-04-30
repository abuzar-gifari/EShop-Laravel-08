@extends('layouts.frontend')

@section('title')
    Welcome to E-Shop
@endsection

@section('content')

    @include('layouts.inc.frontend_slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h3 class="text-center">Featured Products</h3>
                <div class="owl-carousel featured-carousel owl-theme mt-3">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card">
                                <img src="{{ asset('admin/assets/uploads/products/'.$prod->image) }}" alt="" srcset="">
                                <div class="card-body">
                                    <h4>{{$prod->name}}</h4>
                                    <span class="float-start">{{$prod->selling_price}}$</span>
                                    <span class="float-end"><s>{{$prod->original_price}}$</s></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="row">
                <h3 class="text-center mt-5">Trending Categories</h3>
                <div class="owl-carousel featured-carousel owl-theme mt-3">
                    @foreach ($trending as $trending)
                        <div class="item">
                            <div class="card">
                                <img src="{{ asset('admin/assets/uploads/categories/'.$trending->image) }}" alt="" srcset="">
                                <div class="card-body">
                                    <h4>{{$trending->name}}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
    $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
@endsection
