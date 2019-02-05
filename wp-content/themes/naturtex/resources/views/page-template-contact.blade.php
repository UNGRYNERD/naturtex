{{--
  Template Name: Página de contacto
--}}

@extends('layouts.app')

@section('content')
  <header class="section">
    <h1 class="page__title">{{ the_title() }}</h1>
  </header>
  <section class="container container--small contact">
    <div class="contact__form">
      {{ the_post_thumbnail('full', ['class' => 'contact__image']) }}
      {!! do_shortcode(get_field('form')) !!}
    </div>
    <div class="contact__data">
      @php(the_content())
    </div>
    <div class="contact__social">
      @if (get_theme_mod('ungrynerd_contact_linkedin'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_linkedin') }}" class="contact__social-link contact__social-link--linkedin">
          <img src="@asset('images/linkedin.png')" alt="LinkedIn">
        </a>
      @endif
      @if (get_theme_mod('ungrynerd_contact_instagram'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_instagram') }}" class="contact__social-link contact__social-link--instagram">
          <img src="@asset('images/instagram.png')" alt="Instagram">
        </a>
      @endif
      @if (get_theme_mod('ungrynerd_contact_pinterest'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_pinterest') }}" class="contact__social-link super-menu__social-link--pinterest">
          <img src="@asset('images/pinterest.png')" alt="Pinterest">
        </a>
      @endif
      @if (get_theme_mod('ungrynerd_contact_facebook'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_facebook') }}" class="contact__social-link contact__social-link--facebook">
          <img src="@asset('images/facebook.png')" alt="Facebook">
        </a>
      @endif
    </div>
  </section>
@endsection
