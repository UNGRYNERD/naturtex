<section class="section container container--full product">
  <h1 class="product__title">{{ the_title() }}</h1>
  <div class="product__content product__content--mobile">@php(the_content())</div>
  <div class="product__data">
    @php($images = get_field('gallery'))
    <div class="product__gallery">
      @foreach($images as $image)
        <a href="{{ wp_get_attachment_image_src($image['ID'], 'large')[0] }}" data-lightbox="gallery" class="product__item js-product-item" data-scale="2">
          {!! wp_get_attachment_image($image['ID'], 'large', false, array('class' => 'product__image')) !!}
          {!! wp_get_attachment_image($image['ID'], 'large', false, array('class' => 'product__image product__image--placeholder')) !!}
        </a>
      @endforeach
    </div>
    <div class="product__info">
      <div class="product__content">@php(the_content())</div>

      <div class="product__colors">
        <h2 class="product__intitle">{{ __('Colors:', 'naturtex') }}</h2>
        <ul class="product__colors-list">
          @while (have_rows('colors'))  @php(the_row())
            <li class="product__color">
              {{ get_sub_field('name') }}
              <a class="js-image-toggle" href="{{ wp_get_attachment_image_src(get_sub_field('image'), 'large')[0] }}">
                <img
                  src="{{ wp_get_attachment_image_src(get_sub_field('image'), 'thumbnail')[0] }}"
                  alt="{{ the_title_attribute() }}"
                  data-src="{{ wp_get_attachment_image_src(get_sub_field('image'), 'large')[0] }}"
                  data-srcset="{{ wp_get_attachment_image_srcset(get_sub_field('image'), 'large') }}"
                >
              </a>
            </li>
          @endwhile
        </ul>
      </div>

      @if (have_rows('pattern'))
        <div class="product__colors">
          <h2 class="product__intitle">{{ get_field('pattern_title') }}</h2>
          <ul class="product__colors-list">
            @while (have_rows('pattern'))  @php(the_row())
              <li class="product__color">
                {{ get_sub_field('name') }}
                <a data-lightbox="pattern" href="{{ wp_get_attachment_image_src(get_sub_field('image_zoom'), 'large')[0] }}">
                  <img
                    src="{{ wp_get_attachment_image_src(get_sub_field('image'), 'thumbnail')[0] }}"
                    alt="{{ the_title_attribute() }}"
                  >
                </a>
              </li>
            @endwhile
          </ul>
        </div>
      @endif

      @if (have_rows('finishing'))
        <div class="product__colors">
          <h2 class="product__intitle">{{ __('Finishings:', 'naturtex') }}</h2>
          <ul class="product__colors-list">
            @while (have_rows('finishing'))  @php(the_row())
              <li class="product__color">
                {{ get_sub_field('name') }}
                <a data-lightbox="finishing" href="{{ wp_get_attachment_image_src(get_sub_field('image_zoom'), 'large')[0] }}">
                  <img
                    src="{{ wp_get_attachment_image_src(get_sub_field('image'), 'thumbnail')[0] }}"
                    alt="{{ the_title_attribute() }}"
                  >
                </a>
              </li>
            @endwhile
          </ul>
        </div>
      @endif


      <div class="product__features">
        <h2 class="product__intitle">{{ __('Information:', 'naturtex') }}</h2>
        @php($info = get_field('info'))
        <div class="product__col1">{!! $info['col1'] !!}</div>
        <div class="product__col2">{!! $info['col2'] !!}</div>
      </div>

      @if (have_rows('sustainability'))
        <div class="product__sustainability">
          <h2 class="product__intitle">{{ __('Sustainability:', 'naturtex') }}</h2>
          <ul class="product__sustainability-list">
            @while (have_rows('sustainability'))  @php(the_row())
              <li class="product__sustainability-item">
                <img
                  src="{{ wp_get_attachment_image_src(get_sub_field('image'), 'thumbnail')[0] }}"
                  alt="{{ the_title_attribute() }}"
                >
                {{ get_sub_field('name') }}
              </li>
            @endwhile
          </ul>
        </div>
      @endif

      <div class="product__downloads">
        <h2 class="product__intitle">{{ __('Descargas', 'naturtex') }}:</h2>
        <div class="">
          @if (get_field('overview'))
            <p><a download href="{{ wp_get_attachment_url(get_field('overview')) }}">{{ __('Overview', 'ungrynerd') }}</a></p>
          @endif
          @if (get_field('care'))
            <p><a download href="{{ wp_get_attachment_url(get_field('care')) }}">{{ __('Care', 'naturtex') }}</a></p>
          @endif
          @if (get_field('install'))
            <p><a download href="{{ wp_get_attachment_url(get_field('install')) }}">{{ __('Install', 'naturtex') }}</a></p>
          @endif
        </div>
      </div>

    </div>
  </div>
</section>
