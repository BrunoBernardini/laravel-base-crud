@extends("layouts.main")

@section("content")
    <div class="container">
        @if ($errors->any())
            <div class="row">
                <div class="col-8 offset-2 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-8 offset-2">
                <h2 class="mb-3">Modifica di: {{$comic->title}}</h2>
                <form action="{{route('comics.update', $comic)}}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control @error("title") is-invalid @enderror"
                            value="{{old("title", $comic->title)}}"
                            placeholder="Titolo">
                            @error("title")
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input
                            type="text"
                            id="type"
                            name="type"
                            class="form-control @error("type") is-invalid @enderror"
                            value="{{old("type", $comic->type)}}"
                            placeholder="Tipo">
                            @error("type")
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">URL immagine</label>
                        <input
                            type="text"
                            id="image"
                            name="image"
                            class="form-control @error("image") is-invalid @enderror"
                            value="{{old("image", $comic->image)}}"
                            placeholder="URL immagine">
                            @error("image")
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea
                            class="form-control @error("description") is-invalid @enderror"
                            name="description"
                            id="description"
                            cols="30" rows="10">{{old("description", $comic->description)}}
                        </textarea>
                        @error("description")
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Modifica</button>
                </form>
            </div>
        </div>
    </div>
@endsection
