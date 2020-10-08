@extends('backend.layout.master')
@section('title', 'Beatnik | Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="jumbotron">
                <h1 class="display-4">Hello, {{ Auth::user()->name }}!</h1>
                <p class="lead">This is a Backend panel. To control the Frontend. You can modify the content and many more.</p>
                
            </div>
        </div>
    </div>
</div>
@endsection
