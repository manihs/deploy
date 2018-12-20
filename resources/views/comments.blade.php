@extends('layouts.app')

@section('content')
<div class="main_body">
<button id="back">back</button>
</div>
<h1>{{ $id }}</h1>
@endsection
@section('script')
<script>
$("body").delegate("#back","click",function(){
    window.history.back();
});
</script>
@endsection
