@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<div class="card">
   <div class="card-header">
      create a new user
   </div>
   <div class="card-body">
      <form class="" action="{{ route('user.store') }}" method="post" >
         {{ csrf_field() }}
         <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="">
         </div>
         <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" class="form-control" value="">
         </div>
         <div class="form-group">
            <div class="text-center">
               <button type="submit" class="btn btn-success">Add new user</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
