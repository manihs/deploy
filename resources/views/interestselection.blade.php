@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">  
                {{ dd($listdata) }}                 
                    @foreach ($listdata as $row)
                     
                    @endforeach                            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection