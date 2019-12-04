@extends('layouts.app')

@section('content')

<br> <br> <br> <br>

<h1>{{$ad->title}}</h1><br>
{{$ad->price}}<br>
<h6>{{$ad->desc}}</h6><br>


<form method="post">
    @csrf
    <input type='hidden' name='ad_id' value="{{$ad->id}}">
    <input type='hidden' name='user_id' value="{{Auth::user()->id}}">
    <button type='submit'>Je reponds à cette annonce</button>
</form>
@endsection