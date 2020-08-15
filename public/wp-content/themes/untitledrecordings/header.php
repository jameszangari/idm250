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
  <div class="header__container header__content">
    <a href="<?php echo get_site_url(); ?>" class="header__logo_link"><img class="header__logo" src="<?php echo get_field('logo-favicon', 'option')["url"]; ?>" alt="<?php echo get_field('logo-full', 'option')["alt"]; ?>"></a>
    
    <button class="header__hamburger"><i class="fas fa-bars"></i></button>
    <div class="menu-wrapper"><?php wp_nav_menu(['theme_location' => 'primary_menu']);?>
      <div class="menu-wrapper-icons">
        <a href="https://instagram.com/untitledrecordings"><i class="fab fa-instagram"></i></a>
        <a href="https://twitter.com/untrecordings"><i class="fab fa-twitter"></i></a>
        <a href="https://discord.gg/G5V8QG9"><i class="fab fa-discord"></i></a>
      </div>
    </div>
  </div>
</header></a>