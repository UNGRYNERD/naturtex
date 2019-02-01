<section class="section container product">
  <h1 class="product__title">{{ the_title() }}</h1>
  <div class="product__content product__content--mobile">@php(the_content())</div>
  <div class="product__data">
    @php($images = get_field('gallery'))
    <div class="product__gallery">
      @foreach($images as $image)
        <div class="product__item">
          {!! wp_get_attachment_image($image['ID'], 'large', false, array('class' => 'product__image')) !!}
        </div>
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
                {!! wp_get_attachment_image(get_sub_field('image'), 'thumb') !!}
              </a>
            </li>
          @endwhile
        </ul>
      </div>

      <div class="product__features">
        <h2 class="product__intitle">{{ __('Information:', 'naturtex') }}</h2>
        @php($info = get_field('info'))
        <div class="product__col1">{!! $info['col1'] !!}</div>
        <div class="product__col2">{!! $info['col2'] !!}</div>
      </div>

      <div class="product__downloads">
        <div class="product__download">
          <h2 class="product__intitle">{{ __('Care', 'naturtex') }}:</h2>
          <a download href="{{ wp_get_attachment_url(get_field('care')) }}"><img src="@asset('images/download.png')" alt="{{ __('Care', 'naturtex') }}"></a>
        </div>
        <div class="product__download">
          <h2 class="product__intitle">{{ __('Install', 'naturtex') }}:</h2>
          <a download href="{{ wp_get_attachment_url(get_field('install')) }}"><img src="@asset('images/download.png')" alt="{{ __('Install', 'naturtex') }}"></a>
        </div>
      </div>

    </div>
  </div>
</section>
