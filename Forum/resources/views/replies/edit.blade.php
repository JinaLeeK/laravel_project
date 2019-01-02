 @extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
      <form class="" action="{{ route('reply.update', ['id'=>$r->id]) }}" method="post">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="content">Edit The Reply</label>
            <textarea name="content" rows="10" class="form-control">{{ $r->content}}</textarea>
         </div>
         <div class="form-group">
            <button class="btn btn-success float-right" type="submit">Update Reply</button>
         </div>
      </form>
    </div>
</div>
@endsection
