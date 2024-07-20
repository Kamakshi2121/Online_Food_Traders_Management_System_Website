@extends('layouts.admin')

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
        <h4>Edit/Update Product</h4>
        </div>
        <div class="card-body">
        <form action="{{ url('update-product/'.$products->id)}}" method="POST" 
        enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select">
                        <option value="">{{ $products->category->mata_title }}</option>                        
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Name</b></label>
                    <input type="text" name="name" class="form-control" 
                    value="{{$products->name}}"/><br/>
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Slug</b></label>
                    <input type="text" name="slug" value="{{$products->slug}}" 
                    class="form-control"/><br/>
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Small Description</b></label>
                    <textarea name="small_description" rows="3" class="form-control">
                        {{$products->small_description}}</textarea><br/>
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Description</b></label>
                    <textarea name="description" rows="3" class="form-control">
                        {{$products->description}}</textarea><br/>
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Original Price</b></label>
                    <input type="number" name="original_price" 
                    value="{{$products->original_price}}" class="form-control"/>
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Selling Price</b></label>
                    <input type="number" name="selling_price" 
                    value="{{$products->selling_price}}" class="form-control"/><br/>
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Tax</b></label>
                    <input type="number" name="tax" class="form-control" 
                    value="{{$products->tax}}"/>
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Quantity</b></label>
                    <input type="number" name="qty" class="form-control" 
                    value="{{$products->qty}}"/><br/>
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Status</b></label>
                    <input type="checkbox" name="status" 
                    {{$products->status == "1"?'checked':''}}/><br/>
                </div>

                <div class="col-md-6  mb-3">
                    <label for=""><b>Trending</b></label>
                    <input type="checkbox" name="trending" 
                    {{$products->trending == "1"?'checked':''}}/><br/>
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Meta Title</b></label>
                    <input type="text" name="meta_title" value="{{$products->meta_title}}"  
                    value="{{old('meta_title')}}" class="form-control" /><br/>
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Meta Keyword</b></label>
                    <textarea name="meta_keywords" rows="3" class="form-control">
                        {{ $products->meta_keywords }}</textarea><br/>
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Meta Description</b></label>
                    <textarea name="meta_descrip" rows="3" class="form-control">
                        {{ $products->meta_description}}</textarea><br/>
                </div>

                @if($products->image)
                    <img src="{{ asset('assets/uploads/products/'.$products->image) }}" 
                    alt="product image"  height="150" class="mb-4">
                @endif

                <div class="col-md-12">
                    <input type="file" name="image" class="form-control mb-3"/>
                </div>

                <div class="col-md-6 mb-3">
                    <input type="submit" class="btn btn-primary" name="Update"><br/>
                </div>
            </div>
         </form>
        </div>
    </div>
@endsection