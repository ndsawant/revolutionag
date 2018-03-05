<?php  
ob_start() ;
$options = _WSH()->option();
?>
<!--Sponsors Section-->
<section class="sponsors-section">
    <div class="auto-container">
        
        <ul class="sponsors-list">
            
            <?php if($clients = ecomanic_set(ecomanic_set($options, 'clients'), 'clients')):?>
			<?php foreach($clients as $key => $value):?>
				<?php if(ecomanic_set($value, 'tocopy')) continue;?>
                <li><a href="<?php echo esc_url(ecomanic_set($value, 'client_link'));?>"><img src="<?php echo esc_url(ecomanic_set($value, 'client_img'));?>" alt="<?php esc_html_e('image', 'ecomanic');?>" title="<?php echo esc_attr(ecomanic_set($value, 'title'));?>"></a></li>
                <?php endforeach;?>
        	<?php endif;?>
            
        </ul>
        
    </div>
</section>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   