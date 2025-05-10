<?php
// テーマの機能追加ファイル functions.php

// ナビゲーションメニューを登録
function theme_setup() {
  // ヘッダーメニューを登録
  register_nav_menus([
    'header-menu' => 'ヘッダーメニュー',
  ]);
}

function theme_enqueue_styles() {
  // 共通スタイル
  wp_enqueue_style('common-style', get_template_directory_uri() . '/style.css', [], filemtime(get_template_directory() . '/style.css'));

  // 固定ページごとのスタイル
  if (is_page('home')) {
    wp_enqueue_style('home-style', get_template_directory_uri() . '/asset/css/home.css', [], filemtime(get_template_directory() . '/asset/css/home.css'));
  } elseif (is_page('review')) {
    wp_enqueue_style('review-style', get_template_directory_uri() . '/asset/css/review.css', [], filemtime(get_template_directory() . '/asset/css/review.css'));
  } elseif (is_page('blog')) {
    wp_enqueue_style('blog-style', get_template_directory_uri() . '/asset/css/blog.css', [], filemtime(get_template_directory() . '/asset/css/blog.css'));
  }

  // 固定ページ共通のスタイル（page.php 用）
  if (is_page()) {
    wp_enqueue_style('page-style', get_template_directory_uri() . '/asset/css/page.css', [], filemtime(get_template_directory() . '/asset/css/page.css'));
  }

  // 投稿ページ（single.php）用
  if (is_single() && 'post' === get_post_type()) {
    wp_enqueue_style('single-style', get_template_directory_uri() . '/asset/css/single.css', [], filemtime(get_template_directory() . '/asset/css/single.css'));
  }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');






//口コミ機能
  // 口コミ投稿タイプ
function create_review_post_type() {
  register_post_type('review', [
    'labels' => [
      'name' => '口コミ',
      'singular_name' => 'review',
    ],
    'public' => true,
    'has_archive' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'menu_position' => 5,
    'menu_icon' => 'dashicons-star-filled',
  ]);
}
add_action('init', 'create_review_post_type');

add_theme_support('post-thumbnails');


// ポートフォリオURLのメタボックス追加
function add_review_meta_box() {
  add_meta_box(
    'review_portfolio_meta_box',
    'ポートフォリオのURL',
    'render_review_meta_box',
    'review',
    'normal',
    'default'
  );
}
add_action('add_meta_boxes', 'add_review_meta_box');

function render_review_meta_box($post) {
  $portfolio_url = get_post_meta($post->ID, 'portfolio_url', true);
  wp_nonce_field('save_review_meta_box', 'review_meta_box_nonce');
  ?>
  <p>
    <label for="portfolio_url">ポートフォリオのリンク:</label><br>
    <input type="url" name="portfolio_url" value="<?php echo esc_attr($portfolio_url); ?>" style="width:100%;">
  </p>
  <?php
}

function save_review_meta_box_data($post_id) {
  if (!isset($_POST['review_meta_box_nonce']) || !wp_verify_nonce($_POST['review_meta_box_nonce'], 'save_review_meta_box')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  if (isset($_POST['portfolio_url'])) {
    update_post_meta($post_id, 'portfolio_url', sanitize_text_field($_POST['portfolio_url']));
  }
}
add_action('save_post', 'save_review_meta_box_data');


  //口コミ機能ここまで
// Q&A
  function create_qa_post_type() {
    register_post_type('qa', [
      'labels' => [
        'name' => 'Q&A',
        'singular_name' => 'Q&A',
      ],
      'public' => true,
      'has_archive' => true,
      'supports' => ['title', 'editor'],
      'menu_position' => 6,
      'menu_icon' => 'dashicons-editor-help',
    ]);
  }
  add_action('init', 'create_qa_post_type');
  // Q&Aここまで