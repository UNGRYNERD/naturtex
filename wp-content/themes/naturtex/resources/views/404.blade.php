@extends('layouts.app')

@section('content')
<div class="container">
  @include('partials.page-header')
  {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
  <p><a href="{{ home_url('/') }}">{{ __('Go to home.', 'sage') }}</a></p>
</div>
@endsection
