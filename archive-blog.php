<?php get_header(); //header.phpを取得 
?>


<?php
$blog = esc_url(home_url('blog'));
$blog1 = esc_url(home_url('blog_category/blog1'));
$blog2 = esc_url(home_url('blog_category/blog2'));
$important = esc_url(home_url('blog_category/important'));
?>


<!-- mv -->
<section class="p-lower-mv--blog">
  <div class="p-lower-mv js-mv u-filter">
    <h1 class="p-lower-mv__title">ブログ</h1>
  </div>
</section>




<div class="l-breadcrumb">
  <div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>
</div>

<div class="l-blog">
  <main class="p-blog">
    <div class="l-inner">

      <div class="p-blog__tab">
        <div class="c-tab">
          <ul class="c-tab__items">
            <li class="c-tab__item c-tab__current uppercase"><a href="<?php echo $blog ?>">all</a></li>
            <li class="c-tab__item"><a href="<?php echo $blog1 ?>">ブログ1</a></li>
            <li class="c-tab__item"><a href="<?php echo $blog2 ?>">ブログ2</a></li>
            <li class="c-tab__item"><a href="<?php echo $important ?>">重要</a></li>
          </ul>
        </div>
      </div>


      <div class="p-blog__cards">
        <div class="p-cards p-cards--blog">
          <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;    //pagedに渡す変数
          query_posts($query_string . '&posts_per_page=9&paged=' . $paged); ?>

          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
              <?php the_post(); ?>
              <a class="p-card" href="<?php the_permalink() ?>">
                <!-- newを表示 -->
                <?php
                // 何故ここはwp_query
               if ($wp_query->current_post < 1 && is_paged() === false) {
                echo '<div class="p-card__new-label">', '<b class="c-new-label">', '<span>', 'new', '</span>', '</b>', '</div>';
              } ?>
                <figure class="p-card__img">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail();
                  } else { ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/blog/blog1.jpg" alt="">
                  <?php } ?>
                </figure>
                <div class="p-card__body">
                  <div class="p-card__title-block">
                    <h3 class="p-card__title">
                      <?php the_title(); ?>
                    </h3>
                  </div>
                  <div class="p-card__text-block">
                    <p class="p-card__text">
                      <?php the_excerpt(); ?>
                    </p>
                  </div>
                  <div class="p-card__info">
                    <span class="p-card__category"><?php $terms = get_the_terms($post->ID, 'blog_category');
                                                    if (!empty($terms)) {
                                                      foreach ($terms as $term) :
                                                        echo $term->name;
                                                      endforeach;
                                                    } else {
                                                      echo 'カテゴリーなし';
                                                    } ?></span>
                    <span class="p-card__date"><?php the_time('Y.m.d'); //投稿日時を表示 パラメータで書式を指定 
                                                ?></span>
                  </div>
                </div>
              </a>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
      <!-- l-inner -->
    </div>
    <div class="l-common-contact">
      <?php wp_pagenavi(); ?>
    </div>
  </main>
</div>

<!-- テンプレートコンタクトページ -->
<div class="l-common-contact">
  <?php get_template_part('lowercontact'); ?>
</div>
<?php get_footer(); //header.phpを取得 
?>