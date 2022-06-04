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
            Add About
        </div>
        <div class="card-body">
            <form method="post" action="{{route('store-about')}} " enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name"> FaceBook</label>
                    <input type="text" class="form-control" name="fb" />
                </div>
                <div class="form-group">
                    <label for="name"> Twitter</label>
                    <input type="text" class="form-control" name="tw" />
                </div>
      
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
