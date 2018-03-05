<?php $options = get_option('wp_ecomanic'.'_theme_options');?>
	<?php if(!(ecomanic_set($options, 'hide_whole_footer'))):?>
	<!--Main Footer-->
    <footer class="main-footer">
    	<?php if(!(ecomanic_set($options, 'hide_upper_footer'))):?>
        <!--Footer Upper-->        
        <div class="footer-upper">
            
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
                <div class="auto-container">
                    <div class="row clearfix">
                        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                    </div>
                </div>
            <?php } ?>   	
        
        </div>
        <?php endif;?>
        
        <!--Footer Bottom-->
    	<?php if(!(ecomanic_set($options, 'hide_bottom_footer'))):?>
        <div class="footer-bottom">
            <div class="auto-container">
                
                <div class="bottom-links">
                	<ul class="clearfix">
                    	<!--<?php if(ecomanic_set($options, 'footer_address')):?><li><?php echo balanceTags(ecomanic_set($options, 'footer_address'));?></li><?php endif;?>
                        <?php if(ecomanic_set($options, 'street_address')):?><li><?php echo balanceTags(ecomanic_set($options, 'street_address'));?></li><?php endif;?>-->
                        <?php if(ecomanic_set($options, 'footer_phone')):?><li><?php esc_html_e('Phone:', 'ecomanic');?> <?php echo balanceTags(ecomanic_set($options, 'footer_phone'));?></li><?php endif;?>
                        <?php if(ecomanic_set($options, 'footer_logo')):?><li class="logo"><img src="<?php echo esc_url(ecomanic_set($options, 'footer_logo'));?>" alt="<?php esc_html_e('Logo', 'ecomanic');?>"></li><?php endif;?>
                        <?php if(ecomanic_set($options, 'footer_email')):?><li><?php esc_html_e('E-mail:', 'ecomanic');?> <?php echo sanitize_email(ecomanic_set($options, 'footer_email'));?></li><?php endif;?>
                    </ul>
                </div>
                <?php if ( is_active_sidebar( 'copyright' ) ) { ?>
                    <div class="copyright">
                        <!-- <p>© 2016 RevolutionAG Pty Ltd.</p> -->
                        <?php dynamic_sidebar( 'copyright' ); ?>
                    </div>
                <?php } ?>      
            </div>
        </div>
        <?php endif;?>
        
    </footer>
    <?php endif;?>
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-arrow-up"></span></div>



<script>
    jQuery(document).ready(function($){
        $.doTimeout(2500, function(){
            $('.repeat.go').removeClass('go');

            return true;
        });
        $.doTimeout(2520, function(){
            $('.repeat').addClass('go');
            return true;
        });
        
    });

</script>

<script>
jQuery(document).ready(function($) {
    $('img[usemap]').rwdImageMaps();
});
</script>
<?php wp_footer(); ?>
</body>
</html>