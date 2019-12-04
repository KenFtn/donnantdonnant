@extends('layouts.app')

@section('content')
<br>
<br><br><br><br><br><br>
Nom de l'utilisateur : {{$user->name}}<br>
Ville de l'utilisateur : {{$user->cities->name}}<br>
Mes points : {{$user->cagnotte}}<br>
Ma note : {{$user->note}}<br>
<h2>Mes commentaires :</h2>
@foreach($user->comments as $comment)
contenue : {{$comment->content}}
auteur : {{$comment->author->name}}
<br>
@endforeach

@endsection