@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary">
                <a href="{{ url('add-categories') }}">
                    Add Category
                </a>
            </button>
        </div>
    </div>
@endsection
