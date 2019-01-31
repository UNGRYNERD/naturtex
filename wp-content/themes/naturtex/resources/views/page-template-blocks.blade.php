{{--
  Template Name: Página de bloques
--}}

@extends('layouts.app')

@section('content')
  @if (!is_home() && !is_front_page())
    <header class="section">
      <h1 class="page__title">{{ the_title() }}</h1>
    </header>
  @endif
  @if (have_rows('blocks'))
    @while (have_rows('blocks'))  @php(the_row())
      @include('partials.home-block-' . get_row_layout())
    @endwhile
  @endif
@endsection
