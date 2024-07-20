@extends('layouts.admin')

@section('title')
Add Product
@endsection

@section('content')
 
<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-products')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="cate_id">
                        <option value="">Select a Category</option>

                        @foreach($category as $item)
                        <option value="{{ $item->id }}">{{ $item->meta_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""><b>Name</b></label>
                    <input type="text" name="name" class="form-control" /><br />
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Slug</b></label>
                    <input type="text" name="slug" class="form-control" /><br />
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Small Description</b></label>
                    <input type="text" name="small_description" class="form-control" /><br />
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Description</b></label>
                    <textarea name="description" rows="3" class="form-control"></textarea><br />
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Original Price</b></label>
                    <input type="number" name="original_price" class="form-control" />
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Selling Price</b></label>
                    <input type="number" name="selling_price" class="form-control" /><br />
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Tax</b></label>
                    <input type="number" name="tax" class="form-control" />
                </div>

                <div class="col-md-12 mb-3">
                    <label for=""><b>Quantity</b></label>
                    <input type="number" name="qty" class="form-control" /><br />
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Status</b></label>
                    <input type="checkbox" name="status" />
                </div>

                <div class="col-md-6  mb-3">
                    <label for=""><b>Trending</b></label>
                    <input type="checkbox" name="trending" /><br />
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Meta Title</b></label>
                    <input type="text" name="meta_title" class="form-control" /><br />
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Meta Keyword</b></label>
                    <textarea name="meta_keywords" rows="3" class="form-control"></textarea><br/>
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Meta Description</b></label>
                    <textarea name="meta_descrip" rows="3" class="form-control"></textarea><br/>
                </div>

                <div class="col-md-12">
                    <input type="file" name="image" class="form-control"><br />
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection