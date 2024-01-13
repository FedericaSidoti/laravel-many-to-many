@extends('layouts.app');

@section('content')
    <div class="container">
        <h1> Aggiungi una nuova Tech</h1>
        <form action="{{route('admin.technologies.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome Tech</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome..." value="{{old('name')}}">
            </div>
            
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