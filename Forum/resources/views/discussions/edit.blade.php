 @extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ $d->title }}</div>

    <div class="card-body">
      <form class="" action="{{ route('discussion.update', ['id'=>$d->id]) }}" method="post">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="content">Edit the question</label>
            <textarea name="content" rows="10" class="form-control">{{ $d->content}}</textarea>
         </div>
         <div class="form-group">
            <button class="btn btn-success float-right" type="submit">Update Content</button>
         </div>
      </form>
    </div>
</div>
@endsection
