<section class="slide owl-carousel">
  @while (have_rows('slide'))  @php(the_row())
    <article class="slide__item">
      {!! wp_get_attachment_image(get_sub_field('image'), 'featured') !!}
      <div class="slide__content">
        @if (get_sub_field('title'))
          <h2 class="slide__title">{{ the_sub_field('title') }}</h2>
        @endif
        @if (get_sub_field('subtitle'))
          <h3 class="slide__subtitle">{{ the_sub_field('subtitle') }}</h3>
        @endif
      </div>
    </article>
  @endwhile
</section>
