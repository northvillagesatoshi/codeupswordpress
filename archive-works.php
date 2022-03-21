<?php
$works = esc_url(home_url('works'));
$works1 = esc_url(home_url('works_category/works-1'));
$works2 = esc_url(home_url('works_category/works-2'));
$works3 = esc_url(home_url('works_category/works-3'));
?>



<?php get_header(); //header.phpを取得 
?>

<!-- mv -->
<section class="p-lower-mv--works ">
  <div class="p-lower-mv js-mv u-filter">
    <h1 class="p-lower-mv__title">制作実績</h1>
  </div>
</section>

<div class="l-breadcrumb">
  <div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>
</div>
<div class="l-works">
  <main class="p-works">
    <div class="l-inner">
      <div class="p-works__tab">
        <div class="c-tab">
          <ul class="c-tab__items">
            <li class="c-tab__item c-tab__current uppercase"><a href="<?php echo $works ?>">all</a></li>
            <li class="c-tab__item"><a href="<?php echo $works1 ?>">ランディングページ</a></li>
            <li class="c-tab__item "><a href="<?php echo $works2 ?>">コーポレートサイト</a></li>
            <li class="c-tab__item "><a href="<?php echo $works3 ?>">マーケティング会社</a></li>
          </ul>
        </div>
      </div>

      <div class="p-works__items">

      <!-- pagedの１は最初の表示 -->
        <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;    //pagedに渡す変数
        query_posts($query_string . '&posts_per_page=6&paged=' . $paged); ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <a class="p-works__item" href="<?php the_permalink() ?>">
              <div class="p-works__category">
                <span><?php $terms = get_the_terms($post->ID, 'works_category');
                      if (!empty($terms)) {
                        foreach ($terms as $term) :
                          echo $term->name;
                        endforeach;
                      } else {
                        echo 'カテゴリーなし';
                      } ?></span>
              </div>
              <div class="p-works__img">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail();
                } else { ?>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/works/works1.jpg">
                <?php } ?>
              </div>
              <div class="p-works__body">
                <h3 class="p-works__title"><?php the_title(); 
                                            ?></h3>
              </div>
            </a>
          <?php endwhile; ?>


        <?php endif; ?>
      </div>
      <?php wp_pagenavi(); ?>

      <a href="#" class="c-to-top js-to-top">
        <span class="c-to-top__allow"></span>
      </a>
    </div>
  </main>
</div>



<!-- テンプレートコンタクトページ -->
<div class="l-common-contact">
  <?php get_template_part('lowercontact'); ?>
</div>
<a href="#" class="c-to-top js-to-top">
    <span class="c-to-top__allow"></span>
  </a>
<?php get_footer(); //header.phpを取得 
?>