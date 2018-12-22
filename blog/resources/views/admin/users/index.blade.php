@extends('layouts.app')

@section('content')
@include('admin.includes.errors')

<div class="card">
   <div class="card-header">
      Users
   </div>
   <div class="card-body">

      <table class="table table-hover">
         <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Permissions</th>
            <th>Delete</th>
         </thead>
         <tbody>
            @if($users->count()>0)
               @foreach($users as $user)
               <tr>
                  <td><img src="{{ asset($user->profile->avatar) }}" alt="{{$user->name}}" width="50px" height="50px" style="border-radius:50%;"/></td>
                  <td>{{ $user->name }}</td>
                  <td>
                     <a href="{{ route('user.admin', ['id'=>$user->id]) }}" class="btn btn-sm
                        @if($user->admin)
                           btn-danger">Remove Permission
                        @else
                           btn-primary">Make admin
                        @endif
                     </a>
                  </td>
                  <td>
                     @if(Auth::id() != $user->id )
                        <a href="{{ route('user.delete',['id'=>$user->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                     @endif
                  </td>
               </tr>
               @endforeach
            @else
               <tr>
                  <th colspan="5" class="text-center">No users</th>
               </tr>
            @endif
         </tbody>
      </table>
   </div>
</div>

@stop
