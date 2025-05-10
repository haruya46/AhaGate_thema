<?php get_header(); ?>
<div>
  <div class="sab_title">
      <h2 class="sab_title_text">ブログ</h2>
      <span class="sab_title_line"></span>
  </div>
  <?php
  $args = [
    'post_type' => 'post',
  ];
  $blog_posts = new WP_Query($args);

  if ($blog_posts->have_posts()) :
    while ($blog_posts->have_posts()) : $blog_posts->the_post();
  ?>
    <div class="review">
      <div class="review_thumbnail">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('medium'); ?>
        <?php endif; ?>
      </div>

      <div class="review_content_item">
            <div class="review_content_about">
            <h3 class="review_name">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <span class="review_title_line"></span>
        </div>
        <p class="review_content"><?php the_excerpt(); ?></p> <!-- 本文の抜粋 -->
        <p><a href="<?php the_permalink(); ?>">続きを読む</a></p>
      </div>
    </div>
  <?php
    endwhile;
    wp_reset_postdata();
  else :
    echo '<p>ブログ投稿はまだありません。</p>';
  endif;
  ?>
</div>


</div>

<?php get_footer(); ?>