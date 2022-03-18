<?php
//error_reporting(0);
define('codeups-wordpress', '');
function my_setup()
{
  add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // タイトルタグ自動生成
  add_theme_support(
    'html5',
    array( //HTML5でマークアップ
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}
add_action('after_setup_theme', 'my_setup');

/* CSSとJavaScriptの読み込み */
function my_script_init()
{ // WordPress提供のjquery.jsを読み込まない
  wp_deregister_script('jquery');
  // jQueryの読み込み
  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', "", "1.0.1"); //index54行
  wp_enqueue_style('NotoSans', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP&display=swap'); //index51-52行
  wp_enqueue_script('swiper', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', "", ""); //index56行
  wp_enqueue_style('swiper',  'https://unpkg.com/swiper@7/swiper-bundle.min.css',  ""); //index45行
  wp_enqueue_style('fontawesome',  'https://use.fontawesome.com/releases/v5.6.1/css/all.css', array(), '1.0.1'); //index47行
  //wp_enqueue_script( 'inview', get_template_directory_uri() . '/js/jquery.inview.js?20210326', array( 'jquery' ), '1.0.1', true );
  wp_enqueue_script('main', get_template_directory_uri() . '/dist/js/script.min.js', array('jquery'), '1.0.1', true); //index55行
  wp_enqueue_style('style-name', get_template_directory_uri() . '/dist/css/style.css', array(), '1.0.1'); //index44行
}
add_action('wp_enqueue_scripts', 'my_script_init');

// 投稿のアーカイブページを作成する
function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = true; // リライトを有効にする
    $args['has_archive'] = 'news'; // 任意のスラッグ名
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);


