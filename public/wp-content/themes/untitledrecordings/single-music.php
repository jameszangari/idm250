<?php get_header();?>
<main class="main-content">
  <?php while (have_posts()) : the_post(); ?>
    <div class="music-posts-container">

        <div class="music-posts-content">
            <div class="music-posts-content-right">
                <h1 class="music-posts-title"><?php the_title(); ?></h1>
        
                <?php if( have_rows('tags') ): ?>
                <?php while( have_rows('tags') ): the_row(); 

                    // Get sub field values.
                    $producers = get_sub_field('producers');
                    $genre = get_sub_field('genre');
                    $style = get_sub_field('style');
                    $year = get_sub_field('year');
                    $type = get_sub_field('type');
                    //var_dump($producers);
                ?>
                <div class="music-posts-tags">
                    <div class="music-posts-tags-left">
                        <p>Producer(s)</p>
                        <p>Genre</p>
                        <p>Style</p>
                        <p>Year</p>
                        <p>Type</p>
                    </div>
                    <div class="music-posts-tags-right">
                        <p><?php echo $producers ?></p>
                        <p><?php echo $genre ?></p>
                        <p><?php echo $style ?></p>
                        <p><?php echo $year ?></p>
                        <p><?php echo $type ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

            <div class="music-posts-content-left">
                <div class="music-posts-cover-shadow"></div>
                <?php the_post_thumbnail( 'large', array( 'class' => 'music-posts-cover-image' ) );?>
            </div>

        </div>
        
        <div class="music-posts-bottom-group">
        <div class="music-posts-artists-group">
            <?php if( have_rows('artists') ): ?>
            <?php while( have_rows('artists') ): the_row(); 

                // Get sub field values.
                $profile_image = get_sub_field('profile_image');
                $name = get_sub_field('name');
                $instagram = get_sub_field('instagram');
                $twitter = get_sub_field('twitter');
                //var_dump($name);
            ?>
            <div class="music-posts-artists">
                <img src="<?php echo $profile_image["url"] ?>" alt="<?php echo $profile_image["alt"] ?>">
                <p class="music-posts-artist-name"><?php echo $name ?></p>
                <a href="<?php echo $instagram["url"] ?>" target="<?php echo $instagram["target"] ?>" class="music-posts-instagram"><//?php echo $instagram["title"] ?><i class="fab fa-instagram"></i></a>
                <a href="<?php echo $twitter["url"] ?>" target="<?php echo $twitter["target"] ?>" class="music-posts-twitter"><//?php echo $twitter["title"] ?><i class="fab fa-twitter"></i></a>
                </div>

                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <?php if( have_rows('socials') ): ?>
            <?php while( have_rows('socials') ): the_row(); 

                // Get sub field values.
                $spotify = get_sub_field('spotify');
                $apple = get_sub_field('apple');
                $amazon = get_sub_field('amazon');
                $google_play = get_sub_field('google_play');
                $soundcloud = get_sub_field('soundcloud');
                $tidal = get_sub_field('tidal');
                //var_dump($name);
            ?>
            <div class="music-posts-stream">
                <h3>Stream</h3>
                    <a href="<?php echo $spotify["url"] ?>" target="<?php echo $spotify["target"] ?>" class="music-posts-spotify"><i class="fab fa-spotify"></i></a>
                    <a href="<?php echo $apple["url"] ?>" target="<?php echo $apple["target"] ?>" class="music-posts-apple"><i class="fab fa-apple"></i></a>
                    <a href="<?php echo $amazon["url"] ?>" target="<?php echo $amazon["target"] ?>" class="music-posts-amazon"><i class="fab fa-amazon"></i></a>
                    <a href="<?php echo $google_play["url"] ?>" target="<?php echo $google_play["target"] ?>" class="music-posts-google-play"><i class="fab fa-google-play"></i></a>
                    <a href="<?php echo $soundcloud["url"] ?>" target="<?php echo $soundcloud["target"] ?>" class="music-posts-soundcloud"><i class="fab fa-soundcloud"></i></a>
                    <a href="<?php echo $tidal["url"] ?>" target="<?php echo $tidal["target"] ?>" class="music-posts-tidal"><span class="icon-tidal"></span></a>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>