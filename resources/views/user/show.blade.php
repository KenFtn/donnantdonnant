@extends('layouts.app')

@section('content')
<div class="mainUser">
    <div class="colDroite">
        <div class="bonhomme">
            <div class="imgBulle">
                <img src="{{asset( Auth::user()->avatar)}}" alt="photo de profil">
                <a href=""><div class="rondTof">
                    <i class="fas fa-camera"></i>
                </div></a>
            </div>    
            <p>Bonjour,<span> {{$user->name}} !</span></p>
        </div>
        <form action="{{ route('edit.avatar') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div>
                <input type="file" name="image" id="image"  value="{{ old('image') }}">
            </div>
            <button type="submit">Envoyer !</button>
        </form>
		<div class="bonhomme">
			
		</div>

    </div>        
Ville de l'utilisateur : {{$user->cities->name}}<br>
Mes points : {{$user->cagnotte}}<br>
Ma note : {{$user->note}}<br>

<h2>Mes commentaires :</h2>
<hr>
@foreach($user->comments as $comment)
contenue : {{$comment->content}}
auteur : {{$comment->author->name}}
<br><hr>
@endforeach

<h2>Mes Annonces :</h2>
<hr>
@foreach($ads as $ad)
<h3>{{$ad->title}}</h3>
{{$ad->categories}}

<form action="{{ route('annonces.destroy', $ad->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
</form>

<p>{{$ad->user}}</p>
<hr>
@endforeach
<h1>QUESTION : EST-CE QUE ON PERMET DE SUPP N'IMPORTE QUAND MËME SI DES GENS ONT POSTULER A L'ANNONCE ? ON POURRA PAS PREVENIR LES GENS QUE L'ANNONCE A ETE SUPPRIMER</h1>


<p>
    On peux classer les annonces comme suit : <br>
        - Les annonces avec réponse avec {$ad->user} -> ça liste les utilisateurs qui ont répondu. Je sais pas encore comment on peu gérer ça en front sans que ça soit le bordel 
        parce que aprés, faut refaire un formulaire qui va envoyer les données suivante : L'annonce confirmé pour pouvoir effacer les autres entrée et l'id de l'utilisateur choisie
        pour le confirmer.<br>
        - Les annonces qui sont validé avec {$ad->user_id} -> si le champ n'es pas nul, alors il y as quelqu'un qui s'est positionner dessus.<br>
        - Les annonces sans réponse ont un {$ad->user} vide.
</p>
</div>
@endsection