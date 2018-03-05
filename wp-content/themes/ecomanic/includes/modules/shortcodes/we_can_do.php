<?php
ob_start() ;?>
<!--Column-->
<div class="column text-column">
    
    <div class="sec-title">
        <div class="theme-subtitle"><?php echo balanceTags($sub_title);?></div>
        <h2><?php echo balanceTags($title);?></h2>
    </div>
    
    
    <div class="text">
        <p><?php echo balanceTags($text);?></p>
    </div>
</div>

<?php
	$output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>
   