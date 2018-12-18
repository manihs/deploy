@extends('layouts.app')

@section('content')
<div class="main_body">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">video upload</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Form::open(['action' => 'PostController@new_video_post','files' => true]) }}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            {{ Form::file('img', $attributes = ['class'=>'custom-file-input','id'=>'inputGroupFile01','accept'=>'video/mp4,video/x-m4v,video/*']) }}
                            {{ Form::label('custom-file-label', 'chose img', ['class' => 'custom-file-label']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputText">name of community</label>
                        {{ Form::text('name', 'community name',['id'=>'exampleInputText','class'=>'form-control'])}}
                    </div>
                    @foreach ($community as $communities)
                        <div class="form-group form-check">
                        {{ Form::checkbox( 'community[]', $communities->id, false,['class'=>'form-check-input','id'=> $communities->id]) }} 
                            <label class="form-check-label" for="{{ $communities->id }}">{{ $communities->cname }}</label>
                        </div>
                    @endforeach
                    {{ Form::submit('Post',['class'=>'btn btn-success']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')

@endsection