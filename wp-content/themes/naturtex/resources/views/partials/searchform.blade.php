<form role="search" method="get" class="search-form" action="{{ esc_url( home_url( '/' ) ) }}">
  <label>
    <span class="screen-reader-text">{{ _x( 'Search for:', 'naturtex' ) }}</span>
    <input type="text" class="search-field" placeholder="{!! esc_attr_x( 'Search &hellip;', 'placeholder' ) !!}" value="{{ get_search_query() }}" name="s" />
  </label>
</form>
