@extends('layouts.bootmaster')

@section('content')
    <h1>Create Catagory</h1>
    <div class="row">
        <div class="col-sm-6">



        </div>
        <div class="col-sm-6">

            {!! Form::open( ['method'=>'POST', 'action'=> 'AdminCatagoriesController@store'] ) !!}

            <div class="form-group">
                {!! Form::label('name','Name: ') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('create', ['class'=>'btn btn-primary']) !!}
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