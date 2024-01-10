@extends('layouts.app');

@section('content')
    <div class="container">
        <h1> Aggiungi un progetto</h1>
        <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nome Progetto</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Nome..." value="{{old('title')}}">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">URL immagine</label>
                <input type="text" class="form-control" name="thumb" id="thumb" value="{{old('thumb')}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Descrizione del progetto">{{old('description')}}</textarea>
            </div>
            

            <select name="type_id" class="form-control" id="type_id">
                <option>Seleziona una categoria</option>
                @foreach($types as $type)
                    <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

            <div>
                <input type="submit" class="btn btn-primary" value="Aggiungi">
            </div>

        </form>

        

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection