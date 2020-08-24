<?php get_header();?>
<main class="main-content-front">
  <div class="search-hero">
  <a href="<?php echo get_site_url(); ?>">
    <img src="<?php echo get_field('logo-full', 'option')["url"]; ?>" alt="<?php echo get_field('logo-full', 'option')["alt"]; ?>" class="search-hero-image">
  </a>
    <div class="search-bar">
        <form action="/" method="get">
          <input type="text" name="s" id="seachField" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Search' ); ?>" class="search-bar-input">
          <input type="submit" value="Search" class="search-bar-submit">  
        </form>
    </div>
    <div class="search-result-info-group">
      <h3 class="search-result-query">Search results for: <strong><?php echo esc_html( get_search_query( false ) ); ?></strong></h3>
      <p class="search-result-number"><strong><?php echo $countPosts = $wp_the_query->post_count;?></strong> results found</p>
    </div>
  </div>

  <?php if (have_posts()): ?>
  <div class="search-results-grid">
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
      <div class="column-1">
      <?php
        $id = get_the_ID();
        $type_list = get_the_terms( $id, 'music_type' );
      ?>
      <?php if ($type_list) : ?>
        <?php foreach ($type_list as $type): ?>
            <?php
            // Get sub field values.
            $profile_image = get_field('profile_image', $type->taxonomy . '_' . $type->term_id);
            $name = $type->name;
            $link = get_term_link($type->term_id);
            //var_dump($link);
            ?>  
        <a href="<?php echo $link ;?>">
          <p class="search-result-type-tag"><?php echo $type->name; ?> by</p>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
        </div>

      <div class="column-2">
      <?php
        $id = get_the_ID();
        $genre_list = get_the_terms( $id, 'music_genre' );
      ?>
      <?php if ($genre_list) : ?>
        <?php foreach ($genre_list as $genre): ?>
            <?php
            // Get sub field values.
            $name = $genre->name;
            $link = get_term_link($genre->term_id);
            //var_dump($link);
            ?>  
        <a href="<?php echo $link ;?>">
          <p><?php echo $genre->name; ?></p>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>

      <?php
        $id = get_the_ID();
        $year_list = get_the_terms( $id, 'music_year' );
      ?>
      <?php if ($year_list) : ?>
        <?php foreach ($year_list as $year): ?>
            <?php
            // Get sub field values.
            $name = $year->name;
            $link = get_term_link($year->term_id);
            //var_dump($link);
            ?>  
        <a href="<?php echo $link ;?>">
          <p><?php echo $year->name; ?></p>
        </a>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
      </div>

      <?php if (get_field('producers')) : ?>
        <div class="search-result-artist-group">
          <?php foreach (get_field('producers') as $producer): ?> 
            <?php //var_dump($producer); ?>
          <?php 
            $profile_image = get_field('profile_image', $producer->ID); 
          ?>
          <?php if ($profile_image) : ?>
            <a href="<?php echo get_permalink( $producer->ID ) ;?>">
              <img src="<?php echo $profile_image["url"] ?>" alt="<?php echo $profile_image["alt"] ?>" class="search-result-artist-image">
            </a>
          <?php endif; ?>
            <a href="<?php echo get_permalink( $producer->ID ) ;?>">
              <p class="search-result-artist-title"><?php echo $producer->post_title ;?></p>  
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      </div>
    <?php endwhile; ?>
  </div>


  <?php else: ?>
    <h3 class="search-result-query-error">No Results Found!</h3>
  <?php endif; ?>
</main>
<?php get_footer(); ?>