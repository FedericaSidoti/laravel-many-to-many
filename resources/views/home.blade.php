@extends ('layouts.guests')

@section('title')
    HomeGuests
@endsection

@section('content')

    <div class="container">
        <h1 class="p-5 text-light">Homepage</h1>
        <div class="row justify-content-center">
        @forelse ($projects as $project)
        <div class="col-4 mb-4">
            <div class="card">
                <h2>{{$project->title}}</h2>
                <img src="{{$project->thumb}}">
                <p>{{$project->description}}</p>
            </div>
        </div>
        @empty
            <h2> Non ci sono progetti da mostrare!</h2>
        @endforelse
        </div>
    
        <button class="btn btn-info mb-3"><a href="{{route('admin.dashboard')}}">Vai alla Admin Table </a></button>
    </div>



    
    
@endsection