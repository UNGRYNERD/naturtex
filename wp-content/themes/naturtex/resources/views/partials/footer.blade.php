<section class="instagram">
  <div class="container container--full">
    <h2 class="instagram__title">
      <img src="@asset('images/instagram.png')" alt="Instagram">
      {{ esc_html__('@naturtex_sl', 'naturtex') }}
    </h2>
    {!! do_shortcode('[instagram-feed showbutton=false showfollow=false user="naturtex_sl"]') !!}
  </div>
</section>

<footer class="content-info">
  <div class="container">
    @php(dynamic_sidebar('sidebar-footer'))
  </div>
</footer>
