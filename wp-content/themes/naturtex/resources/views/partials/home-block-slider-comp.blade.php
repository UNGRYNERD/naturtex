<section class="slide-comp owl-carousel js-comp-slide">
  @while (have_rows('slide'))  @php(the_row())
    <article class="slide-comp__item">
      @foreach (get_sub_field('images') as $image)
        <div class="slide-comp__image-wrapper">
          {!! wp_get_attachment_image($image, 'featured', false, ['class' => 'slide-comp__image']) !!}
        </div>
      @endforeach
    </article>
  @endwhile
</section>
