@extends('layout')

@section('title', 'Profile')

@section('main')
  <p>UserID: {{$user->id}}</p>
  <p>Username: {{$user->username}}</p>
@endsection