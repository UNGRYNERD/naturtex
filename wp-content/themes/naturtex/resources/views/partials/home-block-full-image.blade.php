<section class="image-full section">
  <div class="image-full__wrapper">
    {!! wp_get_attachment_image(get_sub_field('image'), 'large', false, ['class' => 'image-full__image']) !!}
    <div class="image-full__text-wrapper">
      <div class="image-full__text">
        {!! get_sub_field('text') !!}
      </div>
    </div>
  </div>
</section>
