
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
<section class="projects archive container products">

  <nav class="top-nav__wrapper">
    <ul class="top-nav top-nav--small">
      @while (have_rows('options', $products_page))  @php(the_row())
        <li class="top-nav__item {{ App::isCurrentURL(get_post_type_archive_link(get_sub_field('post_type', $products_page)), get_sub_field('post_type', $products_page) == 'un_fabric') }}">
          <a href="{{ get_post_type_archive_link(get_sub_field('post_type', $products_page)) }}">{{ get_sub_field('name', $products_page) }}</a>
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

  @php($term_name_test = '')
  @php
    global $wp_query
  @endphp
  @while(have_posts()) @php(the_post())
    @php
      if (is_post_type_archive('un_fabric')) {
        $terms = get_the_terms(get_the_ID(), 'un_fabric_material');
        if (empty($terms) || is_wp_error($terms)) {
            $term_name = 'Sin categoría';
        } else {
            $term_name = $terms[0]->name;
        }

        if ($term_name_test != $term_name) {
          if ($wp_query->current_post != 0 )
            echo '</div>';

          echo '<h2 class="products__group-title">' . $term_name . '</h2>';
          echo '<div class="products__group">';
        }

        $term_name_test = $term_name;
      }
    @endphp
    <article class="project-item">
      <a href="{{ the_permalink() }}">
        <span class="project-item__image">{{ the_post_thumbnail('featured-project') }}</span>
        <h2 class="project-item__title">{{ the_title() }}</h2>
      </a>
    </article>

    @php
        if ((($wp_query->current_post + 1) == $wp_query->post_count) && is_post_type_archive('un_fabric'))
            echo '</div>';
    @endphp
  @endwhile

  {!! App::pagination() !!}
</section>
