@extends('layouts.app')

@section('content')
    <form action="/search" method="POST">
        {{csrf_field()}}
        <input type="text" name="query" placeholder="{{ __('friend.search') }}" />
    </form>

    <h1>{{ __('friend.rlist') }}</h1>
        @foreach($fr as $f)
            @include("res.befriend")
        @endforeach()

    <h1>{{ __('friend.flist') }}</h1>
        @foreach($fl as $f)
            @include("res.friend")
        @endforeach()
@endsection
