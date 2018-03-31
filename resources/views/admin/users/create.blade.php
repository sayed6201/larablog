@extends('layouts.bootmaster')

@section('content')
    <h1>Create Users</h1>
    <div class="row">
        <div class="col-sm-6">



        </div>
        <div class="col-sm-6">

            {!! Form::open( ['method'=>'POST', 'action'=> 'AdminUsersController@store', 'files'=>true] ) !!}

            <div class="form-group">
                {!! Form::label('name','Name: ') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email','Email: ') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password','Password: ') !!}
                {!! Form::password('password', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-5">
                {!! Form::label('is_active','Active: ') !!}
                {!! Form::select('is_active', ['1'=>'Acive','0'=>'Inactive'], null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-5">
                {!! Form::label('role_id','Active: ') !!}
                {!! Form::select('role_id', [''=>'Choose Option']+$roles, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-5">
                {!! Form::label('photo_id','Photo: ') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('create user', ['class'=>'btn btn-primary']) !!}
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