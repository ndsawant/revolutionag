<?php
ob_start() ;?>
<!--Default Section-->
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Column-->
            <div class="column image-column col-md-5 col-sm-12 col-xs-12">
                
                <br>
                <figure class="image text-left no-margin-top"><img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('Image', 'ecomanic');?>"></figure>
                
            </div>
            
            <!--Column-->
            <div class="column text-column col-md-7 col-sm-12 col-xs-12">
                <br><br>
                <div class="sec-title text-right">
                    <div class="theme-text-green"><?php echo balanceTags($sub_title);?></div>
                    <h2><?php echo balanceTags($title);?></h2>
                </div>
                <div class="text text-right"><p><?php echo balanceTags($text);?></p></div>
                
                <ul class="styled-list-one">
                    <?php $fearures = explode("\n",$feature_str);?>
						<?php foreach($fearures as $feature):?>
                            <li><?php echo balanceTags($feature);?></li>
                        <?php endforeach;?>
                </ul>
                
                <div class="text-right"><a class="theme-btn btn-style-one" href="<?php echo esc_url($btn_link);?>">More About Us</a> &ensp; <a class="theme-btn btn-style-two" href="<?php echo esc_url($btn_link2);?>"><?php echo balanceTags($btn_text2);?></a></div>
                
            </div>
            
        </div>
    </div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   