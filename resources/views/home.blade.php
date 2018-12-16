@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
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
