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
    
    <button class="header__hamburger"><!-- <i class="fas fa-bars"></i> -->
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="23" viewBox="0 0 25 18" fill="none">
        <path d="M1 10C0.447715 10 0 9.55228 0 9C0 8.44771 0.447715 8 1 8H23.1538C23.7061 8 24.1538 8.44771 24.1538 9C24.1538 9.55228 23.7061 10 23.1538 10H1ZM1.07692 18C0.524638 18 0.0769231 17.5523 0.0769231 17C0.0769231 16.4477 0.524638 16 1.07692 16H23.1569C23.7092 16 24.1569 16.4477 24.1569 17C24.1569 17.5523 23.7092 18 23.1569 18H1.07692ZM1.07692 2C0.524638 2 0.0769231 1.55229 0.0769231 1C0.0769231 0.447716 0.524638 0 1.07692 0H23.1569C23.7092 0 24.1569 0.447716 24.1569 1C24.1569 1.55229 23.7092 2 23.1569 2H1.07692Z" fill="white"/>
      </svg>
    </button>
    <div class="menu-wrapper">
    <div class="search-bar">
        <form action="/" method="get">
          <input type="text" name="s" id="seachField" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Search' ); ?>" class="search-bar-input">
          <input type="submit" value="Search" class="search-bar-submit">  
        </form>
    </div>
    <?php wp_nav_menu(['theme_location' => 'primary_menu']);?>
      <div class="menu-wrapper-icons">
        <a href="mailto:inquiries@untitledrecordings.net" target="_blank" rel="noopener noreferrer"><i class="fas fa-envelope"></i></a>
        <a href="https://instagram.com/untitledrecordings" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
        <a href="https://twitter.com/untrecordings" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
        <a href="https://discord.gg/G5V8QG9" target="_blank" rel="noopener noreferrer"><i class="fab fa-discord"></i></a>
      </div>
    </div>
  </div>
</header></a>