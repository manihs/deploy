@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (!empty($posts))
            <br>
            @foreach ($posts as $post)
            <div class="card">
                <div class="card-header">{{ $post->user }} >> {{ $post->community }}</div>
                <div class="card-body">
                    <img src="{{ asset($post->src) }}" alt="" style="width:100%;"> 
                    <br>
                    caption :{{ $post->caption }}
                </div>
            </div>
            <br>
             @endforeach
            <br>
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
