@extends("layouts.main")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h2 class="mb-3">Modifica di: {{$comic->title}}</h2>
                <form action="{{route('comics.update', $comic)}}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Titolo" value="{{$comic->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input type="text" id="type" name="type" class="form-control" placeholder="Tipo" value="{{$comic->type}}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">URL immagine</label>
                        <input type="text" id="image" name="image" class="form-control" placeholder="URL immagine" value="{{$comic->image}}">
                        <img class="w-25 my-3" src="{{$comic->image}}" alt="{{$comic->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$comic->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Modifica</button>
                </form>
            </div>
        </div>
    </div>
@endsection
