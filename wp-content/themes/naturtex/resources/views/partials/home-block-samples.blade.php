<section class="c-samples">
  <h2 class="c-samples__title">{{ get_sub_field('title') }}</h2>
  <div class="c-samples__text">{!! get_sub_field('text') !!}</div>
  @if (get_sub_field('button'))
    <a class="c-samples__button button" href="{{ get_sub_field('button')['url'] }}" target="{{ get_sub_field('button')['target'] }}">{{ get_sub_field('button')['title'] }}</a>
  @endif

  <div class="c-samples__wrapper">
    @while (have_rows('samples')) @php(the_row())
      <div class="c-samples__item">
        {!! wp_get_attachment_image(get_sub_field('image'), 'large', false, ['class' => 'c-samples__image']) !!}
        <h3 class="c-samples__name">{{ get_sub_field('nombre') }}</h3>
      </div>
    @endwhile
  </div>
</section>
