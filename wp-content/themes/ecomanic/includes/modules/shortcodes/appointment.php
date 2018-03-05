<?php
ob_start() ;?>
<!--Fluid Section-->
<section class="fluid-section">
    <div class="outer-box clearfix">
        
        <!--Featured Fluid Column-->
        <div class="column featured-fluid-col">
            <div class="inner-box text-center">
                <div class="title-style-one"><h2><?php echo balanceTags($title);?></h2></div>
                <div class="text"><?php echo balanceTags($text);?></div>
                <figure class="image-box"><img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('Image', 'ecomanic');?>"></figure>
            </div>
        </div>
        
        <!--Featured Form Column-->
        <div class="column featured-form-col">
            <div class="inner-box">
                <div class="title-style-one text-center"><h2><?php echo balanceTags($title2);?></h2></div>
                <div class="text text-center"><?php echo balanceTags($text2);?></div>
                
                <div class="appointment-form">
                    <?php echo do_shortcode(bunch_base_decode($appointment_form));?>
                    
                    <div class="separator"></div>
                    <ul class="info-box text-center"><li><?php echo balanceTags($street_address);?></li> <li><?php echo balanceTags($address);?></li> <li><?php esc_html_e('Phone:', 'ecomanic');?> <?php echo balanceTags($phone);?></li></ul>
                </div>
                
            </div>
        </div>
        
    </div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   