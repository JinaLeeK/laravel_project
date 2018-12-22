@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<div class="card">
   <div class="card-header">
      Edit post: {{ $post->title }}
   </div>
   <div class="card-body">
      <form class="" action="{{ route('post.update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
         </div>
         <div class="form-group">
            <label for="category">Select a Category</label>
            <select class="form-control col-lg-6" id="category" name="category_id">
               @foreach($categories as $category)
               <option value="{{ $category->id }}"
                  @if($post->category_id == $category->id)
                     selected
                  @endif
               >{{ $category->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="tags">Select Tags</label>
            @foreach($tags as $tag)
               <div class="checkbox">
                  <label>
                     <input
                        class="form-check-label"
                        type="checkbox"
                        name="tags[]"
                        value="{{ $tag->id }}"
                        @foreach($post->tags as $t)
                           @if($t->id === $tag->id)
                              checked
                           @endif
                        @endforeach
                     > {{ $tag->tag }}</label>
               </div>
            @endforeach
         </div>

         <div class="form-group">
            <label for="featured">Featured image</label>
            <input type="file" name="featured" class="form-control" value="">
         </div>
         <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="5" cols="5" class="form-control">{{$post->content}}</textarea>
         </div>
         <div class="form-group">
            <div class="text-center">
               <button type="submit" class="btn btn-success">Update post</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
