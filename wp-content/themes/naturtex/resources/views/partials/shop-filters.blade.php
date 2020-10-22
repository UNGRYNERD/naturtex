<form method="get" class="filter-dropdown__wrapper">
  <input type="hidden" name="product_cat" value="{{ isset($_GET['product_cat']) ? esc_attr($_GET['product_cat']) : '' }}">
  <input type="hidden" name="product_tag" value="{{ isset($_GET['product_tag']) ? esc_attr($_GET['product_tag']) : '' }}">
  <input type="hidden" name="un_price" value="{{ isset($_GET['un_price']) ? esc_attr($_GET['un_price']) : '' }}">
  <h3 class="filter-dropdown__title">{{ __('Filter', 'naturtex') }}</h3>
  <ul class="filter-dropdown js-dropdown" data-field="product_cat">
    <li class="filter-dropdown__item {{ App::isCurrentParam('product_cat', '') }}">
      <a class="js-dropdown-item" data-value="" href="#">{{ __('All materials', 'naturtex') }}</a></li>
    @foreach (App::shopCategories() as $term)
    <li class="filter-dropdown__item {{ App::isCurrentParam('product_cat', $term['slug']) }}">
      <a class="js-dropdown-item" data-value="{{ $term['slug'] }}" href="#">{{ $term['name'] }}</a>
    </li>
    @endforeach
  </ul>
  <ul class="filter-dropdown js-dropdown" data-field="product_tag">
    <li class="filter-dropdown__item {{ App::isCurrentParam('product_tag', '') }}">
      <a class="js-dropdown-item" data-value="" href="#">{{ __('All types', 'naturtex') }}</a></li>
    @foreach (App::shopTags() as $term)
    <li class="filter-dropdown__item {{ App::isCurrentParam('product_tag', $term['slug']) }}">
      <a class="js-dropdown-item" data-value="{{ $term['slug'] }}" href="#">{{ $term['name'] }}</a>
    </li>
    @endforeach
  </ul>
  <ul class="filter-dropdown js-dropdown" data-field="un_price">
    <li class="filter-dropdown__item {{ App::isCurrentParam('un_price', '') }}">
      <a class="js-dropdown-item" data-value="" href="#">{{ __('All', 'naturtex') }}</a></li>
    @foreach (App::shopPrices() as $term)
    <li class="filter-dropdown__item {{ App::isCurrentParam('un_price', $term['slug']) }}">
      <a class="js-dropdown-item" data-value="{{ $term['slug'] }}" href="#">{{ $term['name'] }}</a>
    </li>
    @endforeach
  </ul>
</form>
