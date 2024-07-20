@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="section-header">
                <h3><b>My Orders</b></h3>
            </div>
            <div class="card">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Tracking Number</td>
                            <td>Total Price</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $item)
                        <tr>
                            <td>{{ $item->tracking_no }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{$item->status == '0'?'pending' : 'completed'}}</td>
                            <td>
                                <a href="{{ url('vieworder/'.$item->id) }}" class="btn btn-primary"><b>View</b></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection