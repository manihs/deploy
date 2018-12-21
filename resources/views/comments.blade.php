<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/customice.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Document</title>
</head>
{{ csrf_field() }}  
<body>
<div id="back"><img src="https://img.icons8.com/ios/50/000000/circled-left.png"></div>
<div class="bodies">
    
</div>

<div class="bottom_cmpt">
  <input type="text" placeholder="comment" id="inputcomment">
  <button>send</button>
</div>
</body>
<script>
$("body").delegate("#back","click",function(){
    window.history.back();
});
$('#inputcomment').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        var comment = $('#inputcomment').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url : "{{ route('comment.add') }}",
            method : "POST",
            data : {comment: comment, _token: _token, postid: {{ $id }} },
            success: function(data){
                var _la = "";
                _la +=  '<div class="comments_container">';
                _la +=  '<div class="c_avatars">';
                _la +=  '<div class="c_avatar">';
                _la +=  '</div>';
                _la +=  '</div>';
                _la +=  '<div class="c_text">'+data+'</div>';
                _la +=  '<div class="c_icon">';
                _la +=  '    <div class="icon"><img src="https://img.icons8.com/ios/50/000000/hearts.png"></div>';
                _la +=  '<div class="icon"><img src="https://img.icons8.com/ios/50/000000/reply-all-arrow.png"></div>';
                _la +=  '</div>';
                _la +=  '</div>';
                _la +=  '';
                    $('.bodies').append(_la);
                    $('#inputcomment').val("");
        }
    })
    }
});
</script>

</html>


