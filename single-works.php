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

<div class="l-works-detail">
  <?php if (have_posts()) :  ?>
    <?php while (have_posts()) : the_post(); ?>
      <article class="p-works-detail">
        <div class="p-works-detail__inner">
          <div class="p-works-detail-head">
            <div class="p-detail__head">
              <div class="p-detail-head__inner">
                <div class="p-detail-head__title-block">
                  <h1 class="p-detail-head__title">
                    <?php the_title(); //投稿（固定ページ）のタイトルを表示 
                    ?>
                  </h1>
                </div>
                <div class="p-detail-head__info-block">
                  <div class="p-detail-head__time">
                    <?php the_time('Y.m.d'); ?>
                  </div>

                  <?php
                  $terms = get_the_terms($post->ID, 'works_category');
                  // 複数のカスタム分類を指定する場合は配列を使用する
                  // $terms = get_the_terms($post->ID, array('カスタム分類名1','カスタム分類名2'));
                  if ($terms) {

                    foreach ($terms as $term) {
                      $term_link = get_term_link($term);
                      echo '<a href="' . esc_url($term_link) . ' " class="p-detail-head__category">' . $term->name . '</a>';
                    }
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>

          <!-- 携帯のスライダー -->
          <div class="p-works-detail__gallery js-mv u-mobile">
            <div class="swiper p-works-detail__slider js-works-detail-slide">
              <!-- メイン -->
              <div class="swiper-wrapper">
                <?php
                $imggroup = SCF::get('slider-group');
                foreach ($imggroup as $fields) {
                  $imgurl = wp_get_attachment_image_src($fields['slider'], 'full');
                ?>
                  <div class="swiper-slide p-works-detail__slide">
                    <img src="<?php echo $imgurl[0]; ?>">
                  </div>
                <?php } ?>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
            <!-- サムネイル -->
            <div class="swiper p-works-detail__thumbnails js-works-detail-thumbnail">
              <div class="swiper-wrapper">
                <?php
                $imggroup = SCF::get('slider-group');
                foreach ($imggroup as $fields) {
                  $imgurl = wp_get_attachment_image_src($fields['slider'], 'full');
                ?>
                  <div class="swiper-slide p-works-detail__slide-thumbnail">
                    <img src="<?php echo $imgurl[0]; ?>">
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- スライダー終了 -->

          <!-- パソコンでのスライダー -->

          <div class="p-works-detail__gallery u-desktop">
            <div class="swiper p-works-detail__slider js-works-detail-slide-pc">

              <div class="swiper-wrapper">
                <?php
                $imggroup = SCF::get('slider-group');
                foreach ($imggroup as $fields) {
                  $imgurl = wp_get_attachment_image_src($fields['slider'], 'full');
                ?>
                  <div class="swiper-slide p-works-detail__slide">
                    <img src="<?php echo $imgurl[0]; ?>">
                  </div>
                <?php } ?>
              </div>

              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
            <div class="swiper p-works-detail__thumbnails js-works-detail-thumbnail-pc">
              <div class="swiper-wrapper">
                <?php
                $imggroup = SCF::get('slider-group');
                foreach ($imggroup as $fields) {
                  $imgurl = wp_get_attachment_image_src($fields['slider'], 'full');
                ?>
                  <div class="swiper-slide p-works-detail__slide-thumbnail">
                    <img src="<?php echo $imgurl[0]; ?>">
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- スライダー表示 -->

          <div class="p-works-detail__comment">
            <div class="p-works-detail__comment-inner">

              <!-- 制作のポイント 繰り返しフィールド-->
              <?php
              $point = SCF::get('works-point'); //フィールド名入れる 
              foreach ($point as $detail) {

              ?>
                <div class="p-works-detail__comment-block">

                  <div class="p-works-detail__comment-sub-title">
                    <?php echo $detail['works-title']; ?>
                  </div>
                  <div class="p-works-detail__comment-body">
                    <?php echo $detail['works-text']; ?>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </article>
      <div class="wp-pagenavi">
        <?php if (get_previous_post()) : ?>
          <div class="previouspostslink previouspostslink--padding-none"><?php previous_post_link('%link', 'prev', true, '', 'works_category'); ?></div>
        <?php endif; ?>
        <div class="nextlink nextlink--padding-none"><a rel="next" href="<?php echo home_url(); ?>/works/">制作実績一覧</a></div>
        <?php if (get_next_post()) : ?>
          <div class="nextpostslink nextpostslink--padding-none"><?php next_post_link('%link', 'next', true, '', 'works_category'); ?></div>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>



  <!-- 関連記事を4件掲載 -->
  <div class="p-works-detail__cards">
    <div class="l-inner">
      <div class="p-connection-blog">
        <div class="p-connection-blog__title">関連記事</div>
        <div class="p-connection-blog__cards">
          <div class="p-cards p-cards--col-4">

            <!-- カスタム投稿且つ同じタームに分類された関連投稿を表示 -->
            <?php // 現在表示されている投稿と同じタームに分類された投稿を取得
            $taxonomy_slug = 'works_category'; // タクソノミーのスラッグを指定
            $post_type_slug = 'works'; // 投稿タイプのスラッグを指定
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
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pc/blog3.jpg" alt="">
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
                      <span class="p-card__category"> <?php $terms = get_the_terms($post->ID, 'works_category');
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
<?php get_footer(); //header.phpを取得 
?>