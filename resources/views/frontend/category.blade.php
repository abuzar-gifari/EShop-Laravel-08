@extends('layouts.frontend')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h4 class="text-center mb-3">All Categories</h4>
                        @foreach ($category as $cat)
                            <div class="col-md-4 mb-3">
                                <a href="{{ url('view-category/'.$cat->id) }}">
                                    <div class="card">
                                        <img src="{{ asset('admin/assets/uploads/categories/'.$cat->image) }}" alt="" srcset="">
                                        <div class="card-body">
                                            <h4>{{$cat->name}}</h4>
                                            <p>
                                                {{$cat->description}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
