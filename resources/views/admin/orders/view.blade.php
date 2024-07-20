@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h4 class="text white">My Orders View
                    <a href="{{ url('orders') }}" class="btn btn-primary text-white float-end">
                        Back</a>
                    </h4>
                </div>
                <div class="row">
                    <div class="card-body">    
                        <h4>Shipping Details</h4>
                        <hr>
                        <div class="cod-md-6 order-details mb-5">
                            <label for="">First Name</label>
                            <div class="border p-2 mb-3">{{ $orders->fname }}</div>
                            <label for="">last Name</label>
                            <div class="border p-2 mb-3">{{ $orders->lname }}</div>
                            <label for="">Email</label>
                            <div class="border p-2 mb-3">{{ $orders->email }}</div>
                            <label for="">Contact No.</label>
                            <div class="border p-2 mb-3">{{ $orders->phone }}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2 mb-3">
                                {{ $orders->address1 }} <br>
                                {{ $orders->address2 }} <br>
                                {{ $orders->city }} <br>
                                {{ $orders->state }}
                                {{ $orders->country  }}
                            </div>
                            <label for="">pincode</label>
                            <div class="border p-2">{{ $orders->pincode }}</div>
                        </div>
                        <div class="cod-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table table-bordered mb-5">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->orderitems as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/products/'
                                            .$item->products->image) }}" 
                                            style="width: 70px;" alt="Product Image">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Grand Total: <span class="float-end">
                                Rs{{ $orders->total_price }}</span></h4>
                            <div class="mt-5 px-2 mb-3">
                                <label for="" class="mb-2">Order Status</label>
                                <form action="{{ url('update-order/'.$orders->id) }}" 
                                method="post">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="order_status">

                                        <option {{ $orders->status == '0' ? 'selected' : '' }} 
                                            value="0">pending</option>
                                        <option {{ $orders->status == '1' ? 'selected' : '' }} 
                                            value="1">Completed</option>

                                    </select>
                                    <button type="submit" class="btn btn-primary float-end mt-3">
                                        Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection