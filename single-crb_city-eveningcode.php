<?php
/**
 * Template Name: Inner
 */
?>

<?php get_header(); ?>
<?php //$google_map = crb_get_google_maps_api_key(); ?>

<div class="main">
	<?php
	crb_render_fragment( 'inner/intro' );
	
	crb_render_fragment( 'inner/text' );
	
	$cityID = get_the_ID();
	
	if($cityID == '522') {
		$termId = '42'; 
	} else if ($cityID == '597') {
		$termId = '73'; 
	}
   
  $args = array(
	'post_type' => 'listing',
	'posts_per_page'   => -1,
	'tax_query' => array(
		array(
		'taxonomy' => 'locations',
		'field' => 'term_id',
		'terms' => $termId
		 )
	  )
	);


   $slider_posts = new WP_Query($args);


foreach($slider_posts->posts as $postloc){
	
	$titlearr[] = $postloc->post_title;
	$address = get_post_meta( $postloc->ID, '_listing_address', true );
	$city = get_post_meta( $postloc->ID, '_listing_city', true );
	$state = get_post_meta( $postloc->ID, '_listing_state', true );
	$zip = get_post_meta( $postloc->ID, '_listing_zip', true );
	$full_location_address[] = $address . ' ' . $city .', ' . $state . ' ' . $zip;
	$full_location_address_link[] = 'https://maps.google.com/?q='.$address . ' ' . $city .', ' . $state . ' ' . $zip;
	$data_lat_lng = crb_get_lat_lng( $full_location_address );
}
?>


<?php
if($cityID == '522') {
?>
<div class="section-map-locations nashville">

<img src="/wp-content/uploads/2022/07/nashvillemap.jpg" usemap="#image-map">

<map name="image-map">
    <area target="_blank" alt="12TH &amp; ARCHER" title="12TH &amp; ARCHER" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="395,319,12" shape="circle">
    <area target="_blank" alt="BOOGIE NIGHTS &amp; GARDEN PARTY" title="BOOGIE NIGHTS &amp; GARDEN PARTY" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="460,48,13" shape="circle">
    <area target="_blank" alt="HONKY TONKS" title="HONKY TONKS" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="499,159,14" shape="circle">
    <area target="_blank" alt="HOT TUB HEAVENS" title="HOT TUB HEAVENS" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="399,282,12" shape="circle">
    <area target="_blank" alt="NASHVILLE PARTY PAD" title="NASHVILLE PARTY PAD" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="301,247,10" shape="circle">
    <area target="_blank" alt="PECAN ROWS" title="PECAN ROWS" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="307,123,14" shape="circle">
    <area target="_blank" alt="ROSÉ ALL DAY MEETS TOTALLY CLUELESS" title="ROSÉ ALL DAY MEETS TOTALLY CLUELESS" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="534,171,15" shape="circle">
    <area target="_blank" alt="SKY LOUNGE @CITY HEIGHTS" title="SKY LOUNGE @CITY HEIGHTS" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="326,247,13" shape="circle">
    <area target="_blank" alt="SPA &amp; SMORES STATION" title="SPA &amp; SMORES STATION" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="237,247,14" shape="circle">
</map>
</div>


<?php
}else if ($cityID == '597') {

?>

<div class="section-map-locations smokymountains">
<img src="/wp-content/uploads/2022/07/smoky.jpg" usemap="#image-map">

<map name="image-map">
    <area target="_blank" alt="BLUE SUEDE VIEWS" title="BLUE SUEDE VIEWS" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=smoky-mountains&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="238,197,15" shape="circle">
    <area target="_blank" alt="CHIC RETREAT" title="CHIC RETREAT" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=smoky-mountains&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="196,43,21" shape="circle">
    <area target="_blank" alt="CREEK HOLLOW" title="CREEK HOLLOW" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=smoky-mountains&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="599,120,16" shape="circle">
    <area target="_blank" alt="DOUBLE TROUBLE, TIMEOUT TAVERN, ZIP &amp; DIP CABIN" title="DOUBLE TROUBLE, TIMEOUT TAVERN, ZIP &amp; DIP CABIN" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=smoky-mountains&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="200,100,17" shape="circle">
    <area target="_blank" alt=" DREAMY VIEWS" title=" DREAMY VIEWS" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=smoky-mountains&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="169,304,18" shape="circle">
    <area target="_blank" alt="GLAMP -  Night Fever, Stairway to Heaven, Riders on the Storm, Further up the Road, Moon Dance, Lucy in the Sky, Midnight Rider, Interstellar Overdrive" title="GLAMP -  Night Fever, Stairway to Heaven, Riders on the Storm, Further up the Road, Moon Dance, Lucy in the Sky, Midnight Rider, Interstellar Overdrive" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=smoky-mountains&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="903,195,20" shape="circle">
    <area target="_blank" alt="LODGE AT DUNN's CREEK" title="LODGE AT DUNN's CREEK" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=smoky-mountains&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="867,151,16" shape="circle">
    <area target="_blank" alt="MIMOSA" title="MIMOSA" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=smoky-mountains&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="77,250,16" shape="circle">
    <area target="_blank" alt="MOONLIGHT RIDGE RETREAT" title="MOONLIGHT RIDGE RETREAT" href="/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=smoky-mountains&amp;sleeps=&amp;lowbed=0&amp;highbed=10&amp;low=0&amp;high=2500" coords="245,228,14" shape="circle">
</map>
</div>


<?php
}
?>
 
<?php

	crb_render_fragment( 'inner/text-with-image-sections' );
	
	crb_render_fragment( 'inner/features' );
	
	
	crb_render_fragment( 'inner/slider' );
	
	
	crb_render_fragment( 'inner/text-with-image-single' );
	?>
</div><!-- /.main -->

<?php get_footer('alt'); ?>