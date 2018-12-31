@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">Edit Channel : {{ $channel->title }}</div>

   <div class="card-body">
      <form class="" action="{{ route('channels.update', ['channel'=>$channel->id]) }}" method="post">
         {{ csrf_field() }}
         {{ method_field('PUT') }}
         <div class="form-group">
            <input type="text" name="title" class="form-control" value="{{ $channel->title }}">
         </div>
         <div class="form-group">
            <div class="text-center">
               <button class="btn btn-success" type="submit">Update Channel</button>
            </div>
         </div>

      </form>
   </div>

</div>
@endsection
