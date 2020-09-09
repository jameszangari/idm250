<?php get_header();?>
<main class="main-content">
<div class="archive-hero">
  <a href="<?php echo get_site_url(); ?>">
    <img src="<?php echo get_field('logo-full', 'option')["url"]; ?>" alt="<?php echo get_field('logo-full', 'option')["alt"]; ?>" class="archive-hero-image">
  </a>
</div>
  <?php while (have_posts()) : the_post(); ?>
    <div class="container-contact">
        <!-- Main Content -->
        <div class="column">
          <h1 class="post_title"><?php the_title(); ?></h1>
          <?php the_excerpt(); ?>
          <?php the_post_thumbnail(); ?>
          <div class="page-builder">
            <?php the_content(); ?>
          </div>
        </div>
    </div>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>