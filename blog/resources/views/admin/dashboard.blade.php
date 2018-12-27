@extends('layouts.app')

@section('content')
<div class-"row">
   <div class="col-lg-3">
      <div class="card text-center">
         <div class="card-header bg-success">POSTED</div>
         <div class="card-body">
            <h1><a href="{{ route('posts') }}">{{ $posts }}</a></h1>
         </div>
      </div>
   </div>
   <div class="col-lg-3">

      <div class="card text-center">
         <div class="card-header bg-danger">Trashed Posts</div>
         <div class="card-body">
            <h1><a href="{{ route('posts.trashed') }}">{{ $trashed }}</a></h1>
         </div>
      </div>
   </div>
   <div class="col-lg-3">
      <div class="card text-center">
         <div class="card-header bg-primary">Users</div>
         <div class="card-body">
            <h1><a href="{{ route('users') }}">{{ $users }}</a></h1>
         </div>
      </div>
   </div>
   <div class="col-lg-3">
      <div class="card text-center">
         <div class="card-header bg-info">Categories</div>
         <div class="card-body">
            <h1><a href="{{route('categories')}}">{{ $categories }}</a></h1>
         </div>
      </div>
   </div>
</div>
@stop
