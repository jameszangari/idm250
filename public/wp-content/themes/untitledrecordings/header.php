<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <?php
      $email = get_field('email', 'option');
      $instagram = get_field('instagram', 'option');
      $twitter = get_field('twitter', 'option');
      $discord = get_field('discord', 'option');
      $twitch = get_field('twitch', 'option');
      $youtube = get_field('youtube', 'option');
      $headerlogo = get_field('logo-favicon', 'option');
      $headerlogo2 = get_field('logo-full', 'option');
  ?>
  <div class="header__content">
    <a href="<?php echo get_site_url(); ?>" class="header__logo_link">
      <?php if($headerlogo) : ?>
        <img class="header__logo" src="<?php echo $headerlogo["url"]; ?>" alt="<?php echo $headerlogo2["alt"]; ?>">
      <?php endif; ?>
      <?php if($headerlogo2) : ?>
        <img src="<?php echo $headerlogo2["url"]; ?>" alt="<?php echo $headerlogo2["alt"]; ?>" class="header__logo_full"/>
      <?php endif; ?>
    </a>
    
    <button class="hamburger hamburger--3dy" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>
    
    <div class="menu-wrapper">
    <div class="search-bar">
        <form action="/" method="get">
          <input type="text" name="s" id="seachField" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Search' ); ?>" class="search-bar-input">
          <input type="submit" value="Search" class="search-bar-submit">  
        </form>
    </div>
    <div class="menu-nagivation-container">
    <?php wp_nav_menu(['theme_location' => 'primary_menu', 'container' => false]); ?>
      <div class="menu-wrapper-icons">
        <?php if($email) : ?>
          <a href="<?php echo $email["url"]; ?>" target="<?php echo $email["target"]; ?>"><i class="fas fa-envelope"></i></a>
        <?php endif; ?>
        <?php if($instagram) : ?>
          <a href="<?php echo $instagram["url"]; ?>" target="<?php echo $instagram["target"]; ?>"><i class="fab fa-instagram"></i></a>
        <?php endif; ?>
        <?php if($twitter) : ?>
          <a href="<?php echo $twitter["url"]; ?>" target="<?php echo $twitter["target"]; ?>"><i class="fab fa-twitter"></i></a>
        <?php endif; ?>
        <?php if($discord) : ?>
          <a href="<?php echo $discord["url"]; ?>" target="<?php echo $discord["target"]; ?>"><i class="fab fa-discord"></i></a>
        <?php endif; ?>
        <?php if($twitch) : ?>
          <a href="<?php echo $twitch["url"]; ?>" target="<?php echo $twitch["target"]; ?>"><i class="fab fa-twitch"></i></a>
        <?php endif; ?>
        <?php if($youtube) : ?>
          <a href="<?php echo $youtube["url"]; ?>" target="<?php echo $youtube["target"]; ?>"><i class="fab fa-youtube"></i></a>
        <?php endif; ?>
      </div>
    </div>
    </div>
  </div>
</header></a>