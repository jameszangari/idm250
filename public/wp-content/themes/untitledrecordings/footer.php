<footer>
    <div class="footer">
    <?php
        $email = get_field('email', 'option');
        $instagram = get_field('instagram', 'option');
        $twitter = get_field('twitter', 'option');
        $discord = get_field('discord', 'option');
        $twitch = get_field('twitch', 'option');
        $youtube = get_field('youtube', 'option');
        $footerlogo = get_field('logo-full', 'option');
        $cpytxt = get_field('Copyright', 'option');
        $cpylink = get_field('Copyright_link', 'option');
    ?>
        <div class="footer-menu-icons">
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
        <?php if($footerlogo) : ?>
            <a href="<?php echo get_site_url(); ?>" class="footer-logo"><img src="<?php echo $footerlogo["url"]; ?>" alt="<?php echo $footerlogo["alt"]; ?>"></a>
        <?php endif; ?>
        <?php if($cpytxt) : ?>
            <p><?php echo $cpytxt ?>
            <?php if($cpylink) : ?>
            <a href="<?php echo $cpylink["url"]; ?>" class="footer-link" target="<?php echo $cpylink["target"]; ?>"><?php echo $cpylink["title"]; ?></a>
        <?php endif; ?>
            </p>
        <?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>