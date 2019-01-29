<section class="featured section ">
  @if (get_sub_field('title'))
    <h2 class="featured__title">{{ the_sub_field('title') }}</h2>
  @endif
  @php($reverse = get_sub_field('reverse'))
  <div class="featured__slideshow owl-carousel">
    @while (have_rows('slide'))  @php(the_row())
      <article class="featured-item {{ $reverse ? "featured-item--reverse" : "" }}">
        {!! wp_get_attachment_image(get_sub_field('image'), 'featured-med', false, ['class' => 'featured-item__img']) !!}
        <div class="featured-item__content">
          @if (get_sub_field('title'))
            <h3 class="featured-item__title">{{ the_sub_field('title') }}</h3>
          @endif
          @if (get_sub_field('text'))
            <div class="featured-item__text">
              {{ the_sub_field('text') }}
              @php($button = get_sub_field('button'))
              @if ($button)
                <a href="{{ $button['url'] }}" target="{{ $button['target'] }}" class="button">{{ $button['title'] }}</a>
              @endif
            </div>
          @endif
        </div>
      </article>
    @endwhile
  </div>
</section>
