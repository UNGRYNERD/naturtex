<header class="header">
  <div class="container container--full">
    {!! App::languageSwitcher() !!}

    <div class="header__search">
      <a href="#" class="header__search-link">
        {!! App::inlineSVG('images/search.svg') !!}
      </a>
      <div class="search-wrap">
        {!! get_search_form(false) !!}
        <a href="#" class="search-wrap__close">{!! App::inlineSVG('images/close.svg') !!}</a>
      </div>
    </div>

    <a title="{{ bloginfo('name') }}" class="custom-logo-link" href="{{ home_url('/') }}">
      <img src="@asset('images/logo.svg')" alt="{{ bloginfo('name') }}">
    </a>

    <a href="#" class="header__menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </a>
  </div>
</header>


<section class="super-menu">
  <div class="super-menu__contact">
    <h3 class="super-menu__contact-title">
      {{ __('Contact', 'naturtex') }}
    </h3>
    <div class="super-menu__contact-data">
      {!! get_theme_mod('ungrynerd_contact_data') !!}
    </div>
    <div class="super-menu__contact-social">
      @if (get_theme_mod('ungrynerd_contact_linkedin'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_linkedin') }}" class="super-menu__social-link super-menu__social-link--linkedin">
          <img src="@asset('images/linkedin.png')" alt="LinkedIn">
        </a>
      @endif
      @if (get_theme_mod('ungrynerd_contact_instagram'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_instagram') }}" class="super-menu__social-link super-menu__social-link--instagram">
          <img src="@asset('images/instagram.png')" alt="Instagram">
        </a>
      @endif
      @if (get_theme_mod('ungrynerd_contact_pinterest'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_pinterest') }}" class="super-menu__social-link super-menu__social-link--pinterest">
          <img src="@asset('images/pinterest.png')" alt="Pinterest">
        </a>
      @endif
      @if (get_theme_mod('ungrynerd_contact_facebook'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_facebook') }}" class="super-menu__social-link super-menu__social-link--facebook">
          <img src="@asset('images/facebook.png')" alt="Facebook">
        </a>
      @endif
    </div>
    {!! App::languageSwitcher() !!}
  </div>
  <nav class="nav-primary">
    @if (has_nav_menu('main-menu'))
      {!! wp_nav_menu(['theme_location' => 'main-menu', 'menu_class' => 'nav', 'container' => '']) !!}
    @endif
  </nav>
</section>
