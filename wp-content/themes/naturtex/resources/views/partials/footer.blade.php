<section class="instagram">
  <div class="container container--full">
    <h2 class="instagram__title">
      <img src="@asset('images/instagram.png')" alt="Instagram">
      {{ esc_html__('@naturtex_sl', 'naturtex') }}
    </h2>
    {!! do_shortcode('[instagram-feed showbutton=false showfollow=false user="naturtex_sl"]') !!}
  </div>
</section>

<footer class="footer">
  <div class="container">
    @if (has_nav_menu('footer-menu'))
      <nav class="footer__nav">
        {!! wp_nav_menu(['theme_location' => 'footer-menu', 'menu_class' => 'nav', 'container' => '']) !!}
      </nav>
    @endif
    <div class="footer__social">
      @if (get_theme_mod('ungrynerd_contact_linkedin'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_linkedin') }}" class="footer__social-link footer__social-link--linkedin">
          <img src="@asset('images/linkedin.png')" alt="LinkedIn">
        </a>
      @endif
      @if (get_theme_mod('ungrynerd_contact_instagram'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_instagram') }}" class="footer__social-link footer__social-link--instagram">
          <img src="@asset('images/instagram.png')" alt="Instagram">
        </a>
      @endif
      @if (get_theme_mod('ungrynerd_contact_pinterest'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_pinterest') }}" class="footer__social-link super-menu__social-link--pinterest">
          <img src="@asset('images/pinterest.png')" alt="Pinterest">
        </a>
      @endif
      @if (get_theme_mod('ungrynerd_contact_facebook'))
        <a target="_blank" href="{{ get_theme_mod('ungrynerd_contact_facebook') }}" class="footer__social-link footer__social-link--facebook">
          <img src="@asset('images/facebook.png')" alt="Facebook">
        </a>
      @endif
    </div>
  </div>
</footer>
