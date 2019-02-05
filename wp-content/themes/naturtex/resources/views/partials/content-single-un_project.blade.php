<section class="section project container">
  <h1 class="project__title">
    {{ the_title() }}
    @if (get_field('subtitle'))
      <span class="project__subtitle">{{ get_field('subtitle') }}</span>
    @endif
  </h1>
  @if (have_rows('intro'))
    <div class="project__intro">
      @while (have_rows('intro'))  @php(the_row())
        {!! wp_get_attachment_image(get_sub_field('image'), 'medium', false, array('class' => 'project__intro-image')) !!}
        <div class="project__intro-text">
          {!! get_sub_field('text') !!}
        </div>
      @endwhile
    </div>
  @endif
  <div class="project__data">
    @php($images = get_field('gallery'))
    @foreach($images as $image)
      <div class="project__item">
        {!! wp_get_attachment_image($image['ID'], 'large', false, array('class' => 'project__image')) !!}
      </div>
    @endforeach
    <div class="project__item">
      @php(the_content())
    </div>
  </div>
</section>
