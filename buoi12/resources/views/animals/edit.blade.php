@extends('layouts/master')

@section('content')
    <h1 class="text-center" style="margin-bottom: 20px">Edit Prodct</h1>
    <div class="container">
        <div class="row" style="margin-bottom: 30px">
        <div class="col">
            <a href="{{ url('animals') }}">Return List</a>
        </div>
        <div class="col">
            <a href="{{ url('') }}">Update</a>
        </div>
        <div class="col">
            <a href="{{ url('') }}">Delete</a>
        </div>
        </div>
    </div>
    <form method="POST" action="{{ route('animals.update', $animals->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" placeholder="Input name!" value="{{ $animals->name }}" required>
            <label for="floatingInput">Input name!</label>
        </div>
        <button type="submit" style="margin-top: 20px" class="btn btn-outline-primary">Edit</button>
    </form>

    @yield('announ', View::make('layouts/announ'))
@endsection