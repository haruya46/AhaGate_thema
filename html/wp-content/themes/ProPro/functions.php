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
    // 共通スタイル（常に読み込みたいスタイル）
    wp_enqueue_style('common-style', get_template_directory_uri() . '/asset/style.css', [], filemtime(get_template_directory() . '/asset/style.css'));
  
    // 固定ページごとの個別スタイル
    if (is_page('home')) {
      wp_enqueue_style('home-style', get_template_directory_uri() . '/asset/css/home.css', [], filemtime(get_template_directory() . '/asset/css/home.css'));
    } elseif (is_page('contact')) {
      wp_enqueue_style('contact-style', get_template_directory_uri() . '/asset/css/contact.css', [], filemtime(get_template_directory() . '/asset/css/contact.css'));
    }elseif (is_page('review')) {
        wp_enqueue_style('review-style', get_template_directory_uri() . '/asset/css/review.css', [], filemtime(get_template_directory() . '/asset/css/contact.css'));
      }
  }
  add_action('wp_enqueue_scripts', 'theme_enqueue_styles');







//口コミ機能
  function create_review_post_type() {
    register_post_type('review', [
      'labels' => [
        'name' => '口コミ',
        'singular_name' => '口コミ',
      ],
      'public' => true,
      'has_archive' => true,
      'supports' => ['title', 'editor', 'custom-fields'],
      'menu_position' => 5,
      'menu_icon' => 'dashicons-star-filled',
    ]);
  }
  add_action('init', 'create_review_post_type');

 if (isset($_POST['submit_review'])) {
  $title = sanitize_text_field($_POST['review_title']);
  $content = sanitize_textarea_field($_POST['review_content']);
  $portfolio_url = esc_url_raw($_POST['portfolio_url']);

  // URLが空なら投稿処理を中断
  if (empty($portfolio_url)) {
    echo '<p style="color: red;">ポートフォリオのURLは必須です。</p>';
    return;
  }

  // 投稿を作成
  $post_id = wp_insert_post([
    'post_type' => 'review',
    'post_title' => $title,
    'post_content' => $content,
    'post_status' => 'pending',
  ]);

  if ($post_id && !is_wp_error($post_id)) {
    // カスタムフィールドにURLを保存
    update_post_meta($post_id, 'portfolio_url', $portfolio_url);

    // ファイルが送信されているかチェック
    if (!empty($_FILES['review_image']['name'])) {
      require_once ABSPATH . 'wp-admin/includes/file.php';
      require_once ABSPATH . 'wp-admin/includes/media.php';
      require_once ABSPATH . 'wp-admin/includes/image.php';

      // ファイルをアップロードし、添付ファイルIDを取得
      $file_id = media_handle_upload('review_image', $post_id);

      if (!is_wp_error($file_id)) {
        // アイキャッチとして設定
        set_post_thumbnail($post_id, $file_id);
      } else {
        echo '<p style="color: red;">画像のアップロードに失敗しました。</p>';
      }
    }

    echo '<p style="color: green;">口コミを受け付けました。ありがとうございます！承認され次第公開されます！</p>';
  } else {
    echo '<p style="color: red;">送信に失敗しました。</p>';
  }
}

  

  //口コミ機能ここまで