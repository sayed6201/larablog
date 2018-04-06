@extends('layouts.bootmaster')

@section('sidemenu')
    @include('includes.sidemenu')
@endsection

@section('content')
    <h1 class="text-center">Edit Users</h1>
    <div class="row">
        <div class="col-sm-6">
            <div class="mt-50">
                @if($post->photo)
                    <img height="300px" src='{{$post->photo->name}}' alt="">
                @else
                    <p class="text-muted">No img</p>
                @endif
            </div>


        </div>
        <div class="col-sm-6">

            {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostsController@Userupdate', $post->id], 'files'=>true] ) !!}

            <div class="form-group">
                {!! Form::label('title','title: ') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('content','Write Post: ') !!}
                {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-5">
                {!! Form::label('catagory_id','Select Catagory: ') !!}
                {!! Form::select('catagory_id', [''=>'Choose Option']+$catagories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-5">
                {!! Form::label('photo_id','Photo: ') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control custom-file-input']) !!}
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::submit('Save Changes', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-6">
                    {{--<div class="form-group">--}}
                        {{--{!! Form::open( ['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id]] ) !!}--}}
                        {{--{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}--}}
                        {{--{!! Form::close() !!}--}}
                    {{--</div>--}}
                </div>
            </div>


            {!! Form::close() !!}

            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <ul>{{$error}}</ul>
                    @endforeach
                </div>
            @endif

        </div>
    </div>



@stop