@extends('layout.app')
@section('edit')
    <div class="jumbotron"></div>

    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-title">
                        <h2 class="text-center">Nuovo Fumetto</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('comics.update', $comic->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div>
                                <div class="input-group mb-3">
                                    <label for="title">Titolo</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{$comic->title}}">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="description">Descrizione</label>
                                    <textarea name="description" id="description" cols="30" rows="10">{{$comic->description}}</textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="thumb">Link immagini</label>
                                    <input type="text" class="form-control" name="thumb" id="thumb" value="{{$comic->thumb}}">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="price">Prezzo</label>
                                    <input type="text" class="form-control" name="price" id="price" value="{{$comic->price}}">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="series">Serie</label>
                                    <input type="text" class="form-control" name="series" id="series" value="{{$comic->series}}">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="sale_date">Data di Uscita</label>
                                    <input type="date" class="form-control" name="sale_date" id="sale_date" value="{{$comic->sale_date}}">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="type">Serie</label>
                                    <input type="text" class="form-control" name="type" id="type" value="{{$comic->type}}">
                                </div>
                                <button type="submit" class="btn bnt-sm btn-success">Conferma</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection