<?php get_header();?>
<main class="main-content-front">
  <div class="search-hero">
    <img src="<?php echo get_field('logo-full', 'option')["url"]; ?>" alt="<?php echo get_field('logo-full', 'option')["alt"]; ?>" class="search-hero-image">
    <div class="search-bar">
        <form action="/" method="get">
          <!-- <label for="searchField">Search</label> -->
          <input type="text" name="s" id="seachField" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Search' ); ?>" class="search-bar-input">
          <input type="submit" value="Search" class="search-bar-submit">  
        </form>
    </div>
  </div>

  <?php if (have_posts()): ?>
  <div class="search-results-grid">
    <?php while (have_posts()) : the_post(); ?>
      <div class="search-result">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'large', array( 'class' => 'search-result-thumbnail' ) ); ?>
      </a>
      <h1><?php the_title(); ?></h1>
      
      <div class="search-result-tag-group">
      <div class="column-1">
      <?php
        $id = get_the_ID();
        $type_list = get_the_terms( $id, 'music_type' );
      ?>
      <?php if ($type_list) : ?>
        <?php foreach ($type_list as $producer): ?>
            <?php
            // Get sub field values.
            $profile_image = get_field('profile_image', $producer->taxonomy . '_' . $producer->term_id);
            $name = $producer->name;
            $link = get_term_link($producer->term_id);
            //var_dump($link);
            ?>  
        <p class="search-result-type-tag"><?php echo $producer->name; ?> by</p>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <div class="column-2">
      <?php
        $id = get_the_ID();
        $genre_list = get_the_terms( $id, 'music_genre' );
      ?>
      <?php if ($genre_list) : ?>
        <?php foreach ($genre_list as $producer): ?>
            <?php
            // Get sub field values.
            $name = $producer->name;
            $link = get_term_link($producer->term_id);
            //var_dump($link);
            ?>  
        <a href="<?php echo $link ;?>"><p><?php echo $producer->name; ?></p></a>
        <?php endforeach; ?>
        <?php endif; ?>

      <?php
        $id = get_the_ID();
        $year_list = get_the_terms( $id, 'music_year' );
      ?>
      <?php if ($year_list) : ?>
        <?php foreach ($year_list as $producer): ?>
            <?php
            // Get sub field values.
            $name = $producer->name;
            $link = get_term_link($producer->term_id);
            //var_dump($link);
            ?>  
        <a href="<?php echo $link ;?>"><p><?php echo $producer->name; ?></p></a>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
      </div>

        <?php if (get_field('producers')) : ?>
          <div class="search-result-artist-group">
            <?php foreach (get_field('producers') as $producer): ?> 
            <?php $profile_image = get_field('profile_image', $producer->ID); ?>
              <a href="<?php echo get_permalink( $producer->ID ) ;?>">
                <img src="<?php echo $profile_image["url"] ?>" alt="<?php echo $profile_image["alt"] ?>" class="search-result-artist-image">
              </a>
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
    <h1>Error</h1>
  <?php endif; ?>
</main>
<?php get_footer(); ?>