<?php   
ob_start();
?>
<!--Sidebar Page-->
<div class="sidebar-page no-padd-top no-pad-bot">
    <div class="auto-container">
		<!-- Location Map -->
		<div class="our-location-map" id="map-location">&ensp;</div>
	</div>
</div>

<script type="text/javascript">
	// Google Map Settings
	if(jQuery('#map-location').length){
		var map;
		 map = new GMaps({
			el: '#map-location',
			zoom: 14,
			scrollwheel:false,
			//Set Latitude and Longitude Here
			lat: <?php echo esc_js($lat);?>,
			lng: <?php echo esc_js($long);?>
		  });
		  
		  //Add map Marker
		  map.addMarker({
			lat: <?php echo esc_js($mark_lat);?>,
			lng: <?php echo esc_js($mark_long);?>,
			infoWindow: {
			  content: '<p class="info-outer" style="text-align:center;"><strong><?php echo esc_js($mark_title);?></strong><br><?php echo esc_js($mark_address);?></p>'
			}
		 
		});
	}
		
</script>
<?php return ob_get_clean();?>		