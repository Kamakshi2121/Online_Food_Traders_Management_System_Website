@extends('layouts.front')

@section('title')
    MY CART
@endsection

@section('content')

<div class="py-3 mb-4 shadow-md bg-secondary border-top">
        <div class="container mb-4 text-white">
            <h3 class="mb-0" style="color:Tomato;">
                <a href="{{ url('/') }}"> Home </a> /

                <a href="{{ url('cart') }}"> Cart </a>/
            </h3>        
        </div>
</div>
    
<div class="container my-5">
    <div class="card shadow">
        @if($cartitem->count() > 0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach($cartitem as $item)
            <div class="row product_data">
                <div class="col-md-2 ">
                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" 
                    height="60px" width="60px" alt="Image Here">
                </div>
                
                <div class="col-md-3 my-auto">
                    <h3>{{ $item->products->name }}</h3>
                </div>
                <div class="col-md-2 my-auto">
                    <h3>Rs {{ $item->products->selling_price }}</h3>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if($item->products->qty >= $item->prod_qty)

                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px;">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity" 
                        class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                    @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                    @else
                    <h5>Out of Stock</h5>
                    @endif
                </div>
                <div class="col-md-2 my-auto p-5">
                    <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash">
                    </i><h5>Remove</h5></button>
                </div>
            </div>
        @endforeach
        </div>
        <div class="card-footer">
            <h3>Total Price :Rs {{ $total }}
                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end" 
                style="font-size: 14px;"><b>Proceed to Checkout</b></a>
            </h3>
        </div>
        @else
        <div class="card-body text-center">
            <h2>Your <i class="fa fa-shopping-cart"></i>Cart Is Empty</h2>
            <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">
            Continue Shopping</a>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.addToCartBtn').click(function(e) {

        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add_to_cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },

            success: function(respone) {
                alert(respone.status);
            }

        });
    });


    $('.featured-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $(document).ready(function() {
        $('.increment-btn').click(function(e) {
            e.preventDefault();


            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function(e) {
            e.preventDefault();


            var dec_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.delete-cart-item').click(function(e) {
            e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajax({
                method: 'post',
                url: 'delete-cart-item',
                data: {
                    'prod_id': prod_id,
                },
                success: function(respone) {
                    window.location.reload();
                    swal("", respone.status, "sucess");
                }
            })
        });

    });
</script>
@endsection