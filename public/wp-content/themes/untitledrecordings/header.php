<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <script src="https://kit.fontawesome.com/080c06f1d6.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="container header__content">
    <img class="header__logo" src="https://untitledrecordings.net/media/logos/urw.png" alt="Untitled Recordings Logo">
    
    <?php wp_nav_menu(['theme_location' => 'primary_menu']);?>
  </div>
</header>