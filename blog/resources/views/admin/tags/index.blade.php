@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">
      Tags <a href="{{ route('tag.create') }}" class="btn btn-primary btn-sm" style='float:right;'>New</a>
   </div>
   <div class="card-body">
      <table class="table table-hover">
         <thead>
            <th>Tag name</th>
            <th>Editing</th>
            <th>Deleting</th>
         </thead>
         <tbody>
            @if($tags->count()>0)
               @foreach($tags as $tag)
               <tr>
                  <td>{{$tag->tag}}</td>
                  <td>
                     <a href="{{ route('tag.edit', ['id'=>$tag->id]) }}" class="btn btn-sm btn-info">Edit</a>
                  </td>
                  <td>
                     <a href="{{ route('tag.delete', ['id'=>$tag->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                  </td>
               </tr>
               @endforeach
            @else
               <tr>
                  <th colspan="3" class="text-center">No Tags</th>
               </tr>
            @endif
         </tbody>
      </table>
   </div>
</div>

@stop
