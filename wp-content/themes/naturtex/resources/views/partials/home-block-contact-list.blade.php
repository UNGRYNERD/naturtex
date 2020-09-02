<section class="c-contact-list">
  <h2 class="c-contact-list__title">{{ get_sub_field('title') }}</h2>
  <div class="c-contact-list__wrapper">
    @while (have_rows('contact')) @php(the_row())
      <div class="c-contact-list__item">{!! get_sub_field('contact') !!}</div>
    @endwhile
  </div>
</section>
