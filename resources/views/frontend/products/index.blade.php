@extends('layouts.frontend')

@section('title')
{{$categories->name}}
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h4>{{$categories->name}}</h4>
                        @foreach ($products as $prod)
                            <div class="col-md-4 mb-3">
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
            </div>
        </div>
    </div>
@endsection
