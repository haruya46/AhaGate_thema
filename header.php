<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
  <div class="header">
    <h1 class="title"><a href="<?php echo get_permalink(get_page_by_path('home')); ?>"><?php bloginfo('name'); ?></a></h1>
    <nav class="nav">
      <ul>
        <li><a href="<?php echo get_permalink(get_page_by_path('home')); ?>/#about">ProProとは？</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_path('review')); ?>">口コミ</a></li>
        <li><a href="https://www.youtube.com/@ProPro-q8w">youtube</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_path('blog')); ?>">ブログ</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_path('contact')); ?>">お問い合わせ</a></li>
      </ul>
    </nav>
  </div>


</header>
