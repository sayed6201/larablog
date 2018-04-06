@extends('layouts.bootmaster')

@section('sidemenu')
    @include('includes.sidemenu')
@endsection

@section('content')
    <h1 class="text-center">Edit Users</h1>
    <div class="row">
        <div class="col-sm-6">
        <div class="mt-50">
            @if($user->photo)
            <img height="500" src='{{$user->photo->name}}' alt="">
            @else
                <p class="text-muted">No img</p>
            @endif
        </div>


        </div>
        <div class="col-sm-6">

            {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id], 'files'=>true] ) !!}

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
                {!! Form::submit('edit user', ['class'=>'btn btn-primary']) !!}
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