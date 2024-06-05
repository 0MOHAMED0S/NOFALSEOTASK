@extends('layouts.main')
@section('content')
    <center>
        <h1 style="margin: 50px">UPDATE ARTICLE</h1> <a href="{{ route('Articales.index') }}" class="btn btn-warning">Back</a>
    </center>
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
        <form style="max-width: 500px;" method="POST" action="{{ route('Articales.update',['Articale'=>$articale->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" value="{{ $articale->title }}" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Files</label>
                <input multiple type="file" class="form-control" name="file[]" >
            </div>
            <div>
                @foreach (json_decode($articale->paths) as $path)
                <img width="50" height="50" src="{{ asset('storage/' . $path) }}" alt="">
                @endforeach
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
