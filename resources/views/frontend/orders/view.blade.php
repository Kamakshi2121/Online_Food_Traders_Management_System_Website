@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
                <div class="section-header">
                    <h3><b>Order View</b></h3>
                </div>
            <div class="card p-5">
                <h2><a href="{{ url('my-orders') }}" class="btn btn-primary text-white float-end"><b>Back</b></a></h2>
                <div class="row">
                    <div class="col-md-6 order-details">
                    <h3>Shopping Details</h3>
                    <hr>
                        <label for="">First Name</label>
                        <div class="border ">{{ $orders->fname }}</div>

                        <label for="">Last Name</label>
                        <div class="border ">{{ $orders->lname }}</div>

                        <label for="">Email</label>
                        <div class="border ">{{ $orders->email }}</div>

                        <label for="">Contact No.</label>
                        <div class="border ">{{ $orders->phone }}</div>

                        <label for="">Shipping Address</label>
                        <div class="border">
                            {{ $orders->address1 }}, <br>
                            {{ $orders->address2 }}, <br>
                            {{ $orders->city }}, <br>
                            {{ $orders->state }}, 
                            {{ $orders->country }},
                        </div>

                        <label for="">Zip Code</label>
                        <div class="border">{{ $orders->pincode }}</div>

                    </div>
                    <div class="col-md-6">
                    <h3>Order Details</h3>
                    <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>Image</td>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($orders->orderitems as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" style="width: 70px;" alt="Product Image">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> 
                        </table>
                        <h4 class="px-2">Grand Total: <span class="float-end">{{ $orders->total_price }}</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection