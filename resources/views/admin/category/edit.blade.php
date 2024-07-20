@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Category </h4>
        </div>    
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Name</b></label>
                        <input type="text" name="name" value="{{ $category->name}}" class="form-control" >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for=""><b>Slug</b></label>
                        <input type="text" name="slug" value="{{ $category->slug}}" class="form-control" >
                    </div>

                    <div class="col-md-12 mb-3">
                    <label for=""><b>Description</b></label>
                    <textarea name="description" rows="3" class="form-control"> {{ $category->description }}</textarea> 
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Status</b></label>
                        <input type="checkbox" name="status" {{ $category->status == "1" ? 'checked':'' }} />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for=""><b>Popular</b></label>
                        <input type="checkbox" name="popular" {{ $category->popular == "1" ? 'checked':'' }} />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for=""><b>Meta Title</b></label>
                            <input type="text" name="meta_title" value="{{ $category->meta_title}}"  value="{{old('meta_title')}}" class="form-control" >
                    </div>

                    <div class="col-md-12 mb-3">
                    <label for=""><b>Meta Keywords</b></label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{ $category->meta_keywords}}</textarea> 
                    </div>

                    <div class="col-md-12 mb-3">
                    <label for=""><b>Meta Description</b></label>
                    <textarea name="meta_descrip" rows="3" class="form-control">{{ $category->meta_descrip}}</textarea> 
                    </div>

                    @if($category->image)
                        <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="category Image" height="150px" class="mb-4">
                    @endif

                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <!--<button type="submit" class="btn btn-primary">Update</button>-->
                        <input type="submit" class="btn btn-primary" name="submit"><br/>
                    </div>
            </div>
        </div>
    </div>
@endsection