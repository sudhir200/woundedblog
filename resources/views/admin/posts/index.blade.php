@extends('layouts.admin')

 @section('content')

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Owner</th>
                <th>Photo_id</th>
                <th>Category_id</th>
                <th>Title</th>
                <th>Body</th>
                <th>created at</th>
                <th>updated at</th>
            </tr>
        </thead>
        <tbody>
           @foreach($posts as $post)
              <tr>
                  <td>{{$post->id}}</td>
                  <td><a href="{{route('posts.edit',[$post->id])}}">{{$post->user['name']}}</a></td>
                  <td><img height="50" src="{{$post->photo ? $post->photo['file'] : 'https://placehold.it/400x400'}}" alt=""></td>
                  <td>{{$post->category_id ? $post->category['name'] : 'UNKNOWN'}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->body}}</td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>
              </tr>
           @endforeach
        <tbody>
    </table>
 @stop