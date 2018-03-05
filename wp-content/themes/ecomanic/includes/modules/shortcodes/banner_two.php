<?php
ob_start() ;?>
<div class="custom-column">
                	
    <!--Featured Image Box-->
    <article class="featured-image-column">
        <div class="inner-box">
            <figure class="image"><img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('Image', 'ecomanic');?>"></figure>
            <div class="overlay-box">
                <div class="overlay-inner">
                    <div class="overlay-content">
                        <h3><?php echo balanceTags($title);?></h3>
                        <h4 class="montserrat-font"><?php echo balanceTags($text);?></h4>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   