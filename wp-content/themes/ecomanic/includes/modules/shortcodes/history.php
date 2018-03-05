<?php
ob_start() ;?>
<!--Default Section-->
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Column-->
            <div class="column text-column col-md-6 col-sm-12 col-xs-12">
                <div class="sec-title">
                    <div class="theme-text-green"><?php echo balanceTags($sub_title);?></div>
                    <h2><?php echo balanceTags($title);?></h2>
                </div>
                <div class="text">
                	<?php echo balanceTags($contents);?>
                </div>
                
                
                <a class="theme-btn btn-style-one" href="<?php echo esc_url($btn_link);?>"><?php echo balanceTags($btn_text);?></a> &ensp; <a class="theme-btn btn-style-two" href="<?php echo esc_url($btn_link2);?>"><?php echo balanceTags($btn_text2);?></a>
                
            </div>
            
            <!--Column-->
            <div class="column image-column col-md-6 col-sm-12 col-xs-12 clearfix">
                
                <figure class="image text-right with-offset pull-right"><img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('Image', 'ecomanic');?>"></figure>
                
            </div>
            
        </div>
    </div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   