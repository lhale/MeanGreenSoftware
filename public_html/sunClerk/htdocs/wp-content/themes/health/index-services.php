<!-- Service Section -->
<?php
$mst = esc_attr(of_get_option( 'health_main_service_title' ));
$msd = esc_attr(of_get_option( 'health_main_service_desc' ));
?>
<div class="container" id="service_section">	
    <div class="hc_service_title">
        <?php if($mst!='') { ?>
        	<h1><?php echo $mst; ?></h1>
        <?php } ?>
        <?php if($msd!='') { ?>
        	<p><?php echo $msd; ?>.</p>
        <?php } ?>		
    </div>
</div>	
    
<div class="hc_home_border"></div>
<div class="container">
<?php
	$count = of_get_option( 'health_services_count', 4 );
	//
	$w = 25;
	switch ($count) {
		case 1:
			$w = 100;
			break;
		case 2:
			$w = 50;
			break;
		case 3:
			$w = 33;
			break;
	}
	//
	for( $i=1; $i<=$count; $i++) {
		?>
        <div class="hc_service_area <?php echo "sw-$w"; ?>">
        <?php
		// values
		$icon = esc_attr(of_get_option( 'health_service_icon'.$i ));
		$title = esc_attr(of_get_option( 'health_service_title'.$i ));
		$desc = esc_attr(of_get_option( 'health_service_desc'.$i ));
		$link = esc_url(of_get_option( 'health_service_link'.$i ));
		//
		if ($link):
		?>
        <a href="<?php echo $link; ?>"><i class=" fa <?php echo $icon; ?>"></i></a>
        <h2><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
        <p><?php echo $desc; ?> </p>
        <?php else: ?>
        <i class="fa <?php echo $icon; ?>"></i>
        <h2><?php echo $title; ?></h2>
        <p><?php echo $desc; ?> </p>
        <?php endif; ?>
        </div>	<!-- end hc_service_area -->	
		<?php
	}
?>
</div><!--container-->
<div class="hc_home_border"></div>
	