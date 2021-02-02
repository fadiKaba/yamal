@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        
        <Cover></Cover>
        <Collection></Collection>
        <Videos @if(Auth::check()) :admin="true" @else :admin="false" @endif></Videos>
    </div>
</div>

@endsection


{{-- 
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
</div> --}}