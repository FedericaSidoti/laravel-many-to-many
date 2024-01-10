@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="card">
            <img src="{{$project->thumb}}">
            <h2>{{$project->title}}</h2>
            <p>{{$project->description}}</p>
            <p>{{optional($project->type)->name}}</p>
            
            <ul>
                @foreach ($project->technologies as $tech)
                    <li class="badge rounded-pill text-bg-primary p-2 fs-5">{{$tech->name}}</li>
                @endforeach
    
            </ul>

        </div>
    </div>
@endsection