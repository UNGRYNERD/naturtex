<section class="feat-projects section">
  @if (get_sub_field('title'))
    <h2 class="feat-projects__title">{{ the_sub_field('title') }}</h2>
  @endif
  <div class="feat-projects__wrapper">
    @while (have_rows('projects'))  @php(the_row())
      <article class="feat-projects__project">
        <a href="{{ get_the_permalink(get_sub_field('project')) }}">
          <span class="feat-projects__project-image">
            {!! get_the_post_thumbnail(get_sub_field('project'), 'featured-project') !!}
          </span>
          <h2 class="feat-projects__project-title">
            {{ get_the_title(get_sub_field('project')) }}
            @if (get_field('subtitle', get_sub_field('project')))
              <span class="feat-projects__project-subtitle">{{ get_field('subtitle', get_sub_field('project')) }}</span>
            @endif
          </h2>
        </a>
      </article>
    @endwhile
  </div>
</section>
