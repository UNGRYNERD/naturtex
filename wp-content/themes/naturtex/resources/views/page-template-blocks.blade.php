{{--
  Template Name: Página de bloques
--}}

@extends('layouts.app')

@section('content')
  @if (have_rows('blocks'))
    @while (have_rows('blocks'))  @php(the_row())
      @include('partials.home-block-' . get_row_layout())
    @endwhile
  @endif
@endsection
