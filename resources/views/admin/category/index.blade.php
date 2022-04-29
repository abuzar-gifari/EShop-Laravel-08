@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
                <a href="{{ url('add-categories') }}" class="btn btn-primary">
                    Add Category
                </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img style="width:50px" src="{{ asset('admin/assets/uploads/categories/'.$item->image) }}" alt="No Image Found">
                            </td>
                            <td>
                                <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ url('delete-categories/'.$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
