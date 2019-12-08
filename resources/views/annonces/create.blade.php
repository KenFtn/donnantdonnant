@extends('layouts.app')

@section('content')
<br><br><br><br>
<h1> Formulaire de création d'une annonce : </h1>

<h2>Ici il y as un champ pour choisir la ville, mais est-ce que ça serai pas plus malin de directement mettre l'annonce au niveau de la ville de l'utilisateur qui poste l'annonce ?</h2>
<form method="POST" action="{{ route('annonces.store') }}">
    @csrf
    <div class="">
            <label for="type">Type</label>
            <select name="type" id="type">
                <option value="">Choisir le type de l'annonce</option>
                <option value="search">Je cherche un service</option>
                <option value="offer">Je propose mes services</option>
            </select>
    </div>

    <div class="">
        <label for="title" class="">Choisir la catégorie de l'annonce</label>
        <select name="cat" id="cat">
            @foreach($mainCats as $mainCat)
            <optgroup label={{$mainCat->name}}>
                @foreach($subCats as $petite)
                    @if($petite->category_id == $mainCat->id)
                        <option>{{$petite->name}}</option>
                     @endif
                @endforeach
            </optgroup>
            @endforeach
        </select>

    <div class="">
        <label for="title" class="">Choisir le titre de l'annonce</label>
        <div class="">
            <input id="title" type="text" class="form-control @error('email') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="">
        <label for="desc" class="">Description de l'annonce</label>
        <input id="desc" type="textarea" class="@error('password') is-invalid @enderror" name="desc" required autocomplete="desc">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
    </div>

    <div class="">
        <label for="price" class="">Prix de l'annonce</label>
        <input id="price" type="text" class="@error('password') is-invalid @enderror" name="price" required autocomplete="price">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
    </div>

    <div class="">
        <label for="city" class="">Ou ?</label>
        <input id="city" type="text" class="@error('password') is-invalid @enderror" name="city_id" required autocomplete="price">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
    </div>

    <div class="">
        <button type="submit" class="btn btn-primary">
            Envoyer mon annonce
        </button>
                
    </div>
</form>

@endsection