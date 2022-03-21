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
            <li class="c-tab__item uppercase"><a href="<?php echo $blog ?>">all</a></li>
            <li class="c-tab__item"><a href="<?php echo $blog1 ?>">ブログ1</a></li>
            <li class="c-tab__item c-tab__current"><a href="<?php echo $blog2 ?>">ブログ2</a></li>
            <li class="c-tab__item"><a href="<?php echo $important ?>">重要</a></li>
          </ul>
        </div>
      </div>


      <div class="p-blog__cards">
        <div class="p-cards p-cards--blog">

          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $term = wp_get_object_terms($post->ID, 'blog_category');
          $args = array(
            'post_type' => 'blog',
            'taxonomy' => 'blog_category',
            'term' => 'blog2',
            'posts_per_page' => 9,
            'paged' => $paged,
          );
          $custom_query = new WP_Query($args);
          if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) :
              $custom_query->the_post();
          ?>

              <a class="p-card" href="<?php the_permalink() ?>">
                <!-- newを表示 -->
                <?php  
                if ($custom_query->current_post < 1 && is_paged() === false) {
                  echo '<div class="p-card__new-label">', '<b class="c-new-label">', '<span>', 'new', '</span>', '</b>', '</div>';
                }
                ?>
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
          <?php endwhile;
          endif;
          wp_reset_postdata();
          ?>
        </div>
      </div>
      <!-- l-inner -->
    </div>
    <div class="l-common-contact">
      <?php if (function_exists('wp_pagenavi')) {
        wp_pagenavi(array('query' => $custom_query));
      } ?>
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