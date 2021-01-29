@extends('/layouts/app')

@section('content')

<div class="container">
    <Collection @if(Auth::check()) :admin="true" :user="{{Auth::user()}}" @else :admin="false" :user="false" @endif></Collection>
</div>

@endsection