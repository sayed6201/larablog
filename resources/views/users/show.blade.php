@extends('layouts.bootmaster')

@section('sidemenu')
    @include('includes.sidemenu')
@endsection


@section('content')

    <div class="card mx-sm-auto text-center " style="width:75%">

        <div class="card-header">Profile Info</div>
        <div class="card-body">
            @if($user->photo)
                <img style="width:50%; height: 50%" class="card-img-top img-responsive" src="{{$user->photo->name}}" alt="Card image cap">
            @else
                <p class="text-muted">No img</p>
            @endif
            <p class="card-text">{{$user->name}}</p>
            <p class="card-text">{{$user->email}}</p>
            <p class="card-text">{{$user->role->name}}</p>
            <p class="card-text">JOINED ON: {{$user->created_at->diffForHumans()}}</p>
        </div>
        <a class="btn btn-info" href="{{url('users/edit/'.$user->id)}}">Update Profile</a>
    </div>

    @endsection