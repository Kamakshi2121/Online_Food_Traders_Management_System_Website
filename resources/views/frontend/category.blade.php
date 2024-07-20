@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                <div class="section-header">
                    <h2 style="color: Black;">All Categories</h2>
                </div>
                <hr>
                    <div class="row">
                    @foreach($category as $cate)
                    <div class="col-md-4 mb-4">
                        <a href="{{ url('viewcategory/'.$cate->meta_title) }}">
                    <div class="card shadow">
                        <img src="{{ asset('assets/uploads/category/'.$cate->image)}}" 
                        height="70px" width="50px" alt="Category-image"/>
                        <div class="card-body mb-6">
                            <h4 style="color: black;"><b>{{ $cate->name }}</b></h4>
                            <p>{{$cate->description}}</p>
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
@endsection

