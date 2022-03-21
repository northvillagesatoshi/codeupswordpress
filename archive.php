<?php get_header(); //header.phpを取得 
?>

<section class="p-lower-mv--news ">
    <div class="p-lower-mv js-mv u-filter">
        <h1 class="p-lower-mv__title">お知らせ</h1>
    </div>
</section>

<div class="l-breadcrumb">
    <div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
            bcn_display();
        } ?>
    </div>
</div>
<main class="p-news">
    <div class="l-inner">
        <div class="p-news__list l-news-list">
            <div class="p-news-list">
                <div class="p-news-list__items">
                    <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;    //pagedに渡す変数
                    query_posts($query_string . '&posts_per_page=10&paged=' . $paged); ?>

                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : ?>
                            <?php the_post(); ?>
                            <div class="p-news-list__item">
                                <div class="p-news">
                                    <div class="p-news__inner">
                                        <!-- 本当はdatetime必要 -->
                                        <time><?php the_time('Y.m.d'); //投稿日時を表示 パラメータで書式を指定 
                                                ?></time>
                                        <div class="p-news__category">
                                            <span class="c-category c-category--black"><?php the_category(' ') ?></span>
                                        </div>
                                    </div>
                                    <a href="#" class="p-news__text">
                                        <?php the_excerpt(); //投稿（固定ページ）の要約を表示 
                                        ?></a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="l-pager">
                <?php wp_pagenavi(); ?>
            </div>
        </div>
    </div>
    <a href="#" class="c-to-top js-to-top">
        <span class="c-to-top__allow"></span>
    </a>
</main>

<!-- lower-contact箇所を呼び出す -->
<div class="l-common-contact">
    <?php get_template_part('lowercontact'); ?>
</div>
<a href="#" class="c-to-top js-to-top">
    <span class="c-to-top__allow"></span>
  </a>
<?php get_footer(); //footer.phpを取得　PHPで終了するので閉じタグは不要です