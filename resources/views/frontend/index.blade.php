@extends('layouts.front')

@section('title')
    Welcome to Ruchit Traders
@endsection

@section('content')
    
    @include('layouts.include.slider')
    

<!-- Featured Products -->

<div class="py-5" >
    <div class="container">
        <div class="row">
            
            <div class="section-header" >
                <center><h2 style="color:black" class="animate__animated animate__zoomIn">Best Seller Products</h2></center>
                <hr>
            </div>
            <div class="carousel-wrapper ">
            <div class="owl-carousel featured-carousel owl-theme animate__animated animate__zoomIn" >
                @foreach ($featured_products as $prod)
                <div class="item py-5">
                    <div class="card shadow">
                        <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="Product-image">
                        <div class="card-body">
                            <h4><b>{{ $prod->name }}</b></h4>
                            <span class="float-start"> ₹ {{ $prod->selling_price }}</span>
                            <span class="float-end"><s> ₹ {{ $prod->original_price }}</s></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
            </div>
        </div>
    </div>
</div> 

<!-- Trending/Popular Category -->
<div class="py-5">
    <div class="container">
        <div class="row">

            <div class="section-header">
                <center><h2 style="color:black" class="animate__animated animate__zoomIn">Trending Category</h2></center>
                <hr>
            </div>

            <div class="carousel-wrapper" >
            <div class="owl-carousel featured-carousel owl-theme animate__animated animate__flipInY animate__slower	3s">
                @foreach ($trending_category as $tcategory)
                <div class="item py-5" >
                    <a href="{{ url('viewcategory/'.$tcategory->meta_title) }}">
                        <div class="card shadow" >
                            <img src="{{asset('assets/uploads/category/'.$tcategory->image)}}" alt="Product-image">
                            <div class="card-body">
                                <h4><b>{{ $tcategory->name }}</b></h4>
                                <p>{{$tcategory->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.include.frontfooter')

@endsection




@section('scripts')
<script>
   
    $('.featured-carousel').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass:true,
        nav: true,
        navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
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
    })
</script>
@endsection