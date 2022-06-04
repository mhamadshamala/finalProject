
@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>About Us</h3>
                <a href="{{ route('create-about') }}" class="btn btn-primary mb-3">Create About</a>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>FaceBook</th>
                <th>Twitter</th>

               
            </tr>

            @foreach ($abouts  as $about)


            <tr>
                <td>{{$about->id+1}}</td>
                <td>{{$about->fb}}</td>
                <td>{{$about->tw}}</td>


               
            </tr>
            @endforeach
        </table>
    </div>

@endsection('content')
