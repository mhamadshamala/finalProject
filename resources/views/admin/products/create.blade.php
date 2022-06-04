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
            <form method="post" action="{{url('admin/products/store')}} " enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" name="product_name" />
                </div>
                <div class="form-group">
                    <label for="description">Product description:</label>
                    <input type="text" class="form-control" name="product_description" />
                </div>
                <div class="form-group">
                    <label for="price">Product Price :</label>
                    <input type="text" class="form-control" name="product_price" />
                </div>
                <div class="form-group">
                    <label for="quantity">Product Quantity:</label>
                    <input type="text" class="form-control" name="product_qty" />
                </div>
                <div class="form-group">
                    <label for="image">Product image:</label>
                    <input type="file" class="form-control" name="product_image" />
                </div>
                <div class="form-group">
                    <label for="image">Select Category</label>
                    <select class="form-control"  name="category_id" id="">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
