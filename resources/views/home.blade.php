@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ( Auth::user()->user_role == 1 )
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                        <div class="card-body">
                            {{ __('Welcome, You have logged in!') }}
                        </div>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        {{ __('We will nofity you') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
