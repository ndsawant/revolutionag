<?php ob_start(); ?>
<!--Fact Counter-->
<section class="fact-counter-two fact-counter" style="background-image:url('<?php echo wp_get_attachment_url($bg_img, 'full');?>');">
    <div class="auto-container">
        
        <div class="row clearfix">
            <?php echo do_shortcode( $contents );?>
        </div>
    </div>
</section>

<?php return ob_get_clean(); ?>