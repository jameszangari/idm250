<?php get_header();?>
<main class="main-content-front">
  <?php while (have_posts()) : the_post(); ?>

    <div class="front-page-landing">
    <?php if( have_rows('landing') ): ?>
    <?php while( have_rows('landing') ): the_row(); 

        // Get sub field values.
        $landing_logo = get_sub_field('landing_logo');
        $landing_arrow = get_sub_field('landing_arrow');

        ?>
        <img src="<?php echo esc_url( $landing_logo['url'] ); ?>" alt="<?php echo esc_attr( $landing_logo['alt'] ); ?>" class="front-page-landing-logo"/>
        <img src="<?php echo get_field('logo-favicon', 'option')["url"]; ?>" alt="<?php echo get_field('logo-full', 'option')["alt"]; ?>" class="front-page-landing-logo-favicon"/>
        <a href="#artists"><img src="<?php echo esc_url( $landing_arrow['url'] ); ?>" alt="<?php echo esc_attr( $landing_arrow['alt'] ); ?>" class="front-page-landing-arrow" /></a>
    <?php endwhile; ?>
    <?php endif; ?>
    </div>

    <div class="front-page-artists" id="artists">
    <?php if( have_rows('artists') ): ?>
        <?php while( have_rows('artists') ): the_row(); 

        // Get sub field values.
        $profile_image = get_sub_field('profile_image');
        $artist_name = get_sub_field('artist_name');
        $artist_role = get_sub_field('artist_role');
        $instagram = get_sub_field('instagram');
        $twitter = get_sub_field('twitter');
        $soundcloud = get_sub_field('soundcloud');
        $email = get_sub_field('email');
        //var_dump($email);
        ?>
        <?php if ($profile_image) : ?>
          <div class="front-page-artist">
            <img src="<?php echo $profile_image["url"] ?>" alt="<?php echo $profile_image["alt"] ?>">
            <h3><?php echo $artist_name ?></h3>
            <hr class="front-page-artist-line">
            <h4><?php echo $artist_role ?></h4>
            <div class="front-page-artist-socials">
              <a href="<?php echo $instagram["url"] ?>" target="<?php echo $instagram["target"] ?>" class="artist-socials-instagram"><i class="fab fa-instagram"></i></a>
              <a href="<?php echo $twitter["url"] ?>" target="<?php echo $twitter["target"] ?>" class="artist-socials-twitter"><i class="fab fa-twitter"></i></a>
              <a href="<?php echo $soundcloud["url"] ?>" target="<?php echo $soundcloud["target"] ?>" class="artist-socials-soundcloud"><i class="fab fa-soundcloud"></i></a>
              <a href="<?php echo $email['url'] ?>" target="<?php echo $email["target"] ?>" class="artist-socials-email"><i class="fas fa-envelope"></i></a>
            </div>
          </div>
          <?php endif; ?>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
  
    <div class="page-builder">
      <?php the_content(); ?>
    </div>
    <?php the_tags(); ?>

  <?php endwhile; ?>
</main>
<?php get_footer(); ?>