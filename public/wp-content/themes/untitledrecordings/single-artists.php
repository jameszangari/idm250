<?php get_header();?>
<main class="main-content">
  <div class="artist-intro-content">
    <div class="artist-intro-content-left">
    <?php while (have_posts()) : the_post(); ?>
    <h1 class="artist-title"><?php the_title(); ?></h1>

    <?php $roles = get_field('roles'); ?>
    <?php if ($roles) : ?>
        <p class="artist-roles-title"><?php echo $roles ?></p>
    <?php endif; ?>

    <?php if( have_rows('socials') ): ?>
        <?php while( have_rows('socials') ): the_row(); 

        // Get sub field values.
        $instagram = get_sub_field('instagram');
        $twitter = get_sub_field('twitter');
        $soundcloud = get_sub_field('soundcloud');
        $email = get_sub_field('email');
        //var_dump($email);
    ?>

    <?php if ($instagram) : ?>
        <div class="artist-social-media">
            <a href="<?php echo $instagram["url"] ?>" target="<?php echo $instagram["target"] ?>" class="artist-socials-instagram"><//?php echo $instagram["title"] ?><i class="fab fa-instagram"></i></a>
            <a href="<?php echo $twitter["url"] ?>" target="<?php echo $twitter["target"] ?>" class="artist-socials-twitter"><//?php echo $twitter["title"] ?><i class="fab fa-twitter"></i></a>
            <a href="<?php echo $soundcloud["url"] ?>" target="<?php echo $soundcloud["target"] ?>" class="artist-socials-soundcloud"><//?php echo $soundcloud["title"] ?><i class="fab fa-soundcloud"></i></a>
            <a href="mailto:<?php echo $email ?>" target="_blank noopener noreferrer" class="artist-socials-email"><//?php echo $email["title"] ?><i class="fas fa-envelope"></i></a>
        </div>
    <?php endif; ?>

    <?php endwhile; ?>
  <?php endif; ?>
  </div>

  <div class="artist-intro-content-right">
        <div class="artist-profile-image-shadow"></div>
        <?php the_post_thumbnail( 'large', array( 'class' => 'artist-profile-image' ) );?>
  </div>
</div>

    <div class="container">
      <div class="page-builder">
        <?php the_content(); ?>
      </div>
    </div>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>