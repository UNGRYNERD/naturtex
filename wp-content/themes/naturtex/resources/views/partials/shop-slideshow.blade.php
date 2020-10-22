@if (have_rows('slideshow', 'option'))
<section class="slide slide--shop owl-carousel">
  @while (have_rows('slideshow', 'option')) @php the_row() @endphp
  <article class="slide__item">
    <a href="{{ get_sub_field('link', 'option') }}">
      {!! wp_get_attachment_image(get_sub_field('image', 'option'), 'featured', false, ['class' => 'slide__image']) !!}
    </a>
  </article>
  @endwhile
</section>
@endif
