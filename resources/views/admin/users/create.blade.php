@extends('layouts.admin')

@section('content')
<h1>create form</h1>
{!! Form::open(['action'=>'AdminUserController@store','files'=>true]) !!}


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
{!! Form::label('photo', 'Photo:')!!}
{!! Form::file('photo',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
{!! Form::submit('Create User',['class' =>'btn-primary']) !!}
</div>

{!! Form::close() !!}

 @include( 'include.form-error');
@stop