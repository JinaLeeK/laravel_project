@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header">Create new product</div>
   <div class="card-body">
      <form class="" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="row">
            <div class="form-group col-md-12">
               <label for="Name">Product Name</label>
               <input type="text" name="name" class="form-control" value="{{old('name')}}">
            </div>
            <div class="form-group col-md-5">
               <label for="image">Image</label>
               <input type="file" name="image" class="form-control" value="">
            </div>
            <div class="col-md-7"></div>
            <div class="form-group col-md-5">
               <label for="price">Price</label>
               <input type="number" name="price" class="form-control" value="{{old('price')}}">
            </div>
            <div class="col-md-7"></div>
            <div class="form-group col-md-12">
               <label for="desc">Description</label>
               <textarea name="description" rows="10" class="form-control">{{old('description')}}</textarea>
            </div>
            <div class="form-group col-md-12">
               <button class="btn btn-primary form-control float-right col-md-2" type="submit">Create Product</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
