@extends('layouts.bootmaster')

@section('sidemenu')
    @include('includes.sidemenu')
@endsection

@section('content')
    @if(Session::has('deleted_user'))
        <div class="bg-danger text_muted">{{Session('deleted_user')}}</div>
    @endif
    <h1>Users Info</h1>
    @if(count($users))
        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Active</th>
                <th scope="col">Role</th>
                <th scope="col">Image Location</th>
                <th scope="col">Created at</th>
                <th scope="col"></th>


            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">
                    @if($user->photo)
                    <img height="50" src='{{$user->photo->name}}' alt="">
                        @else
                                <p class="text-muted">No img</p>
                    @endif
                </th>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->is_active? 'Yes' : 'No'}}</td>
                <td>{{$user->role? $user->role->name : 'subscriber'}}</td>
                <td>{{$user->photo? $user->photo->name : 'No Photo'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>
                    <a class="btn btn-primary" href="/admin/users/edit/{{$user->id}}">Edit</a>
                    {!! Form::open( ['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id] ] ) !!}
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
        <h1 class="text-center">NO Users Available</h1>
    @endif
 @stop