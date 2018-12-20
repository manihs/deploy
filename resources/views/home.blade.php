@extends('layouts.app')

@section('content')
<div class="main_body">
@if (!empty($posts))
{{ csrf_field() }}  
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
      <div class="feed_icon" data-txt='{{ $post->id }}' data-like="no" data-icon-type="like">
        <img src="https://img.icons8.com/ios/50/000000/like.png">
      </div>
       <div class="feed_icon" data-txt='{{ $post->id }}' data-icon-type="comment">
          <a href="/post/comment/{{ $post->id }}"><img src="https://img.icons8.com/ios/50/000000/comments.png"></a>
      </div>
      <div class="feed_icon" data-txt='{{ $post->id }}'>
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
</div>
@endsection
@section('script')
<script>
$("body").delegate(".feed_icon","click",function(){
  var obj = $(this);
  var value = obj.data('icon-type');
  if(value=='like'){
  var value = obj.data('txt');
  var cont = obj.data('like');
  var _token = $('input[name="_token"]').val();
  if(cont=='no'){
    $.ajax({
        url : "{{ route('post.like') }}",
        method : "POST",
        data : {value: value, _token: _token},
        success: function(data){
          var _la = "";
          _la += "<div class='feed_icon d' data-txt='data' data-like='yes' data-icon-type='like'>";
          _la += "<img src='https://img.icons8.com/ios/50/000000/hearts-filled.png'>";
          _la += "</div>";
          _la += "";
          obj.replaceWith(_la);
      }
    })
  }else{
    $.ajax({
        url : "{{ route('post.dislike') }}",
        method : "POST",
        data : {value: value, _token: _token},
        success: function(data){
          var _la = "";
          _la += "<div class='feed_icon' data-txt='data' data-like='no' data-icon-type='like'>";
          _la += "<img src='https://img.icons8.com/ios/50/000000/like.png'>";
          _la += "</div>";
          _la += "";
          obj.replaceWith(_la);
      }
    })
  }
  }

});
</script>
@endsection
