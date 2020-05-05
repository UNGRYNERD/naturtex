<section class="featured section {{ get_sub_field('title') ? '' : 'featured--notitle' }}">
  @if (get_sub_field('title'))
    <h2 class="featured__title">{{ the_sub_field('title') }}</h2>
  @endif
  @php($reverse = get_sub_field('reverse'))
  @php($slides = get_sub_field('slide'))
  <div class="featured__slideshow {{ count($slides) < 2 ? 'featured__slideshow--simple' : 'js-featured-slideshow owl-carousel' }}">
    @while (have_rows('slide'))  @php(the_row())
      <article class="featured-item {{ $reverse ? "featured-item--reverse" : "" }} {{ get_sub_field('title') ? '' : 'featured-item--notitle' }}">
        <div class="featured-item__image">
          {!! wp_get_attachment_image(get_sub_field('image'), 'featured-medium', false, ['class' => 'featured-item__img']) !!}
          @if (get_sub_field('video'))
            <a data-lity href="{{ get_sub_field('video') }}" class="featured-item__video"><img src="@asset('images/play.png')" alt="{{ __('Ver video', 'naturtex') }}"></a>
          @endif
        </div>
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
