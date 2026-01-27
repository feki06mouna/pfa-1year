@extends('layouts.app')
<!--s'ouvre lorsque tu fais la login-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                
            </div>
            <div class="text-center mt-1">
                <a href="/stagiaire/form" class="btn btn-primary">ajouter</a>
            </div>
        </div>
    </div>
</div>
@endsection
