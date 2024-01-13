@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    <div class="row justify-content-center p-5">
                        <div class="col-3 d-flex p-1">
                            <button class=" btn btn-info">
                                <a href={{route('admin.projects.index')}}>
                                    <h3>Accedi ai Progetti </h3>
                                </a>
                            </button>
                        </div>

                        <div class="col-3 d-flex p-1">
                            <button class=" btn btn-info">
                                <h2> <a href="{{ route('register') }}">Registra Admin</a></h2>
                            </button>
                        </div>

                        <div class="col-3 d-flex p-1">
                            <button class=" btn btn-info">
                                <h2> <a href="{{route('admin.types.index')}}">Accedi ai Tipi</a></h2>
                            </button>
                        </div>

                        <div class="col-3 d-flex p-1">
                            <button class=" btn btn-info">
                                <h2> <a href="{{route('admin.technologies.index')}}">Accedi alle Tech</a></h2>
                            </button>
                        </div>

                    </div>
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

    

    
</div>
@endsection
