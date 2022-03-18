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

// * Template Name: お問い合わせ
?>

<?php get_header(); //header.phpを取得 
?>


  <section class="l-lower-mv js-mv">
    <div class="p-lower-mv--test js-mv">
      <picture class="p-lower-mv__img-wrapper">
        <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/dist/images/contact/contact-mv.jpg" />
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/contact/contact-mv-sp.jpg" alt="">
      </picture>
      <h1 class="p-lower-mv__title--test">お問い合わせ</h1>
    </div>
  </section>
  <div class="l-breadcrumb">
  <div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>
</div>
  <section class="l-contact">
    <div class="l-inner">
      <div class="p-contact__form-block">
        <div class="p-contact-form">
          <div class="p-contact-form__error-block">
            <p class="p-contact-form__error-text js-form-val">※必要事項を入力してください</p>
          </div>
          <?php echo do_shortcode('[contact-form-7 id="394" title="Contact form 1"]'); ?>
        </div>
      </div>
    </div>
  </section>
  <a href="#" class="to-top js-to-top">
    <span class="to-top__allow"></span>
  </a>
  <?php get_footer(); 
?>



<!-- 



<div class="p-contact__form">
              <div class="p-contact-form__text-block">
                <label for="company">※会社名</label>
                <span id="company">[text* company]</span>
              </div>
              <div class="p-contact-form__text-block">
                <label for="name">※お名前</label>
                <span id="name">[text* name]</span>
              </div>
              <div class="p-contact-form__text-block">
                <label for="subName">※ふりがな</label>
                <span id="subName">[text* subName]</span>
              
              </div>
              <div class="p-contact-form__text-block">
                <label for="mail">※メールアドレス</label>
                <span id="mail">[text* mail]</span>
              </div>
              <div class="p-contact-form__text-block">
                <label for="text">※お問い合わせ内容</label>
                <span id="text">[textarea* text]</span>

              </div>
              <div class="p-contact-form__btn-block js-submit-btn">
                <input type="submit" class="submit" value="送信">
              </div>
          </div> -->