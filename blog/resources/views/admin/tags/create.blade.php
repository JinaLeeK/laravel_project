@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<div class="card">
   <div class="card-header">
      Create a new tag
   </div>
   <div class="card-body">
      <form class="" action="{{ route('tag.store') }}" method="post" >
         {{ csrf_field() }}
         <div class="form-group">
            <label for="name">Tag</label>
            <input type="text" name="tag" class="form-control" value="">
         </div>
         <div class="form-group">
            <div class="text-center">
               <button type="submit" class="btn btn-success">Store tag</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
