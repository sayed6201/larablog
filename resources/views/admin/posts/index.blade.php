@extends('layouts.bootmaster')

@section('sidemenu')
    @include('includes.sidemenu')
@endsection

@section('sidemenu')
    @include('includes.sidemenu')
@endsection


@section('content')

    @if(Session::has('deleted_post'))
        <div class="bg-danger text_muted">{{Session('deleted_post')}}</div>
    @endif


            @foreach($posts as $post)
                <div class="card m-3" style="width:75%">
                    <img height="250" class="card-img-top img-responsive" src="{{$post->photo->name}}" alt="Card image cap">
                    <div class="card-header">{{$post->title}}</div>
                    <div class="card-body">
                        <p class="card-text">{{str_limit($post->content,90)}}</p>
                        <a href="{{url('/admin/posts/show/'.$post->id)}}" class="">Read full post</a>
                        <p class="text-muted" style="font-style: italic">-Weitten By: {{$post->user->name}}</p>
                    </div>
                    <p class="card-footer text-info">CATAGORY:{{$post->catagory->name}}</p>
                </div>
            @endforeach

@endsection