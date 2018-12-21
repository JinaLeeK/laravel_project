<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
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

      <div class="container">
         <div class="row">
            <div class="col-lg-4">
               @if(Auth::check())
               <ul class="list-group">
                  <li class="list-group-item">
                     <a href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="list-group-item">
                     <a href="{{ route('categories') }}">Categories</a>
                  </li>

                  <li class="list-group-item">
                     <a href="{{ route('category.create') }}">Create new category</a>
                  </li>

                  <li class="list-group-item">
                     <a href="{{ route('posts') }}">Posts</a>
                  </li>

                  <li class="list-group-item">
                     <a href="{{ route('posts.trashed') }}">Trashed Posts</a>
                  </li>

                  <li class="list-group-item">
                     <a href="{{ route('post.create') }}">Create new post</a>
                  </li>

                  <li class="list-group-item">
                     <a href="{{ route('tags') }}">Tags</a>
                  </li>
                  <li class="list-group-item">
                     <a href="{{ route('tag.create') }}">Create new tag</a>
                  </li>
               </ul>
               @endif
            </div>
            <div class="col-lg-8">
               @yield('content')
            </div>
         </div>
      </div>
   </div>
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/toastr.min.js') }}"></script>
   <script type="text/javascript">
      @if(Session::has('success'))
         toastr.success("{{ Session::get('success') }}")
      @elseif(Session::has('info'))
         toastr.info("{{ Session::get('info') }}")
      @endif
   </script>
</body>
</html>
