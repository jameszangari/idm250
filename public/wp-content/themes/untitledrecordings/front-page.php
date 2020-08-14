<?php get_header();?>
<main class="main-content-front">
  <?php while (have_posts()) : the_post(); ?>
    <div class="container">
      <div class="page-builder">
        <?php the_content(); ?>
      </div>
      <?php the_tags(); ?>
    </div>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>