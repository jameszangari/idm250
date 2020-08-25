<?php get_header();?>
<main class="main-content">
  <div class="artist-intro-content">
    <div class="artist-intro-content-left">
    <?php while (have_posts()) : the_post(); ?>
    <h1 class="artist-title"><?php the_title(); ?></h1>

    <p class="artist-roles-title">
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

    <?php 
        $instagram = get_field('instagram');
        $twitter = get_field('twitter');
        $soundcloud = get_field('soundcloud');
        $email = get_field('email');
    ?>
    <div class="artist-social-media">
      <?php if ($instagram) : ?>
        <a href="<?php echo $instagram["url"] ?>" target="<?php echo $instagram["target"] ?>" class="artist-socials-instagram"><i class="fab fa-instagram"></i></a>
      <?php endif; ?>
      <?php if ($twitter) : ?>
        <a href="<?php echo $twitter["url"] ?>" target="<?php echo $twitter["target"] ?>" class="artist-socials-twitter"><i class="fab fa-twitter"></i></a>
      <?php endif; ?>
      <?php if ($soundcloud) : ?>
        <a href="<?php echo $soundcloud["url"] ?>" target="<?php echo $soundcloud["target"] ?>" class="artist-socials-soundcloud"><i class="fab fa-soundcloud"></i></a>
      <?php endif; ?>
    </div>
    <?php if ($email) : ?>
        <a href="mailto:<?php echo $email ?>" target="_blank noopener noreferrer" class="artist-socials-email-link"><!-- <i class="fas fa-envelope"></i> -->
              <p><?php echo $email ;?></p>
        </a>
    <?php endif; ?>
    </div>

  <div class="artist-intro-content-right">
    <div class="artist-profile-image-shadow js-fillcolor">
      <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'large', array( 'class' => 'artist-profile-image' ) );
      } else { ?>
        <img src="<?php bloginfo('template_directory'); ?>/dist/images/image_not_set.jpg" alt="<?php the_title(); ?>" class="artist-profile-image"/>
      <?php } ?>
    </div>
  </div>
  </div>

  <?php 
    $bio = get_field('bio');
    $quote = get_field('artist_quote');
    $quote_cite = get_field('quote_cite');
  ?>
  <?php if($bio) : ?>
  <div class="single-artists-about">
    <h2>About</h2>
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/waveform_white.png" alt="Waveform" class="heading-waveform-image">
      <p class="single-artists-about-text"><?php echo $bio; ?></p>
      <?php if($quote) : ?> 
        <blockquote class="single-artists-quote"><?php echo $quote; ?>
      <?php endif; ?> 
      <?php if($quote_cite) : ?> 
        <cite><?php echo $quote_cite; ?></cite>
        </blockquote>
      <?php endif; ?> 
  </div>
  <?php endif; ?>

  <div class="portfolio">
    <h2>Portfolio</h2>
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/waveform_white.png" alt="Waveform" class="heading-waveform-image">

  <?php 
    $id = get_the_ID();
    $args = array(
      'numberposts' => 12,
      'post_type'   => 'music',
      'include'     => $id,
    );

    $latest_music = get_posts( $args );
    var_dump($args);
  ?>

  <div class="portfolio-grid">
  <?php if($latest_music) : ?>
    <?php foreach ($latest_music as $music) :?>
      <div class="portfolio-grid-image">
        <img src="<?php echo get_the_post_thumbnail_url($music->ID); ?>" alt="<?php echo $music->post_title; ?>">
        <div class="portfolio-grid-hover">
          <h3><?php echo $music->post_title; ?></h3>
            <a href="<?php echo get_permalink($music->ID); ?>" class="portfolio-hover-button-link">
              <div class="portfolio-hover-button">
                <p>View Release</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#F7F7FF" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>               
              </div>
            </a>         
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
  </div>
  <a href="<?php echo get_post_type_archive_link('music'); ?>" class="portfolio-button-link">
      <div class="portfolio-button">
        <p>View All Releases</p>
        <svg xmlns="http://www.w3.org/2000/svg" fill="#F7F7FF" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>               
      </div>
    </a>     
  </div>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>