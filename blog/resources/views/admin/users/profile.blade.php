@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<div class="card">
   <div class="card-header">
      Edit your profile
   </div>
   <div class="card-body">
      <form class="" action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
         </div>
         <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
         </div>
         <div class="form-group">
            <label for="password">New password</label>
            <input type="password" name="password" class="form-control" value="">
         </div>
         <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" class="form-control" value="">
         </div>
         <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="input" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
         </div>
         <div class="form-group">
            <label for="youtube">Youtube</label>
            <input type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube }}">
         </div>
         <div class="form-group">
            <label for="about">About You</label>
            <textarea name="about" rows="5" class="form-control">{{ $user->profile->about }}</textarea>
         </div>

         <div class="form-group">
            <div class="text-center">
               <button type="submit" class="btn btn-success">Update your profile</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
