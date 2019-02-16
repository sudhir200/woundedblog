@extends('layouts.admin')

@section('content')
<div class="row">

      <div class="col-sm-3">
        <img src="{{$user->photo['file']}}" alt="" class="img-responsive img-circle">
      </div>

    <div class="col-sm-9">
       {!! Form::model($user,['method'=>'PATCH','action'=>[ 'AdminUserController@update',$user->id],'files'=>true]) !!}
      <div class="form-group">
        {!! Form::label('name', 'Name:')!!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('email', 'Email:')!!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('role_id', 'Role:')!!}
        {!! Form::select('role_id',['' => 'choose option'] + $roles ,null,['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('is_active', 'Status:')!!}
        {!! Form::select('is_active',[1=>'Active',2=>'Not Active'],0,['class'=>'form-control']) !!}
      </div>


      <div class="form-group">
        {!! Form::label('password', 'Password:')!!}
        {!! Form::password('password',['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('Photo', 'Photo:')!!}
        {!! Form::file('photo',null,['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::submit('Edit User',['class' =>'btn btn-primary col-sm-6   ']) !!}
      </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminUserController@destroy',$user->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete User',['class' =>'btn btn-danger col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

    </div>



</div>



<div class="row">

    @include( 'include.form-error');
</div>


@stop