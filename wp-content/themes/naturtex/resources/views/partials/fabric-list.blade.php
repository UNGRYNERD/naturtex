
@php
  $pages = get_posts(array(
    'post_type' => 'page',
    'fields' => 'ids',
    'posts_per_page' => 1,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'views/page-template-products.blade.php'
  ));
  $products_page = $pages[0];
@endphp
<section class="projects archive container">
  <nav class="top-nav__wrapper">
    <ul class="top-nav top-nav--small">
      @while (have_rows('options', $products_page))  @php(the_row())
        <li class="top-nav__item {{ App::isCurrentURL(get_sub_field('link', $products_page)) }}">
          <a href="{{ get_sub_field('link', $products_page) }}">{{ get_sub_field('name', $products_page) }}</a>
        </li>
      @endwhile
    </ul>

    <ul class="top-filter">
      <li class="top-filter__item {{ App::isCurrentURL(get_post_type_archive_link('un_fabric')) }}">
        <a href="{{ get_post_type_archive_link('un_fabric') }}">{{ __('All', 'naturtex') }}</a>
      </li>
      @foreach (FabricsArchive::fabricMaterials() as $term)
        <li class="top-filter__item {{ App::isCurrentURL($term['link']) }}">
          <a href="{{ $term['link'] }}">{{ $term['name'] }}</a>
        </li>
      @endforeach
    </ul>
  </nav>

  @while(have_posts()) @php(the_post())
    <article class="project-item">
      <a href="{{ the_permalink() }}">
        <span class="project-item__image">{{ the_post_thumbnail('featured-project') }}</span>
        <h2 class="project-item__title">{{ the_title() }}</h2>
      </a>
    </article>
  @endwhile

  {!! App::pagination() !!}
</section>
