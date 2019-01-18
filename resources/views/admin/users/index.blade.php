@extends('layouts.admin')

@section('content')

    <<table class="table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>created at</th>
              <th>updated at</th>

          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <th>{{$user->role['name']}}</th>
              <td>
                  {{$user->is_active == 1 ? 'Active' : 'Inactive'}}

              </td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>

          </tr>
        <tbody>
        @endforeach
     </table>

@stop

