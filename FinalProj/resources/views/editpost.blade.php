@extends('layout')

@section('title', 'Make a Post')

@section('main')
  <div class="row">
      <div class="col-9">
          <form action="/editpost/{{$postId}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" id="title" name="title" placeholder="Input a new travel event" class="form-control" value="{{old('title')}}">
                <small class="text-danger">{{$errors->first('title')}}</small>
                <input type="text" id="destination" name="destination" placeholder="Input a destination" class="form-control" value="{{old('destination')}}">
                <small class="text-danger">{{$errors->first('destination')}}</small>
            </div>
            <button type="submit" class="btn btn-primary">
                Save
            </button>
          </form>
      </div>
  </div>
@endsection