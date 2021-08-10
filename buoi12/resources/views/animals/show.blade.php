@extends('layouts/master')

@section('content')
    <h1 class="text-center">animal Information</h1>
    <img id="previewImg" src="{{ URL::to('/') }}/images/{{$animals->image}}" style="width: auto; height: 200px; display: inline-block;"><br>
    Id: {{ $animals->id}} <br>
    Name: {{ $animals->name}} <br>
    Price: {{ $animals->price}} <br>
    Brand: {{ $animals->brandName}} <br>
@endsection