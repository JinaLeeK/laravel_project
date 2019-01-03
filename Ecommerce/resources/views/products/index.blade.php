@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">Products</div>

   <div class="card-body">
      <table class="table table-hover">
         <thead>
            <th>Products</th>
            <th>Price</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
         </thead>
         <tbody>
         @foreach($products as $product)
            <tr>
               <td>
                  <img src="{{asset($product->image) }}" alt="{{ $product->name }}" width="30px" />&nbsp;&nbsp;
                  <a href="{{ route('products.show', ['id'=>$product->id]) }}" style="text-decoration:none;">
                     {{ $product->name }}
                  </a>
               </td>
               <td>${{ number_format($product->price) }}</td>
               <td>{{ str_limit($product->description, 20) }}</td>
               <td><a href="{{ route('products.edit', ['id'=>$product->id]) }}" class="btn-info btn-sm btn">Edit</a></td>
               <td>
                  <form class="" action="{{ route('products.destroy', ['id'=>$product->id]) }}" method="post">
                     {{ csrf_field() }}
                     {{ method_field('DELETE') }}
                     <button class="btn-danger btn-sm btn" type="submit">Delete</a>
                  </form>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div> <!-- card-body-->
</div><!-- card-->
@endsection
