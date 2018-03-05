<?php
ob_start() ;?>
<!--Default Section-->
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Column-->
            <div class="column text-column no-margin-bottom col-md-7 col-sm-12 col-xs-12">
                <div class="sec-title">
                    <h2><?php echo balanceTags($title);?></h2>
                </div>
                <div class="text"><p><?php echo balanceTags($text);?></p></div>
                
                <ul class="styled-list-one">
                    <?php $fearures = explode("\n",$feature_str);?>
						<?php foreach($fearures as $feature):?>
                            <li><?php echo balanceTags($feature);?></li>
                        <?php endforeach;?>
                </ul>
                
            </div>
            
            <!--Column-->
            <div class="column image-column col-md-5 col-sm-12 col-xs-12 clearfix">
                
                <figure class="image hanged-image text-right"><img src="<?php echo esc_url(wp_get_attachment_url($img, 'full'));?>" alt="<?php esc_html_e('Image', 'ecomanic');?>"></figure>
                
            </div>
            
        </div>
    </div>
</section> 

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   