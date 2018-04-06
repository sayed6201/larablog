@extends('layouts.bootmaster')

@section('sidemenu')
    @include('includes.sidemenu')
@endsection

@section('content')
    @if(Session::has('deleted_post'))
        <div class="bg-danger text_muted p-sm-2 text-center mx-sm-auto">{{Session('deleted_post')}}</div>
    @endif
    <h1>Your Posts</h1>
    @if(count($posts))
        <table class="table table-hover table-dark">
            <thead>
            <tr>

                <th>IMAGE</th>
                <th scope="col">TITLE</th>
                <th scope="col">CONTENT</th>
                <th scope="col">CATAGORY</th>
                <th scope="col">Created at</th>
                <th scope="col">   </th>

            </tr>
            </thead>

            <tbody>
            @foreach($posts as $post)

                <tr>
                    <td scope="row">
                        @if($post->photo)
                            <img height="50" src='{{$post->photo->name}}' alt="">
                        @else
                            <p class="text-muted">No img</p>
                        @endif
                    </td>
                    <td><a href="{{url('posts/show/'.$post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->content,150)}}</td>
                    <td>{{$post->catagory? $post->catagory->name : 'Uncatagorized'}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('posts/edit/'.$post->id)}}">Edit</a>
                        {!! Form::open( ['method'=>'DELETE', 'action'=>['AdminPostsController@Userdestroy', $post->id] ] ) !!}
                        <div class="form-group mt-sm-2">
                            {!! Form::submit('Delete', ['class'=>'btn btn-alert']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">you haven't posted anything</h1>
    @endif
@stop