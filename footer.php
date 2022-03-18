<?php
$home = esc_url(home_url('/'));
$news = esc_url(home_url('news'));
$content = esc_url(home_url('content'));
$works = esc_url(home_url('works'));
$overview = esc_url(home_url('overview'));
$blog = esc_url(home_url('blog'));
$contact = esc_url(home_url('contact'));
$works1 = esc_url(home_url('works/works-1'));
$works2 = esc_url(home_url('works/works-2'));
$works3 = esc_url(home_url('works/works-3'));
?>


<footer class="l-footer p-footer">
  <div class="p-footer__inner">
    <div class="p-footer__contents">
      <div class="p-footer__logo">
        <a href="/">
          <img class="c-logo" src="<?php echo get_template_directory_uri(); ?>/dist/images/common/logo.svg" alt="Code Upsのロゴ">
        </a>
      </div>
      <!-- p-footer__nav　エレメント p-footer-nav ブロック -->
      <nav class="p-footer__nav p-footer-nav">
        <ul class="p-footer-nav__lists">
          <li class="p-footer-nav__list u-mobile">
            <a href="/">トップ</a>
          </li>
          <li class="p-footer-nav__list">
            <a href="<?php echo $news ?>">お知らせ</a>
          </li>
          <li class="p-footer-nav__list">
            <a href="<?php echo $content ?>">事業内容</a>
          </li>
          <li class="p-footer-nav__list u-desktop">
            <a href="<?php echo $works ?>">制作実績</a>
          </li>
          <li class="p-footer-nav__list">
            <a href="<?php echo $overview ?>">企業概要</a>
          </li>
          <li class="p-footer-nav__list u-mobile">
            <a href="<?php echo $blog ?>">ブログ</a>
          </li>
          <li class="p-footer-nav__list">
            <a href="<?php echo $contact ?>">お問い合わせ</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="p-footer__copyright-block">
      <small class="p-footer__copyright">&copy; 2021 CodeUps Inc.</small>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>