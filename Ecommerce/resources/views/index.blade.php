@extends('layouts.frontend')

@section('content')

<div class="container">
   <div class="row pt120">
      <div class="books-grid">

         <div class="row mb30">
         @foreach($products as $p)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="min-height:574px; margin-bottom:10px">
               <div class="books-item">
                  <div class="books-item-thumb">
                     <img src="{{ asset($p->image) }}" alt="book">
                     <div class="new">New</div>
                     <div class="sale">Sale</div>
                     <div class="overlay overlay-books"></div>
                  </div>

                  <div class="books-item-info">
                     <h5 class="books-title">
                        <a href="{{ route('product.show',['id'=>$p->id]) }}">{{ $p->name }}</a>
                     </h5>

                     <div class="books-price">${{ number_format($p->price) }}</div>
                  </div>
                  <form class="" action="{{ route('cart.add',['id'=>$p->id]) }}" method="post">
                     {{ csrf_field() }}
                     <input type="hidden" name="qty" value="1">
                     <button type="type" class="btn btn-small btn--dark add">
                        <span class="text">Add to Cart</span>
                        <i class="seoicon-commerce"></i>
                     </a>
                  </form>

               </div>
            </div>
         @endforeach
         </div>

         <div class="row pb120">

            <div class="col-lg-12">
               {{ $products->links() }}
            </div>

         </div>
      </div>
   </div>
</div>
@stop
