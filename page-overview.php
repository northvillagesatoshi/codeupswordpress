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

<?php

// * Template Name: 企業概要
?>

<?php get_header(); //header.phpを取得 
?>


<!-- mv -->
<section class="p-lower-mv--overview ">
  <div class="p-lower-mv js-mv u-filter">
    <h1 class="p-lower-mv__title">企業概要</h1>
  </div>
</section>
<div class="l-breadcrumb">
  <div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>
</div>
<div class="l-overview">
<main class="about-content js-mv">
  <div class="l-inner">
      <?php
      $about = SCF::get('about_info'); //フィールド名入れる 
      foreach ($about as $about_detail) {

      ?>
        <dl class="p-overview__block">
          <dt class="p-overview__title">
            <?php echo $about_detail['about_title']; ?>
          </dt>
          <dd class="p-overview__textt">
            <?php echo $about_detail['about_text']; ?>
          </dd>
        </dl>
      <?php } ?>
      <div class="p-overview__map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.827853398476!2d139.76493611445818!3d35.68124053758042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1642481641075!5m2!1sja!2sjp" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
        </div>
  </div>
</main>
</div>
<!-- lower-contact箇所を呼び出す -->
<div class="l-common-contact">
  <?php get_template_part('lowercontact'); ?>
</div>
<a href="#" class="c-to-top js-to-top">
    <span class="c-to-top__allow"></span>
  </a>
<?php get_footer(); //footer.phpを取得　PHPで終了するので閉じタグは不要ですï