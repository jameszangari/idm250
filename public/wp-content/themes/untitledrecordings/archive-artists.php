<?php get_header();?>
<main class="main-content-front">
  <div class="archive-hero">
  <a href="<?php echo get_site_url(); ?>">
    <img src="<?php echo get_field('logo-full', 'option')["url"]; ?>" alt="<?php echo get_field('logo-full', 'option')["alt"]; ?>" class="archive-hero-image">
  </a>
  </div>
  <div class="archive-result-info-group">
    <?php $tax = $wp_query->get_queried_object(); ?>
    <h3 class="archive-result-query">All Untitled Recordings <?php echo $tax->name; ?></h3>
    <p class="archive-result-number"><strong><?php echo $countPosts = $wp_the_query->post_count;?></strong> results found</p>
  </div>

  <?php if (have_posts()): ?>
  <div class="archive-results-grid">
    <?php while (have_posts()) : the_post(); ?>
      <div class="search-result">
      <a href="<?php the_permalink(); ?>">
      <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'large', array( 'class' => 'search-result-thumbnail' ) );
      } else { ?>
        <img src="<?php bloginfo('template_directory'); ?>/dist/images/image_not_set.jpg" alt="<?php the_title(); ?>" class="search-result-thumbnail"/>
      <?php } ?>
      </a>
      <a href="<?php the_permalink(); ?>" class="search-result-title-link">
        <h1><?php the_title(); ?></h1>
      </a>
      
      <div class="search-result-tag-group">
      <p class="search-result-type-tag">  
      <?php
        $id = get_the_ID();
        $artist_roles = get_the_terms( $id, 'artist_roles' );
        $total = count($artist_roles);
      ?>
      <?php if ($artist_roles) : ?>
      <?php foreach ($artist_roles as $key => $roles){ ?>
        <?php
          $name = $roles->name;
          $link = get_term_link($roles->term_id);
        ?>  
        <a href="<?php echo $link; ?>"> 
            <?php echo $key + 1 != $total ? $roles->name . ', ' : $roles->name  ;?>
        </a>  
        <?php } ?>
      <?php endif; ?> 
      </p> 
      </div>
      </div>
    <?php endwhile; ?>
  </div>

  <?php else: ?>
    <h3 class="search-result-query-error">No Results Found!</h3>
  <?php endif; ?>
</main>
<?php get_footer(); ?>