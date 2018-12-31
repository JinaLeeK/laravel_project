@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Create a new discussion</div>

    <div class="card-body">
      <form class="" action="{{ route('discuss.store') }}" method="post">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="">
         </div>
         <div class="form-group">
            <label for="channel">Pick a channel</label>
            <select name="channel_id" id="channel_id" class="form-control">
            @foreach($channels as $channel)
               <option value="{{$channel->id}}">{{ $channel->title}} </option>
            @endforeach
            </select>
         </div>

         <div class="form-group">
            <label for="content">Add a question</label>
            <textarea name="content" rows="10" class="form-control"></textarea>
         </div>
         <div class="form-group">
            <button class="btn btn-success float-right" type="submit">Create discussion</button>
         </div>
      </form>
    </div>
</div>
@endsection
