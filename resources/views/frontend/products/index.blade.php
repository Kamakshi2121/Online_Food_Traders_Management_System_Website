@extends('layouts.front')

@section('title')
    {{$category->meta_title}}
@endsection

@section('content')
<div class="py-5">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2>{{$category->meta_title}}</h2>
                </div>
                @foreach ($products as $prod)                  
                    <div class="col-md-3 mb-3">
                        <div class="card mt-5" >
                            <a href="{{ url('category/'. $category->meta_title .'/'. $prod->meta_title) }}">
                                <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="Product-image" >
                                <div class="card-body">
                                    <h4 style="color: black;"><b>{{ $prod->name }}</b></h4>
                                    <p>{{$prod->description}}</p>
                                    <center><span class="float-start" style="color: black;">₹ {{ $prod->selling_price }}</span></center>
                                    <!--<span class="float-end" style="color: black;"><s>RS. {{ $prod->original_price }}</s></span>-->
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
    </div>

@endsection