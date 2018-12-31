@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      <img src="{{ $discussion->user->avatar }}" width="40px" alt="">&nbsp;&nbsp;
      <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
      <span>
         <a href="{{ route('discussion', ['slug'=>$discussion->slug]) }}" class="btn btn-primary btn-sm float-right">View</a>
      </span>
   </div>
   <div class="card-body">
      <h3 class="text-center">{{ $discussion->title }}</h3>
      <p class="text-center">
         {{ $discussion->content }}
      </p>
   </div>
   <div class="card-footer">{{ $discussion->replies->count() }} Replies</div>
</div>

<br>
@foreach($discussion->replies as $r)
<div class="card">
   <div class="card-header">
      <img src="{{ $r->user->avatar }}" width="40px" alt="">&nbsp;&nbsp;
      <span>{{ $r->user->name }}, <b>{{ $r->created_at->diffForHumans() }}</b></span>
   </div>
   <div class="card-body">
      <p class="">
         {{ $r->content }}
      </p>
   </div>
   <div class="card-footer"><p>Like</p></div>
</div>
<br>
@endforeach
<div class="card">
   <div class="card-body">
      <form class="" action="{{ route('discussion.reply', ['id'=>$discussion->id]) }}" method="post">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="">Leave a reply...</label>
            <textarea name="content" cols="10" rows="10" class="form-control"></textarea>
         </div>
         <div class="form-group">
            <button type="submit" class="float-right btn btn-primary" name="button">Leave Reply</button>
         </div>

      </form>
   </div>
</div>
@endsection
