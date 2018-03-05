<?php ob_start(); ?>

<div class="column text-column">
                
    <h2 class="default-title text-uppercase"><?php echo balanceTags($title);?></h2>
    
    <!--Progress Levels-->
    <div class="progress-levels medium-size">
        <?php echo do_shortcode( $contents );?>
    </div>
        
</div>

<?php return ob_get_clean(); ?>