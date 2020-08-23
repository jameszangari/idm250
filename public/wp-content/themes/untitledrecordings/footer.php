<footer>
    <div class="footer">
        <div class="footer-menu-icons">
            <a href="<?php echo get_field('Email', 'option')["url"]; ?>" target="<?php echo get_field('Email', 'option')["target"]; ?>"><i class="fas fa-envelope"></i></a>
            <a href="<?php echo get_field('Instagram', 'option')["url"]; ?>" target="<?php echo get_field('Instagram', 'option')["target"]; ?>"><i class="fab fa-instagram"></i></a>
            <a href="<?php echo get_field('Twitter', 'option')["url"]; ?>" target="<?php echo get_field('Twitter', 'option')["target"]; ?>"><i class="fab fa-twitter"></i></a>
            <a href="<?php echo get_field('Discord', 'option')["url"]; ?>" target="<?php echo get_field('Discord', 'option')["target"]; ?>"><i class="fab fa-discord"></i></a>
        </div>
        <a href="<?php echo get_site_url(); ?>" class="footer-logo"><img src="<?php echo get_field('logo-full', 'option')["url"]; ?>" alt="<?php echo get_field('logo-full', 'option')["alt"]; ?>"></a>
        <p><?php echo get_field('Copyright', 'option') ?><a href="<?php echo get_field('Copyright_link', 'option')["url"]; ?>" class="footer-link" target="<?php echo get_field('Copyright_link', 'option')["target"]; ?>"><?php echo get_field('Copyright_link', 'option')["title"]; ?></a></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>