@extends('layout')

@section('title', 'Edit')

@section('main')
  <body>
    <table class="table">
      <tr>
        <th>Travel Events</th>
        <th>Destination</th>
      </tr>
      @foreach($posts as $post)
          <tr>
            <td>
              {{$post->PostTitle}}
            </td>
            <td>
              {{$post->PostDest}}
            </td>
            <td>
              <a href='/editpost/{{$post->PostId}}'>Edit</a>
            </td>
            <td>
              <a href='/editpost/{{$post->PostId}}/delete'>Delete</a>
            </td>
          </tr>
        @endforeach
    </table>
  </body>
@endsection