    
    <footer>
        <div class="copy">
            <?php echo get_theme_option('footer'); ?>
        </div>
        <div class="logos">
            <a href="http://chnm.gmu.edu"><img src="<?php echo img('rrchnm_logo.png'); ?>"></a>
            <a href="http://neh.gov"><img src="<?php echo img('neh_logo.png'); ?>"></a>
        </div>
        <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
    </footer>

</body>

</html>