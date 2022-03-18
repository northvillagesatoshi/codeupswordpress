<?php  
$home = esc_url( home_url('/')) ;
$news = esc_url( home_url('news')) ;
$content= esc_url( home_url('content')) ;
$works = esc_url( home_url('works')) ;
$overview = esc_url( home_url('overview')) ;
$blog = esc_url( home_url('blog')) ;
$contact = esc_url( home_url('contact')) ;
$works1 = esc_url( home_url('works/works-1')) ;
$works2 = esc_url( home_url('works/works-2')) ;
$works3 = esc_url( home_url('works/works-3')) ;
?>




<!DOCTYPE html>
<html <?php language_attributes( ); //html要素のlang属性を出力 ?>>
<head>
  <meta name="robots" content="noindex" />
  <meta charset="<?php bloginfo( 'charset' ); //文字エンコーディング情報を出力 ?>" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP&display=swap" rel="stylesheet" />
  <!-- css -->
  <!-- <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" /> -->
  <!-- JavaScript -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
  <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
  <!-- <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script defer src="./js/script.js"></script> -->
  <?php wp_head( ); //wp_headはテーマの</head>タグ直前に必ず挿入します ?>
</head>
<body>
  <header class="p-header l-header">
    <div class="p-header__inner js-header">
      <div class="p-header__logo">
        <a href="/">
          <img class="c-logo" src="<?php echo get_template_directory_uri(); ?>/dist/images/common/logo.svg" alt="Code Upsのロゴ">
        </a>
      </div>
      <div class="c-hamburger js-hamburger u-mobile">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="p-pc-nav u-desktop">
        <ul class="p-pc-nav__items">
          <li class="p-pc-nav__item"><a href="<?php echo $news ?>">お知らせ</a></li>
          <li class="p-pc-nav__item"><a href="<?php echo $content ?>">事業内容</a></li>
          <li class="p-pc-nav__item"><a href="<?php echo $works ?>">制作実績</a></li>
          <li class="p-pc-nav__item"><a href="<?php echo $overview ?>">企業概要</a></li>
          <li class="p-pc-nav__item"><a href="<?php echo $blog ?>">ブログ</a></li>
          <li class="p-pc-nav__item p-pc-nav__item--white">
            <a href="<?php echo $contact ?>">お問い合わせ</a>
          </li>
        </ul>
      </div>
      <div class="p-sp-nav js-drawer-menu">
        <ul class="p-sp-nav__items">
        <li class="p-sp-nav__item"><a href="<?php echo $news ?>">お知らせ</a></li>
          <li class="p-sp-nav__item"><a href="<?php echo $content ?>">事業内容</a></li>
          <li class="p-sp-nav__item"><a href="<?php echo $works ?>">制作実績</a></li>
          <li class="p-sp-nav__item"><a href="<?php echo $overview ?>">企業概要</a></li>
          <li class="p-sp-nav__item"><a href="<?php echo $blog ?>">ブログ</a></li>
          <li class="p-sp-nav__item"><a href="<?php echo $contact ?>">お問い合わせ</a></li>
        </ul>
      </div>
    </div>
  </header>