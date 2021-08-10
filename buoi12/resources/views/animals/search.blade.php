@extends('layouts/master')

@section('content')
    <h1 class="text-center" style="margin-top: 30px">Search List</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ url('animals/create') }}">Insert</a>
            </div>
            <div class="col">
                <a href="{{ url('brands') }}">Brand List</a>
            </div>
            <div class="col">
                <a href="{{ url('') }}">Delete</a>
            </div>
        </div>
    </div>
    @php
        $count = 0;
    @endphp
    @forelse ($animals as $animal)
        @if ($count % 3 == 0)
            <div class="row justify-content-start">
        @endif
                <div class="col-4">
                    <div class="card" style="width: 280px; margin-top: 30px">
                        <img src="{{$animal->image}}" class="card-img-top" alt="animalImage" style="width:280px; height: 250px; display: inline-block; background-size: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{$animal->name}}</h5>
                            <div class="row">
                                <div class="col">
                                    <a href="{{url('animals/'.$animal->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                </div>
                                
                                <div class="col">
                                    <a href="{{url('animals/'.$animal->id)}}" class="btn btn-success">Show</a>
                                </div>
                                <div class="col">
                                    <form method="POST" action="{{ route('animals.destroy', $animal->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>               
                                    </form>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
        @if ($count % 3 == 2)
            </div>
        @endif
        @php
            $count++;   
        @endphp
    @empty
        <div class="row">
            <div class="col">
                <p class="text-center">Database empty! <a href="{{ url('animals/create') }}">Insert some data now!</a> </p>
            </div>
        </div>
    @endforelse
    <div class="d-felx justify-content-center" style="margin-top: 50px">

        {!! $animals->links('pagination::bootstrap-4') !!}

    </div>
@endsection