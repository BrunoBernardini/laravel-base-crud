@extends("layouts.main")

@section("content")
    <div class="container">
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
                            <a href="#" class="btn btn-primary">EDIT</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
