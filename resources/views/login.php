@extends('layouts.bootmaster')

<!--@section('sidemenu')-->
<!--<img height="500" src="/images/hi.jpg" alt="">-->
<!--@endsection-->

@section('content')



<div class="row">
    <div class="col-sm-6">



    </div>
    <div class="col-sm-6">

        <h3>Log In</h3>

        {!! Form::open( ['method'=>'POST', 'action'=> 'LogController@checker'] ) !!}


        <div class="form-group">
            {!! Form::label('email','Email: ') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password','Password: ') !!}
            {!! Form::password('password', null, ['class'=>'form-control']) !!}
        </div>



        <div class="form-group">
            {!! Form::submit('create user', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

<!--        @if(count($errors)>0)-->
<!--        <div class="alert alert-danger">-->
<!--            @foreach($errors->all() as $error)-->
<!--            <ul>{{$error}}</ul>-->
<!--            @endforeach-->
<!--        </div>-->
<!--        @endif-->

    </div>
</div>

@endsection

