@extends('layouts.admin')

 @section('content')
     @if(Session::has('deleted_user'))
        <div class="alert alert-danger">
            <p>{{session('deleted_user')}}</p>
        </div>
     @elseif(Session::has('updated_user'))
          <div class="alert alert-success ">
             <p>{{session('updated_user')}}</p>
          </div>
     @elseif (Session::has('created_user'))
          <div class="alert alert-info ">
            <p>{{session('created_user')}}</p>
          </div>
     @endif

    <table class="table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>photo</th>
              <th>created at</th>
              <th>updated at</th>

          </tr>
        </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
              <td>{{$user->id}}</td>
              <td><a href="{{route('user.edit',[$user->id])}}">{{$user->name}}</a></td>
              <td>{{$user->email}}</td>
              <th>{{$user->role['name']}}</th>
              <td>
                  {{$user->is_active == 1 ? 'Active' : 'Inactive'}}
              </td>
              <td><img height="50" src="{{$user->photo ? $user->photo['file'] : 'https://placehold.it/400x400'}}" alt=""></td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
        @endforeach
      <tbody>


    </table>
 @stop

