@extends('layouts.app')

@section('content')
@foreach($discussions as $d)
   <div class="card">
      <div class="card-header">
         <img src="{{ $d->user->avatar }}" width="40px" alt="">&nbsp;&nbsp;
         <span>{{ $d->user->name }}, <b>{{ $d->created_at->diffForHumans() }}</b></span>
         @if($d->hasBestAnwer())
            <span class="btn btn-sm btn-success float-right">CLOSED</span>
         @else
            <span class="btn btn-sm btn-danger float-right">OPEN</span>
         @endif
         <span>
            <a href="{{ route('discussion', ['slug'=>$d->slug]) }}" class="btn btn-primary btn-sm float-right">View</a>
         </span>
      </div>
      <div class="card-body">
         <h3 class="text-center">{{ $d->title }}</h3>
         <p class="text-center">
            {{ str_limit($d->content, 50) }}
         </p>
      </div>
      <div class="card-footer">
         {{ $d->replies->count() }} Replies
         <a href="{{ route('channel.forum',['slug'=>$d->channel->slug]) }}" class="float-right btn btn-default btn-sm">{{ $d->channel->title}}</a></button>
      </div>
   </div>
   <br>
@endforeach
   <div class="text-center">{{ $discussions->links() }}</div>
@stop
