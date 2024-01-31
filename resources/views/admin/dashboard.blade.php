@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header d-flex justify-content-center">{{ __('Admin Dashboard') }}</div>

                <div class="card-body d-flex flex-column">
                    

                            <button class=" btn btn-info mb-3">
                                <a href={{route('admin.projects.index')}}>
                                    <h3>Accedi ai Progetti </h3>
                                </a>
                            </button>



                            <button class=" btn btn-info mb-3">
                                <h2> <a href="{{ route('register') }}">Registra Admin</a></h2>
                            </button>



                            <button class=" btn btn-info mb-3">
                                <h2> <a href="{{route('admin.types.index')}}">Accedi ai Tipi</a></h2>
                            </button>



                            <button class=" btn btn-info">
                                <h2> <a href="{{route('admin.technologies.index')}}">Accedi alle Tech</a></h2>
                            </button>


                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                        <div class="d-flex justify-content-center">
                            {{ __('You are logged in!') }}
                        </div>
                    
                </div>
            </div>
        </div>
    </div>

    

    
</div>
@endsection
