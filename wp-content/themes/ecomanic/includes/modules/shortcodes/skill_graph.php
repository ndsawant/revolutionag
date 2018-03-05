<?php ob_start(); ?>
<!--Skill Box-->
<div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
    <div class="box-title"><?php echo balanceTags($title);?></div>
    <div class="inner">
        <div class="bar">
            <div class="bar-innner"><div class="bar-fill" data-percent="<?php echo balanceTags($num);?>"></div></div>
        </div>
        <div class="percent"></div>
    </div>
</div>


<?php return ob_get_clean(); 