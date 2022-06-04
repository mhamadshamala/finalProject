
@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Products</h3>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>description</th>

                <th>Price</th>
                <th>Quantity</th>
                <th>image</th>
                <th width="280px">Actions</th>
            </tr>

            @foreach ($products  as $key => $item)


            <tr>
                <td>{{$item->id+1}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td><img src = "{{ asset ('images/'.$item->image)}}" width="100" height="100" ></td>
                <td>
                    <a class="btn btn-info" href="{{route('edit-product', $item->id)}}">Edit</a>

                    <a class="btn btn-danger" href="{{url('admin/products/delete/'. $item->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection('content')
