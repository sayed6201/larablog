@extends('layouts.bootmaster')

@section('content')
    @if(Session::has('deleted_catagory'))
        <div class="bg-danger text_muted">{{Session('deleted_catagory')}}</div>
    @endif
    <h1>Users Info</h1>
    @if(count($catagories))
        <table class="table table-hover table-dark">
            <thead>
            <tr>

                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col"></th>


            </tr>
            </thead>

            <tbody>
            @foreach($catagories as $catagory)
                <tr>

                    <th scope="row">{{$catagory->id}}</th>
                    <td>{{$catagory->name}}</td>
                    <td>{{$catagory->created_at->diffForHumans()}}</td>
                    <td>
                        <a class="btn btn-primary" href="/admin/catagories/edit/{{$catagory->id}}">Edit</a>

                        {!! Form::open( ['method'=>'DELETE', 'action'=>['AdminCatagoriesController@destroy', $catagory->id] ] ) !!}
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
        <h1 class="text-center">NO Catagory Available</h1>
    @endif
@stop