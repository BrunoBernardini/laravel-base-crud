@extends("layouts.main")

@section("content")
    <div class="container">
        <h1>{{$comic->title}} <a href="{{route('comics.edit', $comic)}}" class="btn btn-primary">EDIT</a></h1>
        <span class="badge rounded-pill bg-info text-bg-info">{{$comic->type}}</span>
        <div class="row py-5">
            <div class="col-6">
                <img class="img-fluid" src="{{$comic->image}}" alt="{{$comic->title}}">
            </div>
            <div class="col-6">
                <p>{{$comic->description}}</p>
            </div>
        </div>
        <a class="btn btn-secondary mb-5" href="{{route('comics.index')}}"><< TORNA</a>
    </div>
@endsection
