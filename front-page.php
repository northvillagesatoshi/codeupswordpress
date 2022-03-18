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
<section class="p-top-mv js-mv">
  <div class="p-top-mv__slide-img">
    <?php for ($i = 1; $i <= 3; $i++) : ?>
      <figure class="p-top-mv__img filter">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/top/top-mv<?php echo $i ?>.jpg" alt="メインビジュアル画像<?php echo $i ?>枚目">
      </figure>
    <?php endfor; ?>
  </div>
  <div class="p-top-mv__inner">
    <h1 class="p-top-mv-title">メインタイトルが入ります</h1>
    <span class="p-top-mv-sub-title">サブタイトルが入ります</span>
  </div>
</section>
<div class="l-top-news">
  <?php
  $news_query = new WP_Query(
    array(
      'post_type'      => 'post',
      'posts_per_page' => 1,
    )
  );
  ?>
  <?php if ($news_query->have_posts()) : ?>
    <?php while ($news_query->have_posts()) : ?>
      <?php $news_query->the_post(); ?>

      <div class="p-top-news l-inner-md">
        <div class="p-top-news__inner">
          <time><?php the_time('Y.m.d'); ?></time>
          <div class="p-top-news__category">
            <span class="c-category c-category--black">
              <?php the_category(''); ?>
            </span>
          </div>
        </div>
        <p class="p-top-news__text">
          <a href="#"><?php the_title(); //投稿（固定ページ）のタイトルを表示 
                                              ?></a>
        </p>
        <div class="p-top-news__btn u-mobile">
          <a href="<?php echo $news ?>" class="c-btn c-btn--background-black">すべて見る</a>
        </div>
        <div class="p-top-news__btn u-desktop">
          <a href="<?php echo $news ?>" class="c-btn c-btn--background-white">すべて見る</a>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</div>

<section class="l-top-content">
  <div class="p-top-content">
    <div class="p-top-content__inner l-inner">
      <div class="p-top-content__title">
        <h2 class="c-section-header__title">事業概要</h2>
        <div class="p-top-section-title__block p-top-section-title__block--top-content">
          <span class="c-section-header__sub-title">content</span>
        </div>
      </div>
      <div class="p-top-content__items">
        <a href="<?php echo $content ?>" class="p-top-content__item u-filter"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/content/content1.jpg" alt="" />
          <p>経営理念ページへ</p>
        </a>
        <a href="<?php echo $content ?>#content1" class="p-top-content__item u-filter"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/content/content2.jpg" alt="" />
          <p>理念1へ</p>
        </a>
        <a href="<?php echo $content ?>#content2" class="p-top-content__item u-filter"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/content/content3.jpg" alt="" />
          <p>理念2へ</p>
        </a>
        <a href="<?php echo $content ?>#content3" class="p-top-content__item u-filter"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/content/content4.jpg " alt="" />
          <p>理念3へ</p>
        </a>
      </div>
    </div>
  </div>
</section>
<section class="l-top-works">
  <div class="p-top-works">
    <div class="p-top-works__inner">
      <div class="p-top-works__title l-inner">
        <h2 class="c-section-header__title">制作実績</h2>
        <div class="p-top-section-title__block p-top-section-title__block--top-works">
          <span class="c-section-header__sub-title">works</span>
        </div>
      </div>
      <div class="p-top-works__content">
        <div class="p-top-works__swiper">
          <div class="swiper works-swiper">
            <div class="swiper-wrapper">

              <?php for ($i = 1; $i <= 3; $i++) : ?>
                <div class="swiper-slide p-top-works__slide-img">
                  <img src="<?php echo get_template_directory_uri(); ?>/dist/images/works/works<?php echo $i ?>.jpg" alt="#">
                </div>
              <?php endfor; ?>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="p-top-works__body">
          <h3 class="p-top-works__small-title">メインタイトルが入ります</h3>
          <div class="p-top-works__normal-text">
            <p class="c-normal-text ">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
          </div>
          <div class="p-top-works__btn">
            <a href="<?php echo $works ?>" class="c-btn c-btn--background-black">詳しく見る</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="l-top-overview">
  <div class="p-top-overview">
    <div class="p-top-overview__inner l-inner">
      <div class="p-top-overview__title">
        <h2 class="c-section-header__title">会社概要</h2>
        <div class="p-top-section-title__block p-top-section-title__block--top-overview">
          <span class="c-section-header__sub-title">overview</span>
        </div>
      </div>
      <div class="p-top-overview__block">
        <div class="p-top-overview__container">
          <div class="p-top-overview__img">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/overview/overview1.jpg" alt="企業概要" />
          </div>
          <div class="p-top-overview__wrapper">
            <div class="p-top-overview-bottom__inner">
              <h3 class="small-title p-top-overview__small-title"> メインタイトルが入ります。 </h3>
              <div class="p-top-overview__text normal-text">
                <p class="c-normal-text ">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
              </div>
              <div class="p-top-overview__btn">
                <a href="<?php echo $overview ?>" class="c-btn c-btn--background-black">詳しく見る</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="l-top-blog">
  <div class="p-top-blog">
    <div class="p-top-blog__inner">
      <div class="p-top-blog__header">
        <div class="p-top-blog__title">
          <h2 class="c-section-header__title">ブログ</h2>
        </div>
        <div class="p-top-blog__sub-title">
          <span class="c-section-header__sub-title">blog</span>
        </div>
      </div>
      <div class="p-top-blog__cards">

        <div class="p-cards p-cards--top">
          <?php
          $news_query = new WP_Query(
            array(
              'post_type'      => 'blog',
              'posts_per_page' => 3,
            )
          );
          ?>
          <?php if ($news_query->have_posts()) : ?>
            <?php while ($news_query->have_posts()) : ?>
              <?php $news_query->the_post(); ?>
              <a href="<?php the_permalink(); ?>" class="p-card">

                <?php
                $limit = 1;
                $num = $news_query->current_post;
                if ($limit > $num) :
                  echo '<div class="p-card__new-label">', '<b class="c-new-label">', '<span>', 'new', '</span>', '</b>', '</div>';
                endif; ?>



                <figure class="p-card__img">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail();
                  } else { ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>dist/images/pc/blog3.jpg" alt="">
                  <?php } ?>
                </figure>
                <div class="p-card__body">
                  <div class="p-card__title-block">
                    <h3 class="p-card__title"><?php the_title(); //投稿（固定ページ）のタイトルを表示 
                                              ?></h3>
                  </div>
                  <div class="p-card__text-block">
                    <p class="p-card__text"> <?php echo get_the_excerpt(); ?></p>
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
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="p-top-blog__btn">
        <a href="<?php echo $blog ?>" class="c-btn c-btn--background-black">詳しく見る</a>
      </div>
    </div>
  </div>
</section>
<section class="l-common-contact">
  <div class="p-common-contact">
    <div class="p-common-contact__inner l-inner">
      <div class="p-common-contact__header">
        <div class="p-common-contact__title">
          <h2 class="c-section-header__title">お問い合わせ</h2>
        </div>
        <div class="p-top-section-title__block p-top-section-title__block--contact">
          <span class="c-section-header__sub-title">contact</span>
        </div>
      </div>
      <div class="p-common-contact__text-block">
        <p class="p-common-contact__text"> テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。 </p>
      </div>
      <div class="p-common-contact__btn">
        <a href="<?php echo $contact ?>" class="c-btn c-btn--background-black">お問い合わせへ</a>
      </div>
    </div>
  </div>
</section>
<a href="#" class="c-to-top js-to-top">
  <span class="c-to-top__allow"></span>
</a>
<?php get_footer();
