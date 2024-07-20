@extends('layouts.front')

@section('title', $products->name)

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/add-rating') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$products->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{ $products->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if($user_rating)
                            @for($i=1; $i<=$user_rating->stars_rated; $i++)
                                <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                <label for="rating{{$i}}" class="fa fa-star"></label>
                                @endfor
                                @for($j = $user_rating->stars_rated+1; $j <= 5; $j++) <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                    <label for="rating{{$j}}" class="fa fa-star"></label>
                                    @endfor

                                    @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                    @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="content">
    <div class="py-3 mb-4 shadow-md bg-secondary border-top">
        <div class="container mb-4 text-white">
            <h3 class="mb-0" style="color:Tomato;">
                <a href="{{ url('category') }}"> Collections </a> /

                <a href="{{ url('category/'.$products->category->slug) }}">
                     {{ $products->category->name }} </a>/

                <a href="{{ url('category/'.$products->category->slug.'/'. $products->slug) }}">
                    {{ $products->name }}
            </h3>        
        </div>
    </div>
        <div class="container py-5 pb-2">
            <div class="card shadow">
            <div class=" product_data">  
                
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <img src="{{ asset('assets/uploads/products/' . $products->image) }}" class="w-80"  alt="Image">
                        </div>
                        <div class="col-md-8">
                            <h3 class="mb-0 mt-3">
                                <b>{{ $products->name }}</b>
                                @if($products->trending == '1')
                                <span style="font-size: 14px;" class="float-end badge text-bg-danger trending_tag">Trending</span>
                                @endif
                            </h3>

                            <hr>
                            <label class="me-3">Original Price : ₹<s> {{ $products->original_price }}</s></label>
                            <label class="fw-bold">Selling Price : ₹ {{ $products->selling_price }} </label>
                            
                            @php $ratenum = number_format($rating_value) @endphp
                            <div class="ratings">
                                @for($i=1; $i<=$ratenum; $i++) <i class="fa fa-star checked"></i>
                                    @endfor
                                    @for($j = $ratenum+1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                        @endfor
                                        <span>
                                            @if($ratings->count() > 0)
                                            {{ $ratings->count() }} Ratings
                                            @else
                                            No Ratings
                                            @endif

                                        </span>
                            </div>

                            <p class="mt-3">
                                {!! $products->small_description !!}
                            </p>
                            <hr>
                            @if($products->qty > 0)
                            <label class="badge bg-success" style="font-size: 12px;"><b>In Stock</label>
                            @else
                            <label class="badge bg-danger" style="font-size: 12px;">out of Stock</label>
                            @endif
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3">
                                        <button class="input-group-text decrement-btn" >-</button>
                                        <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                                        <button class="input-group-text increment-btn ">+</button>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <br/>
                                    @if($products->qty > 0)
                                    <button type="button" class="btn btn-success me-3 addToCartBtn float-start" style="font-size: 14px;"> Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                    @endif
                                    <button type="button" class="btn btn-primary me-3 addToWishlist float-start" style="font-size: 14px;"> Add to Whishlist <i class="fa fa-heart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>    
                        <div class="col-md-12">
                            <hr>
                            <h3><b>Description</b></h3>
                            <p class="mt-3">
                                {!! $products->description !!}
                            </p>

                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Rate this product
                            </button>
                        </div>
                    </div>        

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

    $('.addToWishlist').click(function(e) {

        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add_to_wishlist",
            data: {
                'product_id': product_id,
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

            var prod_id = $(this).closest('.product_data').find('.prod_id').val(value);

            $.ajax({
                method: 'post',
                url: 'deleteCartItem',
                data: {
                    'prod_id': prod_id,
                },
                success: function(respone) {
                    window.location.reload();
                    alert("", respone.status, "sucess");
                }
            })
        });
    });

    $('.changeQuantity').click(function(e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id': prod_id,
            'prod_qty': qty,
        }

        $.ajax({
            method: "POST",
            url: "updateCart",
            data: data,

            success: function(respone) {
                window.location.reload();

            }

        });
    })
</script>

@endsection