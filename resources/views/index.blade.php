@extends('layouts.main')
@section('content')
    <center>
        <h1 style="margin: 50px">ARTICALES <a href="{{ route('Articales.create') }}" class="btn btn-warning">Create</a></h1>
    </center>
    <br>
    @if (session('success'))
        <div class="alert alert-success">
            <center>{{ session('success') }}</center>
        </div>
    @endif

    <br>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Files</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articales as $articale)
                    <tr>
                        <td>{{ $articale->id }}</td>
                        <td>{{ $articale->title }}</td>
                        <td>
                            @foreach (json_decode($articale->paths) as $path)
                                <img width="50" height="50" src="{{ asset('storage/' . $path) }}" alt="">
                            @endforeach
                        </td>
                        <td style="width:50px">
                            <div style="display: flex;gap:10px;">
                                <a href="{{ route('Articales.edit', ['Articale' => $articale->id]) }}">
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </a>
                                <form action="{{ route('Articales.destroy', ['Articale' => $articale->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
