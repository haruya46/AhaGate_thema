<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="AhaGate（アハゲート）は、初心者から中級者までを対象としたオンラインプログラミングスクールです。
  月4回のZoomセッションやLINEでの質問対応を通じて、受講生の自走力と継続力を育成します。
  ビギナーコースではHTML、CSS、JavaScript、PHPなどの基礎を学び、プロコースではLaravelを用いたポートフォリオ制作を行います。
  月額30,000円で入会金や違約金は不要、途中解約も可能です。
  学習習慣がなくても、講師がスケジュール管理をサポートします。詳細は公式サイトをご覧ください。">

  <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>


    <!-- フォント -->
    <script>
  (function(d) {
    var config = {
      kitId: 'diq2pfe',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>


<!-- フォントここまで -->
</head>
<body <?php body_class(); ?>>
<header>
  <div class="header">
    <h1 class="title">
      <a href="<?php echo get_permalink(get_page_by_path('home')); ?>">
        <?php bloginfo('name'); ?>
      </a>
    </h1>

    <!-- ハンバーガーアイコン -->
    <div class="hamburger" id="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <!-- オーバーレイナビ -->
    <nav class="nav" id="nav">
      <ul>
        <li><a href="<?php echo get_permalink(get_page_by_path('home')); ?>/#about">AhaGateとは？</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_path('review')); ?>">受講生の声</a></li>
        <li><a href="https://www.youtube.com/@ProPro-q8w">YouTube</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_path('blog')); ?>">ブログ</a></li>
        <li><a href="https://lin.ee/U15BVk2">お問い合わせ</a></li>
      </ul>
    </nav>
  </div>
</header>

