@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Category </h4>
        </div>    
        <div class="card-body">
            <form action="{{ url('insert-category') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Name</b></label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for=""><b>Slug</b></label>
                        <input type="text" class="form-control" name="slug">
                    </div>

                    <div class="col-md-12 mb-3">
                    <label for=""><b>Description</b></label>
                    <textarea name="description" rows="3" class="form-control"></textarea> 
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Status</b></label>
                        <input type="checkbox" name="status">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for=""><b>Popular</b></label>
                        <input type="checkbox" name="popular">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for=""><b>Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>

                    <div class="col-md-12 mb-3">
                    <label for=""><b>Meta Keywords</b></label>
                    <textarea name="meta_keywords" rows="3" class="form-control"></textarea> 
                    </div>

                    <div class="col-md-12 mb-3">
                    <label for=""><b>Meta Description</b></label>
                    <textarea name="meta_descrip" rows="3" class="form-control"></textarea> 
                    </div>

                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
    </div>
@endsection