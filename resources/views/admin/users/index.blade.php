@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered Users</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $item)
                <tr>
                    <td scope="row">{{$item->id}}</td>
                    <td scope="row">{{$item->name.' '.$item->lname}}</td>
                    <td scope="row">{{$item->email}}</td>
                    <td scope="row">{{$item->phone}}</td>
                    <td>
                    <a href="{{url('view-user/'.$item->id)}}" class="btn btn-primary btn-sm">View</a>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection