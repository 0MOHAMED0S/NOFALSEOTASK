@extends('layouts.main')
@section('content')
<center><h1 style="margin: 50px">ADD ARTICLES</h1> <a href="{{route('Articales.index')}}" class="btn btn-warning">Back</a></center>
<br>
@if ($errors->any())
            @foreach ($errors->all() as $error)
            <center>
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            </center>
            @endforeach
@endif
<br>
<div style="display: flex;justify-content: center;" class="container">
    <form style="max-width: 500px;" method="POST" action="{{route('Articales.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1"  class="form-label">Title</label>
            <input type="text" class="form-control" name="title" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Files</label>
            <input type="file" class="form-control" multiple name="file[]">
        </div>
        <button type="submit" class="btn btn-primary">Store</button>
    </form>
    <br>
</div>
@endsection
