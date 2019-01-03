@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">{{ $p->name }}
   @if(Auth::user()->admin)
      <a href="{{ route('products.edit',['id'=>$p->id]) }}" class="btn btn-sm btn-primary float-right">Edit</a>
   @endif
   </div>
   <div class="card-body">
      <div class="text-center">
         <img src="{{ asset($p->image) }}" alt="">
      </div>
      <table class="table tabel-hover" style="margin-top:10px;">
         <tbody>
            <tr>
               <th>Price</th>
               <td>${{ number_format($p->price) }}</td>
            </tr>
            <tr>
               <th>Description</th>
               <td>{{ $p->description }}</td>
            </tr>
         </tbody>
      </table>
   </div>
</div>

@endsection
