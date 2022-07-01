@extends("layouts.main")

@section("content")
    <div class="container">
        @if (session("cancelled_comic"))
            <div class="alert alert-success" role="alert">
                {{session("cancelled_comic")}}
            </div>
        @endif
        <h1>I nostri comics</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <th scope="row">{{$comic->id}}</th>
                        <td>{{$comic->title}}</td>
                        <td>{{$comic->type}}</td>
                        <td>
                            <a href="{{route('comics.show', $comic)}}" class="btn btn-success">SHOW</a>
                            <a href="{{route('comics.edit', $comic)}}" class="btn btn-primary">EDIT</a>
                            <form
                                class="d-inline"
                                action="{{route('comics.destroy', $comic)}}"
                                onsubmit="return confirm('Confermi l\'eliminazione di {{$comic->title}}?')"
                                method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
