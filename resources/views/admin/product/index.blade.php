@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
                <a href="{{ url('add-products') }}" class="btn btn-primary">
                    Add Product
                </a>
            <table class="table">
                <thead style="text-align: center">
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Short Description</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="" style="text-align: center">
                    @foreach ($product as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->small_description }}</td>
                            <td>{{ $item->selling_price }}</td>
                            <td>
                                <img style="width:50px" src="{{ asset('admin/assets/uploads/products/'.$item->image) }}" alt="No Image Found">
                            </td>
                            <td>
                                <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ url('delete-products/'.$item->id) }}" method="post">
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
