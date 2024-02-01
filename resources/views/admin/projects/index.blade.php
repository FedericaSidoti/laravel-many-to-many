@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Tutti i Progetti
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
    <div class="row p-3">
        <button class=" btn btn-info">
            <h2> <a href="{{route('admin.projects.create')}}">Crea Nuovo Progetto</a></h2>
        </button>
    </div>

    <div class="row p-5">
        <table class="table table-striped">
            <thead class="table-info">
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
            {{-- Ciclo forelse: projects --}}
            @forelse ($projects as $project)
                {{-- Modale --}}
                <div class="modal fade" id="modal-{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Attenzione</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3>Vuoi davvero eliminare {{$project->title}}?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
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
                        <p class="h-100 d-flex align-items-center py-4">{{$project->id}}</p>
                    </th>
                    <td>
                        <div class="table-item-wrap h-100">
                            <h2 class=" text-center py-4">{{$project->title}}</h2>
                        </div>
                        
                    </td>
                    <td>
                        <div class="table-item-wrap h-100">
                            <p class=" text-center py-4">{{$project->description}}</p>
                        </div>
                        
                    </td>
                    <td>
                        <div class="table-item-wrap h-100">
                            <div class="d-flex py-2">
                                <button class="btn btn-info mx-2"><a href="{{route('admin.projects.show', $project->id)}}">Dettagli</a></button>
                                <button class="btn btn-info mx-2"><a href="{{route('admin.projects.edit', $project->id)}}">Modifica</a></button>
                                <button type="button" class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#modal-{{$project->id}}">Elimina</button>
                            </div>
                        </div>
                        
                    </td>
                    
                </tr>
                @empty
                    <tr><h2>Non ci sono progetti da mostrare!</h2></tr>
                @endforelse
            </tbody>
        </table>
    

    
</div>
@endsection