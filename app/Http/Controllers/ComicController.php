<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());

        $new_comic = new Comic();

        $new_comic->fill($data);
        
        $new_comic->save();

        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view ('show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        return view('edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $this->validation($request->all());

        $comic->update($data);

        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }

    private function validation($data){

        $validator = Validator::make(
            $data,
            [
                'title' => 'required|max:50|min:5',
                'thumb' => 'required',
                'price' => 'required|max:10',
                'series' => 'required|min:5',
                'sale_date' => 'required|date',
                'type' => 'required'
            ],
            [
                'title.required' => 'Campo obbligatorio',
                'title.max' => 'Massimo 50 caratteri',
                'title.min' => 'Minimo 5 caratteri',
                'thumb.required' => 'Campo obbligatorio',
                'price.required' => 'Campo obbligatorio',
                'price.max' => 'Massimo 10 caratteri',
                'series.required' => 'Campo obbligatorio',
                'series.min' => 'Minimo 5 caratteri',
                'sale_date.required' => 'Campo obbligatorio',
                'sale_date.date' => 'Inserisci una data valida',
                'type.required' => 'Campo obbligatorio',
                
            ]
            )->validate();
            
            return $validator;
        }
}
