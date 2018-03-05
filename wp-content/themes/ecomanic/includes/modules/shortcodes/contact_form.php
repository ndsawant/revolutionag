<?php
ob_start() ;?>
<!--Sidebar Page-->
<div class="sidebar-page no-padd-top">
    <div class="auto-container">
      <div class="row clearfix">
            <!--Content Side-->	
            <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <!--Contact Section-->
                <section class="contact-section">
                    <div class="group-title"><h2><?php echo balanceTags($form_title);?></h2></div>
                    <div class="default-form form-container">
                        <?php echo do_shortcode(bunch_base_decode($contact_form));?>
                    </div>
                </section>
            </div>
            <!--Content Side-->
            
            <!--Sidebar-->	
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-left">
                <aside class="sidebar contact_info">
                    <div class="group-title"><h2><?php echo balanceTags($title);?></h2></div>
                    <!-- Contact Information -->
                    <div class="widget contact-info">
                        <div class="text"><?php echo balanceTags($text);?></div>
                        <ul class="info">
                            <li><strong><?php esc_html_e('Email', 'ecomanic');?></strong> <a href="mailto:<?php echo sanitize_email($email_link);?>"><?php echo balanceTags($email);?></a></li>
                            <li><strong><?php esc_html_e('Phone', 'ecomanic');?></strong> <?php echo balanceTags($phone);?></li>
                            <li><strong><?php esc_html_e('Fax', 'ecomanic');?></strong> <?php echo balanceTags($fax);?></li>
                            <li><strong><?php esc_html_e('Website', 'ecomanic');?></strong> <a href="<?php echo esc_url($web_link);?>"><?php echo balanceTags($website);?></a></li>
                        </ul>
                    </div>
                            
                </aside>
            </div>
            <!--Sidebar-->
        </div>
    </div>
</div>
    
<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   