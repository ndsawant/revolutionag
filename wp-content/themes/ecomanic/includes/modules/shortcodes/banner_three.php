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
                        <h4 class="montserrat-font"><?php echo balanceTags($sub_title);?></h4>
                        <div class="text"><?php echo balanceTags($text);?></div>
                        <a href="<?php echo esc_url($btn_link);?>" class="theme-btn btn-style-six"><?php echo balanceTags($btn_text);?></a> &ensp; 
                        <a href="<?php echo esc_url($btn_link2);?>" class="theme-btn btn-style-five"><?php echo balanceTags($btn_text2);?></a>
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
   