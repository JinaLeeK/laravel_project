@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      <img src="{{ $discussion->user->avatar }}" width="40px" alt="">&nbsp;&nbsp;
      <span>{{ $discussion->user->name }}, <b>{{ $discussion->user->points }}</b></span>
      @if(Auth::id() == $discussion->user_id)
         <a href="{{ route('discussion.edit',['id'=>$discussion->id]) }}" class="btn btn-info btn-sm float-right">Edit</a>
      @endif

      <span>
         @if($discussion->is_being_watched_by_auth($discussion->id))
            <a href="{{ route('discussion.unwatch', ['id'=>$discussion->id]) }}" class="btn btn-danger btn-sm float-right">unwatch</a>
         @else
            <a href="{{ route('discussion.watch', ['id'=>$discussion->id]) }}" class="btn btn-success btn-sm float-right">watch</a>
         @endif
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
      <span>({{$r->user->points}})</span>
      @if($best_answer)
         @if($best_answer->id == $r->id)
            <span class="float-right bg-success">Best answer!</span>
      @else
         @if(Auth::id() == $discussion->user_id)
            <a href="{{ route('reply.best.answer',['id'=>$r->id] )}}" class="btn btn-sm btn-info float-right">Mark as best answer</a>
         @endif
      @endif

      
   </div>
   <div class="card-body">
      <p class="">
         {{ $r->content }}
      </p>
   </div>
   <div class="card-footer">
      <p>
      @if( $r->is_liked_by_auth_user() )
         <a href="{{ route('reply.unlike', ['id'=>$r->id]) }}" class="btn btn-danger btn-sm">Unlike</a>
      @else
         <a href="{{ route('reply.like', ['id'=>$r->id]) }}" class="btn btn-success btn-sm">Like</a>
      @endif
      ( {{ $r->likes->count() }} )
      </p>
   </div>
</div>
<br>
@endforeach
@if(Auth::check())
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
@else
<div class="text-center">
   <h2>Sign in to leave a reply</h2>
</div>
@endif
@endsection
