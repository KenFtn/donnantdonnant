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
        <div class='col-md-9'>
                <div class="card-header">{{$conv->users[0]->name}}</div>
                <div class="card-body">
                    @foreach ($conv->messages as $message)
                        <div class="row m-2">
                            <div class="col-md-10">
                                <p>
                                    <strong>{{$message->author->name}}</strong>
                                    <p>{{$message->content}}</p>
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <form action="{{route('conversations.store', $conv->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" placeholder="Ecrivez votre message" class="form-control"></textarea>
                        </div>
                        <input type=hidden name='from' value='{{Auth::user()->id}}'>
                        <input type='hidden' name='to' value='{{$conv->id}}'>
                        <button class='btn btn-primary' type='submit'>Envoyez</button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection