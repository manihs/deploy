@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-3">
    <table class="table">
        <thead>
            <tr>
                <th>Links</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="{{ route('new_community_form') }}">Create Community</a></td>
            </tr>
            <tr>
                <td><a href="{{ route('new.image.post.form') }}">upload image</a></td>
            </tr>
            <tr>
                <td><a href="{{ route('new.video.post.form') }}">upload video</a></td>
            </tr>
        </tbody>
    </table>
        </div>
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
