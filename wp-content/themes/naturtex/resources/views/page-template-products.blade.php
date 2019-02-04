{{--
  Template Name: Página de productos
--}}

@extends('layouts.app')

@section('content')
  <section class="products archive section container">
    <nav class="top-nav__wrapper">
      <ul class="top-nav top-nav--small">
        @while (have_rows('options'))  @php(the_row())
          <li class="top-nav__item {{ App::isCurrentURL(get_post_type_archive_link(get_sub_field('post_type'))) }}">
            <a href="{{ get_post_type_archive_link(get_sub_field('post_type')) }}">{{ get_sub_field('name') }}</a>
          </li>
        @endwhile
      </ul>
    </nav>

    <div class="products__options">
      @while (have_rows('options'))  @php(the_row())
        <a href="{{ get_post_type_archive_link(get_sub_field('post_type')) }}" class="products__option">
          {!! wp_get_attachment_image(get_sub_field('image'), 'featured-square') !!}
          <span>{{ get_sub_field('name') }}</span>
        </a>
      @endwhile
    </div>
  </section>
@endsection
