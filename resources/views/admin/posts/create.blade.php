@extends('layouts.bootmaster')

@section('content')
    <h1>Create Post</h1>


            {!! Form::open( ['method'=>'POST', 'action'=> 'AdminPostsController@store', 'files'=>true] ) !!}

            <div class="form-group">
                {!! Form::label('title','Title Of Post: ') !!}
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

            <div class="form-group">
                {!! Form::submit('create user', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

            @include('includes.error')





@stop