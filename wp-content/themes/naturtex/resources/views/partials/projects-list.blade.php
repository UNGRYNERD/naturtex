<section class="projects archive container">
  <nav class="top-nav__wrapper">
    <ul class="top-nav top-nav--dropdown">
      <li class="top-nav__item {{ App::isCurrentURL(get_post_type_archive_link('un_project')) }}">
        <a href="{{ get_post_type_archive_link('un_project') }}">{{ __('All', 'naturtex') }}</a>
      </li>
      @foreach (ArchiveUnProject::projectsTypes() as $term)
        <li class="top-nav__item {{ App::isCurrentURL($term['link']) }}">
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
