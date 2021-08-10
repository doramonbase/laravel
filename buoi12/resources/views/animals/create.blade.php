@extends('layouts/master')

@section('content')
    <h1 class="text-center" style="margin-bottom: 20px">Insert animal</h1>
    <div class="container">
        <div class="row" style="margin-bottom: 30px">
        <div class="col">
            <a href="{{ url('animal') }}">Return List</a>
        </div>
        <div class="col">
            <a href="{{ url('') }}">Update</a>
        </div>
        <div class="col">
            <a href="{{ url('') }}">Delete</a>
        </div>
        </div>
    </div>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" placeholder="Input name!" value="{{ old('name') }}" required>
            <label for="floatingInput">Input name!</label>
        </div>
        
    </form>

    @yield('announ', View::make('layouts/announ'))

    
@endsection