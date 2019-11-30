@extends('layouts.app')

@section('content')

    @foreach ($ads as $ad)
        <a href='{{route('annonces.show', [$ad->id, $ad->slug])}}'> Lien </a>
    @endforeach

@endsection