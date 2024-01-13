@extends('layouts.app');

@section('content')
    <div class="container">
        <h1> Modifica la tech: {{$technology->name}}</h1>
        <form action="{{route('admin.types.update', $technology->id)}}" method="POST">
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome Tech</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome..." value="{{old('name', $technology->name)}}">
            </div>

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