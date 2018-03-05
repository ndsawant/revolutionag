<?php ob_start(); ?>
<!--Column-->
<article class="col-md-3 col-sm-6 col-xs-12 column wow fadeIn" data-wow-duration="0ms">
    <div class="icon"><span class="flaticon-padlock21"></span></div>
    <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="<?php echo balanceTags($num_stop);?>"><?php echo balanceTags($num);?></span></div>
    <div class="counter-title"><?php echo balanceTags($text);?></div>
</article>

<?php return ob_get_clean(); 