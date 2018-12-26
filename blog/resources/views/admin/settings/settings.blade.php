@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<div class="card">
   <div class="card-header">
      Edit blog Setting
   </div>
   <div class="card-body">
      <form class="" action="{{ route('setting.update') }}" method="post" >
         {{ csrf_field() }}
         <div class="form-group">
            <label for="name">Site Name</label>
            <input type="text" name="site_name" class="form-control" value="{{ $setting->site_name}}">
         </div>
         <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value=" {{ $setting->address}}">
         </div>
         <div class="form-group">
            <label for="email">Contact Phone</label>
            <input type="text" name="contact_number" class="form-control" value=" {{ $setting->contact_number}}">
         </div>
         <div class="form-group">
            <label for="email">Contact Email</label>
            <input type="email" name="contact_email" class="form-control" value=" {{ $setting->contact_email}}">
         </div>
         <div class="form-group">
            <div class="text-center">
               <button type="submit" class="btn btn-success">Update Setting</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
