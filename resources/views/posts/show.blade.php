@extends('layouts.bootmaster')


@section('sidemenu')
    @include('includes.sidemenu')
@endsection

@section('content')

    {{--@if(Session::has('deleted_post'))--}}
        {{--<div class="bg-danger text_muted">{{Session('deleted_post')}}</div>--}}
    {{--@endif--}}



    <div class="card m-3" style="width:75%">
        @if($post->photo)
            <img height="250" class="card-img-top img-responsive" src="{{$post->photo->name}}" alt="Card image cap">
        @endif
        <div class="card-header">{{$post->title}}</div>
        <div class="card-body">
            <p class="card-text">{{$post->content}}</p>
            <p class="text-muted" style="font-style: italic">-Weitten By: {{$post->user->name}}</p>

        </div>
        <p class="card-footer text-info">CATAGORY:{{$post->catagory->name}}</p>
    </div>


@endsection