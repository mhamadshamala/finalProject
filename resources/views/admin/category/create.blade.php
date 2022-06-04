@extends('layouts.admin')
@section('content')
<div class="container">
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Product
        </div>
        <div class="card-body">
            <form method="post" action="{{route('store-categories')}} " enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name:</label>
                    <input type="text" class="form-control" name="name" />
                </div>
                <div class="form-group">
                    <label for="name">Category Image:</label>
                    <input type="file" class="form-control" name="category_image" />
                </div>
      
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
