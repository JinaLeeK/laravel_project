<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Scripts -->

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/atom-one-dark.min.css" />
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <script src="{{ asset('js/app.js') }}" defer></script>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
</head>
<body>
   <div id="app">
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
         <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
               {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <!-- Left Side Of Navbar -->
               <ul class="navbar-nav mr-auto">

               </ul>

               <!-- Right Side Of Navbar -->
               <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
                  @endif
                  @else
                  <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                     </a>

                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>
                  </div>
               </li>
               @endguest
            </ul>
         </div>
      </div>
   </nav>


   <div class="container" style="margin-top:20px;">
      @if($errors->count() > 0)
         <ul class="list-group-item">
         @foreach($errors->all() as $error )
            <li class="list-group-item text-danger">
               {{ $error }}
            </li>
         @endforeach
         </ul><br>
      @endif
      <div class="row">
         <div class="col-md-4">
            <a href="{{ route('discuss.create') }}" class="btn btn-primary form-control">Create a new discussion</a>
            <br>
            <div class="card" style="margin-top:20px;">
               <div class="card-body">
                  <li class="list-group-item">
                     <a style="text-decoration:none;" href="{{ route('forum') }}">Home</a>
                  </li>
                  <li class="list-group-item">
                     <a style="text-decoration:none;" href="/forum?filter=me">My Discussion</a>
                  </li>
                  <li class="list-group-item">
                     <a style="text-decoration:none;" href="/forum?filter=solved">Answered Discussion</a>
                  </li>
                  <li class="list-group-item">
                     <a style="text-decoration:none;" href="/forum?filter=unsolved">Open Discussion</a>
                  </li>
               </div>
            </div>


            <div class="card" style="margin-top:20px;">
               <div class="card-header">
                  Channels
                  @if(Auth::check())
                     @if(Auth::user()->admin)
                        <a href="{{ route('channels.index') }}" class="btn btn-sm btn-info float-right">Edit</a>
                     @endif
                  @endif
               </div>
               <div class="card-body">
                  <ul class="list-group">
                     @foreach($channels as $channel)
                     <li class="list-group-item
                     @if(isset($c_slug) && $c_slug==$channel->slug)
                        list-group-item-info
                     @endif
                     ">
                        <a style="text-decoration:none;" href="{{ route('channel.forum', ['slug'=>$channel->slug]) }}">{{ $channel->title }}</a>
                        ({{ $channel->discussions->count() }})
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-8">
            @yield('content')
         </div>
      </div>
   </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
@if(Session::has('success'))
toastr.success("{{ Session::get('success')}}");
@elseif(Session::has('danger'))
toastr.danger("{{ Session::get('danger') }}");
@endif
</script>

</body>
</html>
