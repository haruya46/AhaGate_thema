<?php get_header(); ?>
<?php
$args = [
  'post_type' => 'review',
  'posts_per_page' => 5, // 必要に応じて数を調整
];
$reviews = new WP_Query($args);

if ($reviews->have_posts()) :
    while ($reviews->have_posts()) : $reviews->the_post();
      $portfolio_url = get_post_meta(get_the_ID(), 'portfolio_url', true);
  ?>
      <div class="review">
        <?php if (has_post_thumbnail()) : ?>
          <div class="review_thumbnail">
            <?php the_post_thumbnail('medium'); ?>
          </div>
        <?php endif; ?>
  
        <p class="review_content"><?php the_content(); ?></p>
        <p class="review_name"><?php the_title(); ?></p>
  
        <?php if ($portfolio_url) : ?>
          <p class="review_portfolio">
            <a href="<?php echo esc_url($portfolio_url); ?>" target="_blank" rel="noopener">
              ポートフォリオを見る
            </a>
          </p>
        <?php endif; ?>
      </div>
  <?php
    endwhile;
    wp_reset_postdata();
  else :
    echo '<p>口コミはまだ投稿されていません。</p>';
  endif;
  
?>


<form action="" method="post" enctype="multipart/form-data">
  <input type="text" name="review_title" placeholder="ニックネーム" required>
  <textarea name="review_content" placeholder="口コミ内容" required></textarea>
  <input type="url" name="portfolio_url" placeholder="ポートフォリオのURL" required>
  <input type="file" name="review_image" accept="image/*" required>
  <input type="submit" name="submit_review" value="投稿する">
</form>


<?php get_footer(); ?>