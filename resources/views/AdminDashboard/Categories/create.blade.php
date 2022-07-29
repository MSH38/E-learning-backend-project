@extends('layouts.AdminDashboard')
@section('title')
    new user
    @endsection
@section('owner')
    Admins
    @endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New Admin</h3>
        </div>
        @foreach($errors->all() as $error)
            <div class="alert mt-2 alert-danger">
                {{$error}}
            </div>
        @endforeach

    <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
      {{  csrf_field()}}
      {{  method_field('post')}}
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Slug</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="slug" placeholder="" value="{{old('slug')}}">
            </div>


                <!-- /.input group -->
            </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    01554270660
    @endsection
