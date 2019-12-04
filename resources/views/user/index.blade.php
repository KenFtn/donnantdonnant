@extends('layouts.app')

@section('content')
<br>
<br><br><br><br><br><br>
Nom de l'utilisateur : {{$user->name}}<br>
Ville de l'utilisateur : {{$user->cities->name}}<br>
Mes points : {{$user->cagnotte}}<br>

Mes commentaires :
@foreach($user->comments as $comment)
{$comment->text}

@endforeach
@endsection