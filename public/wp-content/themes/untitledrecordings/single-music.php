<?php get_header();?>
<main class="main-content">
<?php while (have_posts()) : the_post(); ?>
    <div class="music-posts-container">

    <div class="music-posts-content">
        <div class="music-posts-content-right">
        <h1 class="music-posts-title"><?php the_title(); ?></h1>
        <div class="music-posts-tags-group">

            <?php if (get_field('artists')) : ?>
            <div class="music-posts-tags-row">
                <p class="column-1">Artist(s)</p>
                <p class="column-2">
                <?php
                    $artists = get_field('artists');
                    $total = count($artists);

                    foreach ($artists as $key => $artist) {
                ?>
                <a href="<?php echo get_permalink( $artist->ID ) ;?>">
                <?php echo $key + 1 != $total ? $artist->post_title . ', ' : $artist->post_title  ;?>
                </a>
                <?php } ?>
                </p>
            </div>
            <?php endif; ?>

            <?php if (get_field('featured-artists')) : ?>
            <div class="music-posts-tags-row">
                <p class="column-1">Featured Artist(s)</p>
                <p class="column-2">
                <?php
                    $feat_artists = get_field('featured-artists');
                    $total = count($feat_artists);

                    foreach ($feat_artists as $key => $feat_artist) {
                ?>
                <a href="<?php echo get_permalink( $feat_artist->ID ) ;?>">
                <?php echo $key + 1 != $total ? $feat_artist->post_title . ', ' : $feat_artist->post_title  ;?>
                </a>
                <?php } ?>
                </p>
            </div>
            <?php endif; ?>

            <?php if (get_field('producers')) : ?>
            <div class="music-posts-tags-row">
                <p class="column-1">Producer(s)</p>
                <p class="column-2">
                <?php
                    $producers = get_field('producers');
                    $total = count($producers);

                    foreach ($producers as $key => $producer) {
                ?>
                <a href="<?php echo get_permalink( $producer->ID ) ;?>">
                <?php echo $key + 1 != $total ? $producer->post_title . ', ' : $producer->post_title  ;?>
                </a>
                <?php } ?>
                </p>
            </div>
            <?php endif; ?>

            <?php if (get_field('engineers')) : ?>
            <div class="music-posts-tags-row">
                <p class="column-1">Engineer(s)</p>
                <p class="column-2">
                <?php
                    $engineers = get_field('engineers');
                    $total = count($engineers);

                    foreach ($engineers as $key => $engineer) {
                ?>
                <a href="<?php echo get_permalink( $engineer->ID ) ;?>">
                <?php echo $key + 1 != $total ? $engineer->post_title . ', ' : $engineer->post_title  ;?>
                </a>
                <?php } ?>
                </p>
            </div>
            <?php endif; ?>

            <div class="music-posts-tags-row">
                <p class="column-1">Genre</p>
                <p class="column-2">
                    <?php
                        $id = get_the_ID();
                        $genre_list = get_the_terms( $id, 'music_genre' );
                    ?>
            <?php if ($genre_list) : ?>
                <?php foreach ($genre_list as $genre): ?>
                    <?php
                    // Get sub field values.
                    $name = $genre->name;
                    $link = get_term_link($genre->term_id);
                    //var_dump($link);
                    ?>  
                <a href="<?php echo $link ;?>"><?php echo $genre->name; ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
            </p>
            </div>

            <div class="music-posts-tags-row">
                <p class="column-1">Style</p>
                <p class="column-2">
                    <?php
                        $id = get_the_ID();
                        $style_list = get_the_terms( $id, 'music_style' );
                        $total = count($style_list);
                    ?>
            <?php if ($style_list) : ?>
                <?php foreach ($style_list as $key => $style){ ?>
                    <?php
                    // Get sub field values.
                    $name = $style->name;
                    $link = get_term_link($style->term_id);
                    //var_dump($link);
                    ?>  
                <a href="<?php echo $link ;?>">
                <?php echo $key + 1 != $total ? $style->name . ', ' : $style->name  ;?>
                </a>
                <?php } ?>
            <?php endif; ?>
            </p>
            </div>

            <div class="music-posts-tags-row">
                <p class="column-1">Year</p>
                <p class="column-2">
                    <?php
                        $id = get_the_ID();
                        $year_list = get_the_terms( $id, 'music_year' );
                    ?>
            <?php if ($year_list) : ?>
                <?php foreach ($year_list as $year): ?>
                    <?php
                    // Get sub field values.
                    $name = $year->name;
                    $link = get_term_link($year->term_id);
                    //var_dump($link);
                    ?>  
                <a href="<?php echo $link ;?>"><?php echo $year->name; ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
            </p>
            </div>

            <div class="music-posts-tags-row">
                <p class="column-1">Type</p>
                <p class="column-2">
                    <?php
                        $id = get_the_ID();
                        $type_list = get_the_terms( $id, 'music_type' );
                    ?>
            <?php if ($type_list) : ?>
                <?php foreach ($type_list as $type): ?>
                    <?php
                    // Get sub field values.
                    $name = $type->name;
                    $link = get_term_link($type->term_id);
                    //var_dump($link);
                    ?>  
                <a href="<?php echo $link ;?>"><?php echo $type->name; ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
            </p>
            </div>
        </div>
    </div>


    <div class="music-posts-content-left">
        <div class="music-posts-cover-shadow js-fillcolor">
        <?php the_post_thumbnail( 'large', array( 'class' => 'music-posts-cover-image' ) );?>
        </div>
    </div>

    </div>
    
    <?php //ARTISTS GROUP ?>
    <div class="music-posts-bottom-group">    
        <div class="music-posts-artists-group">
        <?php foreach (get_field('producers') as $artist): ?>
        <?php
            // Get sub field values.
            $profile_image = get_field('profile_image', $artist->ID);
            $name = $artist->post_title;
            $instagram = get_field('instagram', $artist->ID);
            $twitter = get_field('twitter', $artist->ID);
            $link = $artist->guid;
        ?>
        <div class="music-posts-artists">
            <?php if($profile_image) : ?>
                <a href="<?php echo $link; ?>"><img src="<?php echo $profile_image["url"] ?>" alt="<?php echo $profile_image["alt"] ?>"></a>
            <?php endif; ?>
            <?php if($name) : ?>
                <p class="music-posts-artist-name"><?php echo $name ?></p>
            <?php endif; ?>
            <?php if($instagram) : ?>
                <a href="<?php echo $instagram["url"] ?>" target="<?php echo $instagram["target"] ?>" class="music-posts-instagram"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>
            <?php if($twitter) : ?>
                <a href="<?php echo $twitter["url"] ?>" target="<?php echo $twitter["target"] ?>" class="music-posts-twitter"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        </div>

    <?php //TRACKLISTING ?>
    <?php if( have_rows('tracklist') ): ?>
    <div class="music-posts-tracklist-group">
        <h3 class="music-posts-tracklist-title">Tracklist</h3>
        <?php $counter = 1; ?>
        <?php while( have_rows('tracklist') ): the_row(); 
            // Get sub field values.
            $title = get_sub_field('title');
            $time = get_sub_field('time');
        ?>  
        <?php if($title) : ?>
        <div class="music-posts-tracklist">
            <p class="music-posts-tracklist-numbers"><?php echo $counter; ?></p>
            <p><?php echo $title ?></p>
            <p class="music-posts-tracklist-time"><?php echo $time ?></p>
        </div>
        <?php endif; ?> 
        <?php $counter++; ?>  
        <?php endwhile; ?>
        </div>    
        <?php endif; ?>      
        
        <?php //STREAM LINKS ?>
        <?php if( have_rows('socials') ): ?>
        <?php while( have_rows('socials') ): the_row(); 
            // Get sub field values.
            $spotify = get_sub_field('spotify');
            $apple = get_sub_field('apple');
            $amazon = get_sub_field('amazon');
            $google_play = get_sub_field('google_play');
            $soundcloud = get_sub_field('soundcloud');
            $tidal = get_sub_field('tidal');
            $youtube = get_sub_field('youtube');
        ?>
        <div class="music-posts-stream-group">
        <h3>Stream</h3>
        <div class="music-posts-stream">
            <?php if ($spotify) : ?>
                <a href="<?php echo $spotify["url"] ?>" target="<?php echo $spotify["target"] ?>" class="music-posts-spotify"><i class="fab fa-spotify"></i></a>
            <?php endif; ?>
            <?php if ($apple) : ?>
                <a href="<?php echo $apple["url"] ?>" target="<?php echo $apple["target"] ?>" class="music-posts-apple"><i class="fab fa-apple"></i></a>
            <?php endif; ?>
            <?php if ($amazon) : ?>
                <a href="<?php echo $amazon["url"] ?>" target="<?php echo $amazon["target"] ?>" class="music-posts-amazon"><i class="fab fa-amazon"></i></a>
            <?php endif; ?>
            <?php if ($google_play) : ?>
                <a href="<?php echo $google_play["url"] ?>" target="<?php echo $google_play["target"] ?>" class="music-posts-google-play"><i class="fab fa-google-play"></i></a>
            <?php endif; ?>
            <?php if ($soundcloud) : ?>    
                <a href="<?php echo $soundcloud["url"] ?>" target="<?php echo $soundcloud["target"] ?>" class="music-posts-soundcloud"><i class="fab fa-soundcloud"></i></a>          
            <?php endif; ?>
            <?php if ($tidal) : ?>
                <a href="<?php echo $tidal["url"] ?>" target="<?php echo $tidal["target"] ?>" class="music-posts-tidal"><svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 24 24" width="44px" height="44px"><path d="M 4 5 L 0 9 L 4 13 L 8 9 L 4 5 z M 8 9 L 12 13 L 16 9 L 12 5 L 8 9 z M 16 9 L 20 13 L 24 9 L 20 5 L 16 9 z M 12 13 L 8 17 L 12 21 L 16 17 L 12 13 z"/></svg></a>
            <?php endif; ?>
            <?php if ($youtube) : ?>    
                <a href="<?php echo $youtube["url"] ?>" target="<?php echo $youtube["target"] ?>" class="music-posts-youtube"><i class="fab fa-youtube"></i></a>          
            <?php endif; ?>
        <?php endwhile; ?>
        </div>
        <?php endif; ?>
        </div>
    </div>
    </div>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>