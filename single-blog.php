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


<div class="l-breadcrumb l-breadcrumb--detail-page">
  <div class="c-breadcrumb">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>
</div>

<div class="l-blog-detail js-mv">

  <!-- lebel1 -->
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
      <?php the_post(); ?>
      <article class="p-blog-detail">
        <div class="l-inner p-blog-detail__inner">
          <!-- lebel1 -->
          <div class="p-blog-detail__lebel1">
            <h1 class="p-blog-detail__lebel1-title">
              <?php the_title(); ?>
            </h1>
            <div class="p-blog-detail__info">
              <time><?php the_time('Y.m.d'); ?></time>
              <div class="p-blog-detail__catecory">
          
                <?php
                $terms = get_the_terms($post->ID, 'blog_category');
                // 複数のカスタム分類を指定する場合は配列を使用する
                // $terms = get_the_terms($post->ID, array('カスタム分類名1','カスタム分類名2'));
                if ($terms) {

                  foreach ($terms as $term) {
                    $term_link = get_term_link($term);
                    echo '<a href="' . esc_url($term_link) . ' "class="c-category c-category--black c-category--blog">' . $term->name . '</a>';
                  }
                }
                ?>
              </div>
            </div>
            <div class="p-blog-detail__img">
              <?php
              if (has_post_thumbnail()) {
                the_post_thumbnail();
              } else { ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/blog/blog1.jpg" alt="">
              <?php } ?>
            </div>
            <div class="p-blog-detail__lebel1-text">
              <p class="c-normal-text c-normal-text--blog-detail">
                <?php the_field('level1_text'); ?>
              </p>
            </div>
          </div>

          <!-- lebel2 -->
          <div class="p-blog-detail__lebel2">
            <h2 class="p-blog-detail__lebel2-title"><?php the_field('lebel2_title'); ?></h2>
            <div class="p-blog-detail__lebel2-text">
              <p class="c-normal-text c-normal-text--blog-detail">
                <?php the_field('lebel2_text'); ?>
              </p>
            </div>
          </div>

          <!-- lebel3 -->
          <div class="p-blog-detail__lebel3">
            <h3 class="p-blog-detail__lebel3-title"><?php the_field('lebel3_title'); ?></h3>
            <div class="p-blog-detail__lebel3-text">
              <p class="c-normal-text c-normal-text--blog-detail">
                <?php the_field('lebel3_text'); ?>
              </p>
            </div>
            <div class="p-blog-detail__img">
              <?php if (get_field('level3_image')) : ?> <img src="<?php the_field('level3_image'); ?>" />
              <?php endif; ?>
            </div>

            <ol class="p-blog-detail__lebel3-block p-blog-detail__lebel3-block--list-type-disc">
              <?php
              $blogdetaillist = SCF::get('blog_detail_list'); //フィールド名入れる 
              foreach ($blogdetaillist as $blogdetailitem) {
              ?>

                <li class="p-blog-detail__lebel3-item">
                  <p class="c-normal-text c-normal-text--blog-detail"> <?php echo $blogdetailitem['blog_detail_ltem']; ?></p>
                </li>
              <?php } ?>

            </ol>
            <ul class="p-blog-detail__lebel3-block p-blog-detail__lebel3-block--list-type-number">
              <?php
              $blog_detail_list = SCF::get('blog_detail_list'); //フィールド名入れる 
              foreach ($blog_detail_list as $blog_detail_item) {

              ?>

                <li class="blog-article-lebel3__item">
                  <p class="c-normal-text c-normal-text--blog-detail">
                    <?php echo $blog_detail_item['blog_detail_ltem']; ?>
                  </p>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>

  <div class="wp-pagenavi">
    <?php if (get_previous_post()) : ?>
      <div class="previouspostslink previouspostslink--padding-none"><?php previous_post_link('%link', 'prev', true, '', 'blog_category'); ?></div>
    <?php endif; ?>
    <div class="nextlink nextlink--padding-none"><a rel="next" href="<?php echo home_url(); ?>/blog/">ブログ一覧</a></div>
    <?php if (get_next_post()) : ?>
      <div class="nextpostslink nextpostslink--padding-none"><?php next_post_link('%link', 'next', true, '', 'blog_category'); ?></div>
    <?php endif; ?>
  </div>













  <!-- 関連記事を4件掲載 -->
  <div class="p-blog-detail__connection-blog">
    <div class="l-inner">
      <div class="p-connection-blog">
        <div class="p-connection-blog__title">関連記事</div>
        <div class="p-connection-blog__cards">
          <div class="p-cards p-cards--col-4">

            <!-- カスタム投稿且つ同じタームに分類された関連投稿を表示 -->
            <?php // 現在表示されている投稿と同じタームに分類された投稿を取得
            $taxonomy_slug = 'blog_category'; // タクソノミーのスラッグを指定
            $post_type_slug = 'blog'; // 投稿タイプのスラッグを指定
            $post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定
            if ($post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
              $terms_slug = array(); // 配列のセット
              foreach ($post_terms as $value) { // 配列の作成
                $terms_slug[] = $value->slug; // タームのスラッグを配列に追加
              }
            }
            $args = array(
              'post_type' => $post_type_slug, // 投稿タイプを指定
              'posts_per_page' => 4, // 表示件数を指定
              'orderby' =>  'rand', // ランダムに投稿を取得
              'post__not_in' => array($post->ID), // 現在の投稿を除外
              'tax_query' => array( // タクソノミーパラメーターを使用
                array(
                  'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
                  'field' => 'slug', // スラッグに一致するタームを返す
                  'terms' => $terms_slug // タームの配列を指定
                )
              )
            );

            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) : ?>
              <?php while ($the_query->have_posts()) : $the_query->the_post();
              ?>
                <a href="<?php the_permalink(); ?>" class="p-card">
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
                      <h3 class="card__title">
                        <?php the_title(); ?>
                      </h3>
                    </div>
                    <div class="p-card__text-block u-mobile">
                      <p class="card__text">
                        <?php echo get_the_excerpt(); ?>
                      </p>
                    </div>
                    <div class="p-card__info">
                      <span class="p-card__category"> <?php $terms = get_the_terms($post->ID, 'blog_category');
                                                      if (!empty($terms)) {
                                                        foreach ($terms as $term) :
                                                          echo $term->name;
                                                        endforeach;
                                                      } else {
                                                        echo 'カテゴリーなし';
                                                      } ?></span>
                      <span class="p-card__date"><?php the_time('Y.m.d'); ?></span>
                    </div>
                  </div>
                </a>
              <?php endwhile; ?>
            <?php endif;
            wp_reset_postdata(); ?>
          </div>
        </div>
        <!-- p-connection-blog -->
      </div>
    </div>
  </div>
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