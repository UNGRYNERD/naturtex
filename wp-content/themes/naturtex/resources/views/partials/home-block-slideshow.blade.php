<section class="slide owl-carousel">
  @while (have_rows('slide'))  @php(the_row())
    <article class="slide__item">
      {!! wp_get_attachment_image(get_sub_field('image'), 'featured', false, ['class' => 'slide__image']) !!}
      @if (get_sub_field('video_bg'))
        {!! wp_video_shortcode(['src' => get_sub_field('video_bg'), 'class' => 'slide__videobg', 'loop' => true]); !!}
      @endif
      <div class="slide__content">
        @if (get_sub_field('title'))
          <h2 class="slide__title">{{ the_sub_field('title') }}</h2>
        @endif
        @if (get_sub_field('subtitle'))
          <h3 class="slide__subtitle">{{ the_sub_field('subtitle') }}</h3>
        @endif
        @if (get_sub_field('video') && !get_sub_field('video_bg'))
          <a data-lity href="{{ get_sub_field('video') }}" class="slide__video"><img src="@asset('images/play.png')" alt="{{ __('Ver video', 'naturtex') }}"></a>
        @endif
        @if (get_sub_field('video_bg'))
          <a href="#" class="slide__video js-play"><img src="@asset('images/play.png')" alt="{{ __('Reproducir video', 'naturtex') }}"></a>
        @endif
      </div>
    </article>
  @endwhile
</section>
