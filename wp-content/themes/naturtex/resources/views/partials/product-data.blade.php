@if (get_field('gallery'))
  <section class="c-product-gallery">
    {!! wp_get_attachment_image(get_field('gallery')[0], 'large', false, ['class' => 'js-product-image c-product-gallery__image']) !!}
    <ul class="c-product-gallery__slider js-gallery-slider owl-carousel">
      @foreach (get_field('gallery') as $image)
        <li>
          <a
            href="{{ wp_get_attachment_image_url($image, 'large') }}"
            data-srcset="{{ wp_get_attachment_image_srcset($image, 'large') }}"
          >
            {!! wp_get_attachment_image($image, 'medium') !!}
          </a>
        </li>
      @endforeach
    </ul>
  </section>
@endif

@if (get_the_content())
  <section class="c-product-content">
    <div class="c-product-content__wrapper">
      {!! the_content() !!}
    </div>
  </section>
@endif
