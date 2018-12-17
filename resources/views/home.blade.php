@extends('layouts.app')

@section('content')
@if (!empty($posts))
@foreach ($posts as $post)
<div class="feedContainer">
  <div class="feed_header">
   <div class="feed_left">
     <div class="avatar">
       </div>
     <div class="avatar_name">
      posted by <b>{{ $post->user }} from {{ $post->community }}</b>
       </div>
    </div>
   <div class="feed_right">
      <div class="feed_icon">
        <img src="https://img.icons8.com/ios/50/000000/menu-2.png">
      </div>
    </div>
  </div>
  <img src ="{{ asset($post->src) }}"  style="width:100%">
<!--   icon  -->
  <div class="feed_icons"> 
    <div class="group_icon">
      <div class="feed_icon">
        <img src="https://img.icons8.com/ios/50/000000/like.png">
      </div>
       <div class="feed_icon">
          <img src="https://img.icons8.com/ios/50/000000/comments.png">
      </div>
      <div class="feed_icon">
        <img src="https://img.icons8.com/ios/50/000000/forward-arrow.png">
      </div>     
     
    </div>
    <div class="group_icon">
     <div class="feed_icon">
        <img src="https://img.icons8.com/ios/50/000000/bookmark-ribbon.png">
      </div>
    </div>
  </div>
  <hr>
    <div class="feed_caption">
    {{ $post->caption }}
    </div>
</div>
@endforeach
@endif
@endsection
@section('script')

@endsection
