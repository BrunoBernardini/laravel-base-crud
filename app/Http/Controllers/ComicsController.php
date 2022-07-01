<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy("id", "desc")->get();
        return view("comics-CRUD.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comics-CRUD.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data["slug"] = $this->generateSlug($data["title"]);
        $new_comic = new Comic;
        $new_comic->fill($data);
        $new_comic->save();
        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        if($comic) return view("comics-CRUD.show", compact("comic"));
        abort(404, "Comic non trovato");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        if($comic) return view("comics-CRUD.edit", compact("comic"));
        abort(404, "Comic non trovato");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        if($comic->title != $data["title"]) $data["slug"] = $this->generateSlug($data["title"]);
        else $data["slug"] = $comic->slug;
        $comic->update($data);
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route("comics.index")->with("cancelled_comic", "Il comic $comic->title è stato cancellato correttamente.");
    }

    private function generateSlug($string){
        $slug = Str::slug($string, "-");
        $controlSlug = Comic::where("slug", $slug)->first();
        if($controlSlug){
            $counter = 1;
            while(Comic::where("slug", "$slug-$counter")->first()){
                $counter++;
            }
            $slug .= "-$counter";
        }
        return $slug;
    }
}
