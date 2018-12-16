<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/customice.css') }}" rel="stylesheet">
    <!--  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <style>
   
  </style>
<body>
<nav>
  <div class="nav-part-one">
      <div class="logo">
        flyer
      </div>
      <div class="logo">
          <div class="nav-icons" id="search">
            <img src="https://img.icons8.com/ios/50/000000/search.png">
          </div>
          <div class="nav-icons">
            <div class="span-message">
                <img src="https://img.icons8.com/ios/50/000000/sms.png">
                <span>1</span>
            </div>
         </div>
         <div class="nav-icons">
           <div class="span-message">
            <img src="https://img.icons8.com/ios/50/000000/appointment-reminders.png">
            <span>13</span>
           </div>
         </div>
         <div class="nav-icons">
          <img src="https://img.icons8.com/material-rounded/50/000000/menu.png">
        </div>
      </div>
    </div>
</nav>
<!--  -->
<div class="main_body">
    @yield('content')
</div>
<!--  -->
<div class="" id="">
  <div class="menu-model" id="feed"></div>
  <div class="menu-model" id="video">b</div>
  <div class="menu-model" id="community">
    <div class="menu_post_modal">
      <div>
        <a href=""><img src="https://img.icons8.com/ios/50/000000/visible.png"></a>
      </div>
      <div>
        <a href=""><img src="https://img.icons8.com/ios/50/000000/edit-administrator.png"></a>
      </div>
      <div>
        <a href=""><img src="https://img.icons8.com/ios/50/000000/add-user-group-man-man.png"></a>
      </div>
    </div>
  </div>
  <div class="menu-model" id="post">
     <div class="menu_post_modal">
        <div>
    <a href="{{ route('new_community_form') }}"><img src="https://img.icons8.com/ios/50/000000/google-images.png"></a>
  </div>
        <div>
          <a href="{{ route('new.image.post.form') }}"><img src="https://img.icons8.com/ios/40/000000/documentary.png"></a>
</div>
        <div>
          <a href="{{ route('new.video.post.form') }}"><img src="https://img.icons8.com/ios/40/000000/idea.png"></a>
</div>
      </div>
  </div>
  <div class="menu-model" id="idea">e</div>
  <div class="menu-model" id="home">f</div>
</div>
<footer>
  <div class="bottom-nav">
      <div id="feed" class="icon active"><img src="https://img.icons8.com/ios/50/000000/news.png"   style="width:100%"></div>
      <div id="video" class="icon"><img src="https://img.icons8.com/ios/50/000000/tv-show.png" style="width:100%"></div>
      <div id="community" class="icon"><img src="https://img.icons8.com/ios/50/000000/user-group-man-man.png" style="width:100%"></div>
      <div id="post" class="icon"><img src="https://img.icons8.com/ios/50/000000/plus-2-math.png" style="width:100%"></div>
      <div id="idea" class="icon"><img src="https://img.icons8.com/ios/50/000000/idea-sharing.png" style="width:100%"></div>
      <div id="home" class="icon"><img src="https://img.icons8.com/ios/50/000000/home-page.png" style="width:100%"></div>
    </div>
  </footer>
</body>
<script>
$('body').delegate('#search','click',function(){
  var two_part = "";
  two_part += '<div class="nav-part-two"><div class="logo"><div class="nav-icons" id="search-back"><img src="https://img.icons8.com/ios/50/000000/left.png"></div></div><input type="text" id="search-query" placeholder="search here"></div>';
  two_part += "";
    $('.nav-part-one').replaceWith(two_part);
});

$('body').delegate('#search-back','click',function(){
  var one_part = "";
   one_part += '<div class="nav-part-one">';
   one_part +=  '<div class="logo">flyer</div>';
   one_part +=  '<div class="logo">';
   one_part +=  '<div class="nav-icons" id="search"><img src="https://img.icons8.com/ios/50/000000/search.png"></div>';
   one_part +=  '<div class="nav-icons"><div class="span-message"><img src="https://img.icons8.com/ios/50/000000/sms.png"><span>1</span></div></div>';
   one_part +=  '<div class="nav-icons"><div class="span-message"><img src="https://img.icons8.com/ios/50/000000/appointment-reminders.png"><span>13</span></div></div>';
   one_part += '<div class="nav-icons"><img src="https://img.icons8.com/material-rounded/50/000000/menu.png"></div></div></div>';       
  one_part += "";        
    $('.nav-part-two').replaceWith(one_part);
});

$('body').delegate('.icon','click',function(){
  var value = $(this).attr('id');
  $(".icon").each(function(){
    $(this).removeClass('active');
  });
  $(".menu-model").each(function(){
    $(this).css('display','none');
    if($(this).attr('id') == value ){
      $(this).css('display','block');
    }
  });
   $(this).addClass('active');
});
</script>
@yield('script')
</html>



