
@php
  $pages = get_posts(array(
    'post_type' => 'page',
    'fields' => 'ids',
    'posts_per_page' => 1,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'views/page-template-products.blade.php',
    'suppress_filters' => false
  ));
  $products_page = $pages[0];
@endphp
<section class="projects archive container products">

  <nav class="top-nav__wrapper">
    <ul class="top-nav top-nav--small">
      @while (have_rows('options', $products_page))  @php(the_row())
        <li class="top-nav__item {{ App::isCurrentURL(get_post_type_archive_link(get_sub_field('post_type', $products_page)), get_sub_field('post_type', $products_page) == 'un_rug') }}">
          <a href="{{ get_post_type_archive_link(get_sub_field('post_type', $products_page)) }}">{{ get_sub_field('name', $products_page) }}</a>
        </li>
      @endwhile
    </ul>

    <form method="get" class="filter-dropdown__wrapper">
      <input type="hidden" name="un_rug_material" value="{{ isset($_GET['un_rug_material']) ? esc_attr($_GET['un_rug_material']) : '' }}">
      <input type="hidden" name="un_rug_type" value="{{ isset($_GET['un_rug_type']) ? esc_attr($_GET['un_rug_type']) : '' }}">

      <h3 class="filter-dropdown__title">{{ __('Filter', 'naturtex') }}</h3>
      <ul class="filter-dropdown js-dropdown" data-field="un_rug_material">
        <li class="filter-dropdown__item {{ App::isCurrentParam('un_rug_material', '') }}">
        <a class="js-dropdown-item" data-value="" href="#">{{ __('Material', 'naturtex') }}</a></li>
        @foreach (RugsArchive::rugMaterials() as $term)
          <li class="filter-dropdown__item {{ App::isCurrentParam('un_rug_material', $term['slug']) }}">
            <a class="js-dropdown-item" data-value="{{ $term['slug'] }}" href="#">{{ $term['name'] }}</a>
          </li>
        @endforeach
      </ul>

      <ul class="filter-dropdown js-dropdown" data-field="un_rug_type">
        <li class="filter-dropdown__item {{ App::isCurrentParam('un_rug_type', '') }}">
          <a class="js-dropdown-item" data-value="" href="#">{{ __('Type', 'naturtex') }}</a></li>
        @foreach (RugsArchive::rugTypes() as $term)
          <li class="filter-dropdown__item {{ App::isCurrentParam('un_rug_type', $term['slug']) }}">
            <a class="js-dropdown-item" data-value="{{ $term['slug'] }}" href="#">{{ $term['name'] }}</a>
          </li>
        @endforeach
      </ul>
    </form>
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
