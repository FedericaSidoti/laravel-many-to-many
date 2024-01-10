@extends('layouts.app');

@section('content')
    <div class="container">
        <h1> Modifica il progetto: {{$project->title}}</h1>
        <form action="{{route('admin.projects.update', $project->id)}}" method="POST">
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Nome Progetto</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Nome..." value="{{old('title', $project->title)}}">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">URL immagine</label>
                <input type="text" class="form-control" name="thumb" id="thumb" value="{{old('thumb',  $project->thumb)}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Descrizione del progetto">{{old('description', $project->description)}}</textarea>
            </div>

            <select name="type_id" class="form-control" id="type_id">
                <option>Seleziona una categoria</option>
                @foreach($types as $type)
                    <option @selected( old('type_id', optional($project->type)->id) == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

            <div>
                <input type="submit" class="btn btn-primary" value="Modifica">
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