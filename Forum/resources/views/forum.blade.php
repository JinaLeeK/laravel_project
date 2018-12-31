@extends('layouts.app')

@section('content')
@foreach($discussions as $d)
   <div class="card">
      <div class="card-header">
         <img src="{{ $d->user->avatar }}" width="40px" alt="">&nbsp;&nbsp;
         <span>{{ $d->user->name }}, <b>{{ $d->created_at->diffForHumans() }}</b></span>
         <span>
            <a href="{{ route('discussion', ['slug'=>$d->slug]) }}" class="btn btn-primary btn-sm float-right">View</a></span>
      </div>
      <div class="card-body">
         <h3 class="text-center">{{ $d->title }}</h3>
         <p class="text-center">
            {{ str_limit($d->content, 50) }}
         </p>
      </div>
      <div class="card-footer">{{ $d->replies->count() }} Replies</div>
   </div>
   <br>
@endforeach
   <div class="text-center">{{ $discussions->links() }}</div>
@stop
