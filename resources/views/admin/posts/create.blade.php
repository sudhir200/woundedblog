@extends('layouts.admin')

 @section('content')
   <div class="row">
        <h1>Create Post</h1>
     {!! Form::open(['action'=>'AdminPostsController@store','files'=>'true']) !!}
        <div class="form-group">
           {!! Form::label('title', 'Title:')!!}
           {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
           {!! Form::label('categoty_id', 'Category:')!!}
           {!! Form::select('category_id',[''=>'options'] + $category ,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
           {!! Form::label('photo_id', 'Photo:')!!}
           {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group ">
           {!! Form::label('body', 'Description:')!!}
           {!! Form::textarea('body',null,['class'=>'form-control ']) !!}
        </div>

        <div class="form-group">
           {!! Form::submit('Create Post',['class' =>'btn btn-primary']) !!}
        </div>
     {!! Form::close() !!}
  </div>

   <div class="row">
        @include('include.form-error');
   </div>
 @stop