@extends('layouts.admin')

@section('content')

    {!! Form::model($post,['method'=>'PATCH','action'=>[ 'AdminPostsController@update',$post->id],'files'=>true]) !!}

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
        {!! Form::submit('Edit Post',['class' =>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}

@stop