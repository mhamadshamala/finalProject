
@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Categories</h3>
                <a href="{{ route('create-categories') }}" class="btn btn-primary mb-3">Create Category</a>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
               
            </tr>

            @foreach ($categories  as $category)


            <tr>
                <td>{{$category->id+1}}</td>
                <td>{{$category->name}}</td>
                <td><img src = "{{ asset ('images/'.$category->image)}}" width="100" height="100" ></td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection('content')
