<?php
get_header();
?>

<div>
  <div class="sab_title">
      <h2 class="sab_title_text">受講生の声</h2>
      <span class="sab_title_line"></span>
  </div>

  <?php
      $args = [
      'post_type' => 'review',
      ];
      $reviews = new WP_Query($args);

      if ($reviews->have_posts()) :
          while ($reviews->have_posts()) : $reviews->the_post();
          $portfolio_url = get_post_meta(get_the_ID(), 'portfolio_url', true);
  ?>
  <div class="review">
      <div class="review_thumbnail">
          <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('medium'); ?>
          <?php endif; ?>
      </div>

      <div class="review_content_item">
          <p class="review_content"><?php the_content(); ?></p>
          <div class="review_content_about">
              <?php if ($portfolio_url) : ?>
              <p class="review_portfolio">
                  <a href="<?php echo esc_url($portfolio_url); ?>" target="_blank" rel="noopener">
                  ポートフォリオを見る
                  </a>
              </p>
              <?php endif; ?>
              <p class="review_name"><?php the_title(); ?></p>
      

          </div>

      </div>

  </div>
  <?php
          endwhile;
          wp_reset_postdata();
      else :
          echo '<p>口コミはまだ投稿されていません。</p>';
      endif;
      
  ?>
</div>

<?php get_footer(); ?>
