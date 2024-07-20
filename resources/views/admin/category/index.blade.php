@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Category Page</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th><b>Id</b></th>
                        <th><b>Name</b></th>
                        <th><b>Description</b></th>
                        <th><b>Image</b></th>
                        <th><b>Action</b></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($category as $item)
                <tr>
                    <td scope="row">{{$item->id}}</td>
                    <td scope="row">{{$item->name}}</td>
                    <td scope="row">{{$item->description}}</td>
                    
                    <td>
                       <img src="{{asset('assets/uploads/category/'.$item->image)}} " width="100" height="100" class="cate-image" alt="Image here"> 
                    </td>
                    <td>
                        <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection