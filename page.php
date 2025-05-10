<?php get_header(); ?>

<main class="single_post">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article class="post_detail">
      <?php if (has_post_thumbnail()) : ?>
        <div class="post_thumbnail">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

      <h1 class="post_title"><?php the_title(); ?></h1>

      <div class="post_content">
        <?php the_content(); ?>
      </div>
    </article>

  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
