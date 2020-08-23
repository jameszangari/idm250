<footer>
    <div class="footer">
        <div class="footer-menu-icons">
            <a href="<?php echo get_field('Email', 'option')["url"]; ?>" target="<?php echo get_field('Email', 'option')["target"]; ?>"><i class="fas fa-envelope"></i></a>
            <a href="<?php echo get_field('Instagram', 'option')["url"]; ?>" target="<?php echo get_field('Instagram', 'option')["target"]; ?>"><i class="fab fa-instagram"></i></a>
            <a href="<?php echo get_field('Twitter', 'option')["url"]; ?>" target="<?php echo get_field('Twitter', 'option')["target"]; ?>"><i class="fab fa-twitter"></i></a>
            <a href="<?php echo get_field('Discord', 'option')["url"]; ?>" target="<?php echo get_field('Discord', 'option')["target"]; ?>"><i class="fab fa-discord"></i></a>
        </div>
        <a href="<?php echo get_site_url(); ?>" class="footer-logo"><img src="<?php echo get_field('logo-full', 'option')["url"]; ?>" alt="<?php echo get_field('logo-full', 'option')["alt"]; ?>"></a>
        <p>© 2020 Untitled Recordings | Website by <a href="https://jamescliff.com" class="footer-link" target="_blank" rel="noopener noreferrer">James Cliff</a></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>