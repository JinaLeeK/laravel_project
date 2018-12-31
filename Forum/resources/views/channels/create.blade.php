@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">Create New Channel</div>

   <div class="card-body">
      <form class="" action="{{ route('channels.store') }}" method="post">
         {{ csrf_field() }}
         <div class="form-group">
            <input type="text" name="title" class="form-control">
         </div>
         <div class="form-group">
            <div class="text-center">
               <button class="btn btn-success" type="submit">Save Channel</button>
            </div>
         </div>

      </form>
   </div>

</div>
@endsection
