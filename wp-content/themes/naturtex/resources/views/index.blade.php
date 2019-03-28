@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @while(have_posts()) @php(the_post())
    <article class="project-item">
      <a href="{{ the_permalink() }}">
        <span class="project-item__image">{{ the_post_thumbnail('featured-project') }}</span>
        <h2 class="project-item__title">{{ the_title() }}</h2>
      </a>
    </article>
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection
