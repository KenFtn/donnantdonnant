@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="container ">
    <div class='row m-5'>
        <div class='col-md-3'>
            <div class ="list-group">
                @foreach ($conversations as $conversation)
                    <a class='list-group-item' href="{{ route('conversations.show', $conversation->id)}}">{{$conversation->users[0]->name}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection