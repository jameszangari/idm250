<?php /* Template Name: Services Template */ ?>
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
          <div class="page-builder-service">
          <div class="services-form"><?php the_content(); ?></div>
          <section>
            <h2>Our Recent Work</h2>
            <?php
              // The Query
              // Link: https://developer.wordpress.org/reference/classes/wp_query/#parameters
          
              $args = [
                'post_type'      => 'music',
                'post_status'    => 'publish',
                'posts_per_page' => 3
              ];
              $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()): ?>
            <div class="sidebar-results-grid">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="sidebar-result">
                <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'large', array( 'class' => 'search-result-thumbnail' ) );
                } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/dist/images/image_not_set.jpg" alt="<?php the_title(); ?>" class="search-result-thumbnail"/>
                <?php } ?>
                </a>
                <?php endwhile; ?>
                <?php else : ?>
                    <h3 class="search-result-query-error">No Results Found!</h3>
                <?php endif; ?>
          </section>
          </div>
        </div>
    </div>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>