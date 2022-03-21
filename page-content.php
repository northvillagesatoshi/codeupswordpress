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

<?php get_header(); //header.phpを取得 
?>
<!-- mv -->
<section class="p-lower-mv--content">
  <div class="p-lower-mv js-mv u-filter">
    <h1 class="p-lower-mv__title">事業内容</h1>
  </div>
</section>

<div class="l-breadcrumb">
  <div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>
</div>
<div class="l-content">
  <main class="p-contents">
    <div class="p-contents__inner">
      <h3 class="p-content__title">企業理念</h3>
      <div class="p-content__normal-text">
        <p class="c-normal-text ">説明が入ります。説明が入ります。説明が入ります。説明が入ります。 説明が入ります。説明が入ります。説明が入ります。説明が入ります</p>
      </div>
      <div class="p-content__medias">
        <!-- media1 -->
        <div class="p-content__media" id="content1">
          <div class="p-content__media-img">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/content/content2.jpg" alt="企業理念1" />
          </div>
          <div class="p-content__media-body">
            <h3 class="p-content__media-title">企業理念１</h3>
            <div class="p-content__media-text">
              <p class="c-normal-text ">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
            </div>
          </div>
        </div>
        <!-- media2 -->
        <div class="p-content__media" id="content2">
          <div class="p-content__media-img">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/content/content3.jpg" alt="企業理念1" />
          </div>
          <div class="p-content__media-body">
            <h3 class="p-content__media-title">企業理念２</h3>
            <div class="p-content__media-text">
              <p class="c-normal-text ">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
            </div>
          </div>
        </div>
        <!-- media3 -->
        <div class="p-content__media" id="content3">
          <div class="p-content__media-img">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/content/content4.jpg" alt="企業理念1" />
          </div>
          <div class="p-content__media-body">
            <h3 class="p-content__media-title">企業理念３</h3>
            <div class="p-content__media-text">
              <p class="c-normal-text ">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
<div class="l-common-contact">
  <?php get_template_part('lowercontact'); ?>
</div>
<a href="#" class="c-to-top js-to-top">
  <span class="c-to-top__allow"></span>
</a>
<?php get_footer(); //header.phpを取得 
?>