@extends('errors::minimal')
@section('icon')
<style>
body{
	background: url(/images/search-document-3.svg) no-repeat 70% 20%;
	background-size: 50vmin;
}
.error-icon{
    height: 160px;
    width: 160px;
    background-image: url(/images/search-document.svg);
    background-size: contain;
    background-repeat: no-repeat;
    margin-right: 20px;
}
</style>
<div class="error-icon"></div>
@endsection
@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Sorry, the page you were looking for could not found.'))
