<section class="section project container">
  <h1 class="project__title">{{ the_title() }}</h1>
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
