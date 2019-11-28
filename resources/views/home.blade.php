@extends('layouts.app')


@section('content')
<section class="entete">
    <div class="gradient"></div>
    <h1>Vous allez adorer<br>partager !</h1>
    <div class='twoBtn'>
        <a href="{{ route('annonces.create', 'search')}}">J'ai besoin d'aide !</a>
        <a href="{{route('annonces.create', 'propose')}}">Je propose mon aide !</a>
    </div>
    <div class="bandeNoire">
        <p>Partagez</p>
        <div></div>
        <p>Echangez</p>
        <div></div>
        <p>Economisez</p>
    </div>
</section>   
<section class="explications">
    <p>Comment ça marche ??</p>
    <p><span>DonnantDonnant</span> vous met en relation avec vos voisins <span>gratuitement</span> afin d'échanger services et objets.
    <span>DonnantDonnant</span> fonctionne avec le principe de "un donné pour un rendu" :
        Vous gagnez des points en rendant service et les dépensez pour qu'on vienne vous rendre service ! 
    </p>
    <div class="ronds">
        <div class="rondtxt">
            <div class="rond rond_one">
                1
            </div>
            <p>Je cherche ou propose un service</p>
        </div>
        <div class="rondtxt">
            <div class="rond rond_two">
                2
            </div>
            <p>Je prends contact<br></p>
        </div>
        <div class="rondtxt">
            <div class="rond rond_three">
                3
            </div>
            <p>Donnant Donnant !<br></p>
        </div>
    </div>
    <p>Je n'attends plus</p>
    <div class="inscri">
        <a href="{{ route('register') }}">Je m'inscris !</a>
     </div>   
</section>

<section class="besoin">
    <div class="ligneBleue">
        <div></div>
        <h3>Ils ont besoin de vous !</h3>  
    </div>

    <div class="categoriesBesoin">
        @foreach($categories as $category)
        <form class="formBesoin">
            @csrf
            <button type="submit" class="btn-cat">{{$category->name}}</button>
            <input type="hidden" name="cat" value="{{$category->id}}">
        </form>
        @endforeach
        <a href={{route('annonces.index', 'search')}}>voir tout </a>
    </div>

    <div class="annoncesB">
        
    </div>
</section>

<section class="peutetre">
    <div class="ligneBleue">
        <div></div>
        <h3>Vous avez peut-être besoin d'eux</h3>  
    </div>

    <div class="catPeutetre">
        @foreach($categories as $category)
        <form class="formOffer">
            <button type="submit" class="btn-cat">{{$category->name}}</button>
            <input type="hidden" name="cat" value="{{$category->id}}">
        </form>
        @endforeach
    </div>   
</section>
@endsection