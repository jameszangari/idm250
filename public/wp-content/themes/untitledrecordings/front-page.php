<?php get_header();?>
<?php if (have_posts()): ?>
<main class="main-content-front">
  <?php while (have_posts()) : the_post(); ?>
  
  <?php the_content(); ?>

  <?php 
    // Get sub field values.
    $about = get_field('about_us');
  ?>
  <?php if($about) : ?>
  <div class="front-page-about">
    <h2>Who are we?</h2>
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/waveform_white.png" alt="Waveform" class="heading-waveform-image">
      <p><?php echo $about; ?></p> 
  </div>
  <?php endif; ?>

  <div class="front-page-artists-group">
  <h2>Our Artists</h2>
  <img src="<?php bloginfo('template_directory'); ?>/dist/images/waveform_black.png" alt="Waveform" class="heading-waveform-image">
  <div class="front-page-artists" id="artists">
    <?php if (get_field('producers')) : ?>
        <?php foreach (get_field('producers') as $producer): ?> 
          <?php //var_dump($producer); ?>
            <div class="front-page-artist">
              <a href="<?php echo get_permalink($producer->ID); ?>">
                <img src="<?php echo get_the_post_thumbnail_url($producer->ID); ?>" alt="">
              </a>
              <h3><?php echo $producer->post_title; ?></h3>
              <hr class="front-page-artist-line">
              <h4>    
              <?php
                $artist_roles = get_the_terms( $producer->ID, 'artist_roles' );
                $total = count($artist_roles);

                foreach ($artist_roles as $key => $roles) {
                //var_dump($artist_roles);
              ?>
              <?php echo $key + 1 != $total ? $roles->name . ', ' : $roles->name  ;?>
              <?php } ?>              
              </h4>
              <a href="<?php echo get_permalink($producer->ID); ?>" class="front-page-artist-button-link">
                <div class="front-page-artist-button">
                    <p>Artist Page</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#F7F7FF" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>               
                </div>
              </a>         
            </div>
            <?php //endif; ?>
        <?php endforeach; ?>
    <?php endif;?>
  </div>
  </div>

  <div class="beat-store">
    <h2>Beat Store</h2>
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/waveform_white.png" alt="Waveform" class="heading-waveform-image">
    <iframe src="https://traktrain.com/widget/25495" width="100%" height="790" frameborder="0"></iframe>
  </div>

  <div class="portfolio">
    <h2>Our Work</h2>
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/waveform_white.png" alt="Waveform" class="heading-waveform-image">

  <?php 
  $args = array(
    'numberposts' => 12,
    'post_type'   => 'music'
  );
  
  $latest_music = get_posts( $args );
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

<?php if( have_rows('services') ): ?>
  <?php while( have_rows('services') ): the_row(); 

      // Get sub field values.
      $recording = get_sub_field('recording');
      $production = get_sub_field('production');
      $mixing = get_sub_field('mixing');
      $mastering = get_sub_field('mastering');
      $services = get_sub_field('services_description');
      $email = get_sub_field('email');
  ?>
  <div class="front-page-services">
    <h2>Our Services</h2>
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/waveform_white.png" alt="Waveform" class="heading-waveform-image">

    <div class="front-page-services-grid">
    <div class="front-page-services-grid-item">
    <?php if($recording) : ?>
      <img src="<?php echo $recording["url"]; ?>" alt="<?php echo $recording["alt"]; ?>">
      <h3><?php echo $recording["title"]; ?></h3>
    <?php endif; ?>
    </div>
    <div class="front-page-services-grid-item">
    <?php if($production) : ?>
      <img src="<?php echo $production["url"]; ?>" alt="<?php echo $production["alt"]; ?>">
      <h3><?php echo $production["title"]; ?></h3>
    <?php endif; ?>
    </div>
    <div class="front-page-services-grid-item">
    <?php if($mixing) : ?>
      <img src="<?php echo $mixing["url"]; ?>" alt="<?php echo $mixing["alt"]; ?>">
      <h3><?php echo $mixing["title"]; ?></h3>
    <?php endif; ?>
    </div>
    <div class="front-page-services-grid-item">
    <?php if($mastering) : ?>
      <img src="<?php echo $mastering["url"]; ?>" alt="<?php echo $mastering["alt"]; ?>">
      <h3><?php echo $mastering["title"]; ?></h3>
    <?php endif; ?>
    </div>
    </div>
    <div class="front-page-services-grid-bottom">
    <?php if($services) : ?>
      <p class="front-page-services-description"><?php echo $services; ?></p>
    <?php endif; ?>
    <?php if($email) : ?>
      <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
    <?php endif; ?>
    </div>
  <?php endwhile; ?>
<?php endif; ?>

  <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php get_footer(); ?>