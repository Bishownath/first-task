@extends('layouts.app')

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
                        @if (auth()->user()->check_role == 'admin')
                        {{ __('You are logged in as admin!') }}
                        
                        @else
                        {{ __('You are logged in as user!') }}
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
