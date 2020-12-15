<section class="section text {{ get_sub_field('center') ? 'text--center' : '' }}">
  <div class="container">
    {{ the_sub_field('text') }}

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
  </div>
</section>
