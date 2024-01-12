@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Tutti i Tipi 
    </h2>

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row p-5">
        <table class="table table-striped">
            <thead class="table-info">
                <tr class="text-center">
                    <th class="text-center" scope="col">num</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center">Azioni</th>
                </tr>
            </thead>
            <tbody class="text-center">
            {{-- Ciclo forelse: projects --}}
            @forelse ($types as $type)
                {{-- Modale --}}
                <div class="modal fade" id="modal-{{$type->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Attenzione</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3>Vuoi davvero eliminare {{$type->name}}?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{route('admin.types.destroy', $type->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Fine modale --}}
                <tr>
                    <th scope="row">
                        <p class="text-center">{{$type->id}}</p>
                    </th>
                    <td>
                        <p>{{$type->name}}</p>
                    </td>
                    <td>
                        <div class="d-flex justify-content-around py-4">
                            
                            <button class="btn btn-info"><a href="{{route('admin.types.edit', $type->id)}}">Modifica</a></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$type->id}}">Elimina</button>
                        </div>
                    </td>
                    
                </tr>
                @empty
                    <tr><h2>Non ci sono progetti da mostrare!</h2></tr>
                @endforelse
            </tbody>
        </table>

        <button class="btn btn-info"><a href="{{route('admin.types.create')}}">Crea nuovo tipo</a></button>

    

    
    </div>
@endsection