<?php
ob_start() ;?>
<!--Featured Image Box-->
<article class="featured-image-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
    <div class="inner-box text-center">
        <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('Image', 'ecomanic');?>"></figure>
        <div class="overlay-box">
            <div class="overlay-inner">
                <div class="overlay-content">
                    <h3><?php echo balanceTags($sub_title);?></h3>
                    <h4><?php echo balanceTags($title);?></h4>
                </div>
            </div>
        </div>
    </div>
</article>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   