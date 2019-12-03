@extends('layouts.app')

@section('content')

    @foreach ($mainCat as $ad)
        {{$ad->name}}
    @endforeach

@endsection