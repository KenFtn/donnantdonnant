@extends('layouts.app')

@section('content')
<br>
<br><br><br><br><br><br>
Nom de l'utilisateur : {{$user->name}}<br>
Ville de l'utilisateur : {{$user->cities->name}}<br>
Ses points : {{$user->cagnotte}}<br>
Sa note : {{$user->note}}<br>
<h2>Ses commentaires :</h2>
@foreach($user->comments as $comment)
contenue : {{$comment->content}}
auteur : {{$comment->author->name}}
<br>
@endforeach

<h1>Ajouter un commentaire</h1>
<form class="formComment">
    @csrf
        <label for="content" class="">Mon Commentaire</label>
        <input id="content" type="textarea" name="content" value="{{ old('content') }}" required autocomplete="content">
        <label for="note" class=''>Assignez une note à cette utilisateur</label>
        <input id='note' type='text' name='note'>
        <input id='author_id' type='hidden' name='author_id' value={{Auth::user()->id}}>
        <input id='user_id' type='hidden' name='user_id' value="{{$user->id}}">
        <button type='submit'>Envoyer</button>
</form>
@endsection
