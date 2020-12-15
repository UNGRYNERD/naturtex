<section class="c-banner {{ get_sub_field('big') ? 'c-banner--big' : '' }} {{ get_sub_field('icons') ? 'c-banner--icons' : '' }}" style="background-image: url({{ wp_get_attachment_image_url(get_sub_field('image'), 'featured') }})">
  <div class="c-banner__text">{!! get_sub_field('text') !!}</div>
  @if (get_sub_field('have_icons') && have_rows('icons'))
    <section class="c-icons">
      @while (have_rows('icons')) @php the_row() @endphp
        <div class="c-icons__item">
          {!! wp_get_attachment_image(get_sub_field('icon'), 'thumbnail', false, ['class' => 'c-icons__icon']) !!}
          <div class="c-icons__text">{{ get_sub_field('text') }}</div>
        </div>
      @endwhile
    </section>
  @endif
</section>
