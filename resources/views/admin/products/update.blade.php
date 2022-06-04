@extends('layouts.admin')
@section('content')
<form method="post" action="{{ route('update-product',$product->id) }}" style="margin-right:70px; width:70%;" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Product Name:</label>
        <input type="text" class="form-control" name="product_name" value="{{$product->name}}"/>
    </div>
    <div class="form-group">
        <label for="description">Product description:</label>
        <input type="text" class="form-control" name="product_description" value="{{$product->description}}"/>
    </div>
    <div class="form-group">
        <label for="price">Product Price :</label>
        <input type="text" class="form-control" name="product_price" value="{{ $product->price }}" />
    </div>
    <div class="form-group">
        <label for="quantity">Product Quantity:</label>
        <input type="text" class="form-control" name="product_quantity" value="{{ $product->quantity }}" />
    </div>
    <div class="form-group">
        <label for="image">Product image:</label>
        <input type="file" class="form-control" name="product_image" value="{{ $product->image }}"/>
    </div>

    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection('content')
