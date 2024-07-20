@extends('layouts.front')

@section('title')
    My Wishlist
@endsection

@section('content')

<div class="py-3 mb-4 shadow-md bg-secondary border-top">
        <div class="container mb-4 text-white">
            <h3 class="mb-0" style="color:Tomato;">
                <a href="{{ url('/') }}"> Home </a> /

                <a href="{{ url('cart') }}"> Wishlist </a>/
            </h3>        
        </div>
</div>

<div class="container my-5">
    <div class="card shadow ">
        <div class="card-body">
            @if($wishlist->count() > 0)
            @foreach($wishlist as $item)
            <div class="row product_data">
                <div class="col-md-2 ">
                    <img src="{{asset('assets/uploads/products/' . $item->products->image)  }}" style="width: 70px;" alt="Image Here">
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>Rs {{ $item->products->selling_price }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if( $item->products->qty >= $item->prod_qty )
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px;">
                        <button class="input-group-text  decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                        <button class="input-group-text  increment-btn">+</button>
                    </div>
                    @else
                    <h6>Out of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto p-5">
                    <button class="btn btn-success addToCartBtn"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                </div>
                <div class="col-md-2 my-auto p-5">
                    <button class="btn btn-danger remove-wishlist-item"> <i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>

            @endforeach
            @else
            <h4><b>There are no products in your Wishlist</b></h4>
            @endif
        </div>
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


        $('.remove-wishlist-item').click(function(e) {
            e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();

            $.ajax({
                method: 'post',
                url: 'delete-wishlist-item',
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