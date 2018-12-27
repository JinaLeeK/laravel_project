@extends('layouts.frontend')

@section('content')

<!-- Stunning Header -->
<div class="stunning-header stunning-header-bg-lightviolet">
   <div class="stunning-header-content">
      <h1 class="stunning-header-title">{{ $post->title }}</h1>
   </div>
</div>
<!-- End Stunning Header -->

<!-- Post Details -->
<div class="container">
   <div class="row medium-padding120">
      <main class="main">
         <div class="col-lg-10 col-lg-offset-1">
            <article class="hentry post post-standard-details">
               <div class="post-thumb"><img src="{{ $post->featured }}" alt="seo"></div>
               <div class="post__content">
                  <div class="post-additional-info">
                     <div class="post__author author vcard">
                        Posted by
                        <div class="post__author-name fn">
                           <a href="{{ route('author', ['id'=>$post->user->id]) }}" class="post__author-link">{{ $post->user->name }}</a>
                        </div>
                     </div>
                     <span class="post__date">
                        <i class="seoicon-clock"></i>
                        <time class="published" datetime="2016-03-20 12:00:00">
                           {{ $post->created_at->toFormattedDateString() }}
                        </time>
                     </span>

                     <span class="category">
                        <i class="seoicon-tags"></i>
                        <a href="{{ route('category', ['id'=>$post->category_id]) }}">{{  $post->category->name }}</a>
                     </span>

                  </div>

                  <div class="post__content-info">
                     <p class="post__text">
                        {!! $post->content !!}
                     </p>

                     <div class="widget w-tags">
                        <div class="tags-wrap">
                        @foreach($post->tags as $tag)
                           <a href="{{ route('tag', ['id'=>$tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                        @endforeach
                        </div>
                     </div>

                  </div>
               </div>

               <div class="socials text-center">
                  <!-- Go to www.addthis.com/dashboard to customize your tools -->
                  <div class="addthis_inline_share_toolbox"></div>
               </div>
            </article>

            <div class="blog-details-author">

               <div class="blog-details-author-thumb">
                  <img src="{{ $post->user->profile->avatar }}" alt="Author">
               </div>

               <div class="blog-details-author-content">
                  <div class="author-info">
                     <h5 class="author-name">
                        <a href="{{ route('author', ['id'=>$post->user->id]) }}">{{ ucfirst($post->user->name) }}</a></h5>
                     <!-- <p class="author-info">SEO Specialist</p> -->
                  </div>
                  <p class="text">{{ $post->user->profile->about }}</p>
                  <div class="socials">
                     <a href="{{ $post->user->profile->facebook }}" class="social__item">
                        <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                     </a>

                     <a href="{{ $post->user->profile->youtube }}" class="social__item">
                        <img src="{{ asset('app/svg/youtube.svg') }}" alt="youtube">
                     </a>

                  </div>
               </div>
            </div>

            <div class="pagination-arrow">
               @if($next)
               <a href="{{ route('post', ['slug'=>$next->slug]) }}" class="btn-next-wrap">
                  <div class="btn-content">
                     <div class="btn-content-title">Next Post</div>
                     <p class="btn-content-subtitle">{{ $next->title}}</p>
                  </div>
                  <svg class="btn-next">
                     <use xlink:href="#arrow-right"></use>
                  </svg>
               </a>
               @endif

               @if($prev)
               <a href="{{ route('post', ['slug'=>$prev->slug]) }}#" class="btn-prev-wrap">
                  <svg class="btn-prev">
                     <use xlink:href="#arrow-left"></use>
                  </svg>
                  <div class="btn-content">
                     <div class="btn-content-title">Prev Post</div>
                     <p class="btn-content-subtitle">{{ $prev->title }}</p>
                  </div>
               </a>
               @endif


            </div>

            <div class="comments">

               <div class="heading text-center">
                  <h4 class="h1 heading-title">Comments</h4>
                  <div class="heading-line">
                     <span class="short-line"></span>
                     <span class="long-line"></span>
                  </div>
               </div>
               @include('includes.disqus')
            </div>
            <br><br><br>
         </div>
<!-- End Post Details -->

<!-- Sidebar-->
         @include('includes.all_tags')

<!-- End Sidebar-->

      </main>
   </div>
</div>
@stop

@section('scripts')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c2510229533d2b8"></script>
@stop
