@extends('layout')

@section('content')
   <div clas="row">
      <div class="col-lg-12">
         <form action="{{ route('todo.save', ['id' => $todo->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="text" class="form-control input-lg" name="todo" value=" {{ $todo->todo }} ">
            <a href="{{ route('todos') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
         </form>
      </div>
   </div>

@stop
