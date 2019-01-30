@extends('layouts.app')

@section('content')
  <section class="projects archive section container">
    <ul class="top-nav">
      <li class="top-nav__item {{ App::isCurrentURL(get_post_type_archive_link('un_project')) }}">
        <a href="{{ get_post_type_archive_link('un_project') }}">{{ __('All', 'naturtex') }}</a>
      </li>
      @foreach (ProjectsArchive::projectsTypes() as $term)
          <li class="top-nav__item {{ App::isCurrentURL($term['link']) }}">
            <a href="{{ $term['link'] }}">{{ $term['name'] }}</a>
          </li>
      @endforeach
    </ul>

    @while(have_posts()) @php(the_post())
      <article class="project-item">
        <a href="{{ the_permalink() }}">
          {{ the_post_thumbnail('featured-project', ['class' => 'project-item__image']) }}
          <h2 class="project-item__title">{{ the_title() }}</h2>
        </a>
      </article>
    @endwhile
  </section>
@endsection
