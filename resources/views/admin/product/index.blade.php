@extends('layouts.admin')

@section('title')
    Product
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Product Page</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th><b>ID</b></th>
                        <th><b>Category</b></th>
                        <th><b>Name</b></th>
                        <th><b>Selling_price</b></th>
                        <th><b>Image</b></th>
                        <th><b>Action</b></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $item)
                <tr>
                    <td scope="row">{{$item->id}}</td>
                    <td scope="row">{{$item->category->meta_title ?? 'None'}}</td>
                    <td scope="row">{{$item->name}}</td>
                    <td scope="row">{{$item->selling_price}}</td>
                    <td>
                       <img src="{{asset('assets/uploads/products/'.$item->image)}} " 
                       width="100" height="100" class="cate-image" alt="Image here"> 
                    </td>
                    <td>
                    <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary btn-sm">
                        Edit</a>
                    <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger btn-sm">
                        Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection