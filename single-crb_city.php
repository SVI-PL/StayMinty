<?php
/**
 * Template Name: Inner
 */
?>

<?php get_header(); ?>
<?php $google_map = crb_get_google_maps_api_key();
//global $post;
//echo "page->".$post->ID;
//postid-6585
//echo "here" . $_SERVER[REQUEST_URI];

 ?>
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




<!--<div class="section-map-locations nashville">

<img src="https://stayminty.com/wp-content/uploads/2022/07/nashvillemap.jpg" usemap="#image-map">

<map name="image-map">
    <area target="_blank" alt="BOOGIE NIGHTS &amp; GARDEN PARTY" title="BOOGIE NIGHTS &amp; GARDEN PARTY" href="https://stayminty.com/?s=&amp;amp;post_type=listing&amp;amp;checkin=&amp;amp;checkout=&amp;amp;locations=nashville&amp;amp;sleeps=&amp;amp;lowbed=0&amp;amp;highbed=16&amp;amp;low=0&amp;amp;high=2500" coords="459,49,16" shape="circle">
    <area target="_blank" alt="PECAN ROWS" title="PECAN ROWS" href="https://stayminty.com/?s=&amp;amp;post_type=listing&amp;amp;checkin=&amp;amp;checkout=&amp;amp;locations=nashville&amp;amp;sleeps=&amp;amp;lowbed=0&amp;amp;highbed=16&amp;amp;low=0&amp;amp;high=2500" coords="310,122,14" shape="circle">
    <area target="_blank" alt="HONKY TONKS" title="HONKY TONKS" href="https://stayminty.com/?s=&amp;amp;post_type=listing&amp;amp;checkin=&amp;amp;checkout=&amp;amp;locations=nashville&amp;amp;sleeps=&amp;amp;lowbed=0&amp;amp;highbed=16&amp;amp;low=0&amp;amp;high=2500" coords="499,159,14" shape="circle">
    <area target="_blank" alt="ROSE ALL DAY MEETS TOTALLY CLUELESS" title="ROSE ALL DAY MEETS TOTALLY CLUELESS" href="https://stayminty.com/?s=&amp;amp;post_type=listing&amp;amp;checkin=&amp;amp;checkout=&amp;amp;locations=nashville&amp;amp;sleeps=&amp;amp;lowbed=0&amp;amp;highbed=16&amp;amp;low=0&amp;amp;high=2500" coords="535,167,16" shape="circle">
    <area target="_blank" alt="SPA &amp; SMORES STATION" title="SPA &amp; SMORES STATION" href="https://stayminty.com/?s=&amp;amp;post_type=listing&amp;amp;checkin=&amp;amp;checkout=&amp;amp;locations=nashville&amp;amp;sleeps=&amp;amp;lowbed=0&amp;amp;highbed=16&amp;amp;low=0&amp;amp;high=2500" coords="239,248,14" shape="circle">
    <area target="_blank" alt="NASHVILLE PARTY PAD" title="NASHVILLE PARTY PAD" href="https://stayminty.com/?s=&amp;amp;post_type=listing&amp;amp;checkin=&amp;amp;checkout=&amp;amp;locations=nashville&amp;amp;sleeps=&amp;amp;lowbed=0&amp;amp;highbed=16&amp;amp;low=0&amp;amp;high=2500" coords="300,247,12" shape="circle">
    <area target="_blank" alt="SKY LOUNGE @CITY HEIGHTS" title="SKY LOUNGE @CITY HEIGHTS" href="https://stayminty.com/?s=&amp;amp;post_type=listing&amp;amp;checkin=&amp;amp;checkout=&amp;amp;locations=nashville&amp;amp;sleeps=&amp;amp;lowbed=0&amp;amp;highbed=16&amp;amp;low=0&amp;amp;high=2500" coords="327,248,13" shape="circle">
    <area target="_blank" alt="HOT TUB HEAVENS" title="HOT TUB HEAVENS" href="https://stayminty.com/?s=&amp;amp;post_type=listing&amp;amp;checkin=&amp;amp;checkout=&amp;amp;locations=nashville&amp;amp;sleeps=&amp;amp;lowbed=0&amp;amp;highbed=16&amp;amp;low=0&amp;amp;high=2500" coords="399,283,16" shape="circle">
    <area target="_blank" alt="12TH &amp; ARCHER" title="12TH &amp; ARCHER" href="https://stayminty.com/?s=&amp;amp;post_type=listing&amp;amp;checkin=&amp;amp;checkout=&amp;amp;locations=nashville&amp;amp;sleeps=&amp;amp;lowbed=0&amp;amp;highbed=16&amp;amp;low=0&amp;amp;high=2500" coords="397,317,14" shape="circle">
</map>
</div>

<div class="section-map-locations nashville">

<img src="https://stayminty.com/wp-content/uploads/2022/07/N1000.jpg" usemap="#image-map">

<map name="image-map">
    <area target="_blank" alt="BOOGIE NIGHTS &amp; GARDEN PARTY" title="BOOGIE NIGHTS &amp; GARDEN PARTY" href="https://stayminty.com/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=16&amp;low=0&amp;high=2500" coords="600,136,18" shape="circle">
    <area target="_blank" alt="PECAN ROWS" title="PECAN ROWS" href="https://stayminty.com/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=16&amp;low=0&amp;high=2500" coords="400,232,20" shape="circle">
    <area target="_blank" alt="GERMANTOWN SPOT" title="GERMANTOWN SPOT" href="https://stayminty.com/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=16&amp;low=0&amp;high=2500" coords="508,279,24" shape="circle">
    <area target="_blank" alt="HONKY TONKS" title="HONKY TONKS" href="https://stayminty.com/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=16&amp;low=0&amp;high=2500" coords="649,280,19" shape="circle">
    <area target="_blank" alt="ROSE ALL DAY MEETS TOTALLY CLUELESS" title="ROSE ALL DAY MEETS TOTALLY CLUELESS" href="https://stayminty.com/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=16&amp;low=0&amp;high=2500" coords="698,295,17" shape="circle">
    <area target="_blank" alt="SPA &amp; SMORES STATION" title="SPA &amp; SMORES STATION" href="https://stayminty.com/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=16&amp;low=0&amp;high=2500" coords="312,396,19" shape="circle">
    <area target="_blank" alt="NASHVILLE PARTY PAD" title="NASHVILLE PARTY PAD" href="https://stayminty.com/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=16&amp;low=0&amp;high=2500" coords="393,396,14" shape="circle">
    <area target="_blank" alt="SKY LOUNGE @CITY HEIGHTS" title="SKY LOUNGE @CITY HEIGHTS" href="https://stayminty.com/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=16&amp;low=0&amp;high=2500" coords="423,395,15" shape="circle">
    <area target="_blank" alt="HOT TUB HEAVENS" title="HOT TUB HEAVENS" href="https://stayminty.com/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=16&amp;low=0&amp;high=2500" coords="519,438,19" shape="circle">
    <area target="_blank" alt="12TH &amp; ARCHER" title="12TH &amp; ARCHER" href="https://stayminty.com/?s=&amp;post_type=listing&amp;checkin=&amp;checkout=&amp;locations=nashville&amp;sleeps=&amp;lowbed=0&amp;highbed=16&amp;low=0&amp;high=2500" coords="516,488,21" shape="circle">
</map>
</div> -->

<?php
}else if ($cityID == '597') {

?>



<!--
<div class="section-map-locations smokymountains">
<img src="https://stayminty.com/wp-content/uploads/2022/07/Newmap_clear.jpg" usemap="#image-map">
<map name="image-map">
    <area target="_blank" alt="Chic Retreat 1" title="Chic Retreat 1" href="https://stayminty.com/listings/chic-retreat-1/" coords="236,36,36" shape="circle">
    <area target="_blank" alt="Chic Retreat 2" title="Chic Retreat 2" href="https://stayminty.com/listings/chic-retreat-2/" coords="177,75,32" shape="circle">
    <area target="_blank" alt="Double Trouble Zip and Dip Cabin" title="Double Trouble Zip and Dip Cabin" href="https://stayminty.com/listings/double-trouble/" coords="115,116,36" shape="circle">
    <area target="_blank" alt="Timeout Tavem" title="Timeout Tavem" href="https://stayminty.com/listings/timeout-tavern/" coords="226,121,33" shape="circle">
    <area target="_blank" alt="Blue Suede Views" title="Blue Suede Views" href="https://stayminty.com/listings/blue-suede-views/" coords="205,206,40" shape="circle">
    <area target="_blank" alt="Moonlight Ridge Retreat" title="Moonlight Ridge Retreat" href="https://stayminty.com/listings/moonlight-ridge-retreat/" coords="262,274,47" shape="circle">
    <area target="_blank" alt="Mimosa2" title="Mimosa2" href="https://stayminty.com/listings/mimosa-2/" coords="85,290,31" shape="circle">
    <area target="_blank" alt="Mimosa1" title="Mimosa1" href="https://stayminty.com/listings/mimosa-1/" coords="23,295,28" shape="circle">
    <area target="_blank" alt="Dreamy Views" title="Dreamy Views" href="https://stayminty.com/listings/dreamy-views/" coords="166,386,35" shape="circle">
    <area target="_blank" alt="Creek Hollow" title="Creek Hollow" href="https://stayminty.com/listings/creek-hollow/" coords="767,203,41" shape="circle">
    <area target="_blank" alt="Lodge at Dunn's Creek" title="Lodge at Dunn's Creek" href="https://stayminty.com/listings/lodge-at-dunn-s-creek/" coords="1011,193,37" shape="circle">
    <area target="_blank" alt="Night Fever - Glamp" title="Night Fever - Glamp" href="https://stayminty.com/listings/night-fever-glamp/" coords="1013,313,82" shape="circle">
</map>

</div>

<div class="section-map-locations smokymountains">
<img src="https://stayminty.com/wp-content/uploads/2022/07/map1-2.jpg" usemap="#image-map">
<map name="image-map">
    <area target="_blank" alt="Chic Retreat 1" title="Chic Retreat 1" href="https://stayminty.com/listings/chic-retreat-1/" coords="236,36,36" shape="circle">
    <area target="_blank" alt="Chic Retreat 2" title="Chic Retreat 2" href="https://stayminty.com/listings/chic-retreat-2/" coords="177,75,32" shape="circle">
    <area target="_blank" alt="Double Trouble Zip and Dip Cabin" title="Double Trouble Zip and Dip Cabin" href="https://stayminty.com/listings/double-trouble/" coords="115,116,36" shape="circle">
    <area target="_blank" alt="Timeout Tavem" title="Timeout Tavem" href="https://stayminty.com/listings/timeout-tavern/" coords="226,121,33" shape="circle">
    <area target="_blank" alt="Blue Suede Views" title="Blue Suede Views" href="https://stayminty.com/listings/blue-suede-views/" coords="205,206,40" shape="circle">
    <area target="_blank" alt="Moonlight Ridge Retreat" title="Moonlight Ridge Retreat" href="https://stayminty.com/listings/moonlight-ridge-retreat/" coords="262,274,47" shape="circle">
    <area target="_blank" alt="Mimosa2" title="Mimosa2" href="https://stayminty.com/listings/mimosa-2/" coords="85,290,31" shape="circle">
    <area target="_blank" alt="Mimosa1" title="Mimosa1" href="https://stayminty.com/listings/mimosa-1/" coords="23,295,28" shape="circle">
    <area target="_blank" alt="Dreamy Views" title="Dreamy Views" href="https://stayminty.com/listings/dreamy-views/" coords="166,386,35" shape="circle">
    <area target="_blank" alt="Creek Hollow" title="Creek Hollow" href="https://stayminty.com/listings/creek-hollow/" coords="767,203,41" shape="circle">
    <area target="_blank" alt="Lodge at Dunn's Creek" title="Lodge at Dunn's Creek" href="https://stayminty.com/listings/lodge-at-dunn-s-creek/" coords="1011,193,37" shape="circle">
    <area target="_blank" alt="Night Fever - Glamp" title="Night Fever - Glamp" href="https://stayminty.com/listings/night-fever-glamp/" coords="1013,313,82" shape="circle">
</map>

</div>

<div class="section-map-locations smokymountains">
<img src="https://stayminty.com/wp-content/uploads/2022/07/NASHVILLE-MAP.png" usemap="#image-map">
<map name="image-map">
    <area target="_blank" alt="Chic Retreat 1" title="Chic Retreat 1" href="https://stayminty.com/listings/chic-retreat-1/" coords="236,36,36" shape="circle">
    <area target="_blank" alt="Chic Retreat 2" title="Chic Retreat 2" href="https://stayminty.com/listings/chic-retreat-2/" coords="177,75,32" shape="circle">
    <area target="_blank" alt="Double Trouble Zip and Dip Cabin" title="Double Trouble Zip and Dip Cabin" href="https://stayminty.com/listings/double-trouble/" coords="115,116,36" shape="circle">
    <area target="_blank" alt="Timeout Tavem" title="Timeout Tavem" href="https://stayminty.com/listings/timeout-tavern/" coords="226,121,33" shape="circle">
    <area target="_blank" alt="Blue Suede Views" title="Blue Suede Views" href="https://stayminty.com/listings/blue-suede-views/" coords="205,206,40" shape="circle">
    <area target="_blank" alt="Moonlight Ridge Retreat" title="Moonlight Ridge Retreat" href="https://stayminty.com/listings/moonlight-ridge-retreat/" coords="262,274,47" shape="circle">
    <area target="_blank" alt="Mimosa2" title="Mimosa2" href="https://stayminty.com/listings/mimosa-2/" coords="85,290,31" shape="circle">
    <area target="_blank" alt="Mimosa1" title="Mimosa1" href="https://stayminty.com/listings/mimosa-1/" coords="23,295,28" shape="circle">
    <area target="_blank" alt="Dreamy Views" title="Dreamy Views" href="https://stayminty.com/listings/dreamy-views/" coords="166,386,35" shape="circle">
    <area target="_blank" alt="Creek Hollow" title="Creek Hollow" href="https://stayminty.com/listings/creek-hollow/" coords="767,203,41" shape="circle">
    <area target="_blank" alt="Lodge at Dunn's Creek" title="Lodge at Dunn's Creek" href="https://stayminty.com/listings/lodge-at-dunn-s-creek/" coords="1011,193,37" shape="circle">
    <area target="_blank" alt="Night Fever - Glamp" title="Night Fever - Glamp" href="https://stayminty.com/listings/night-fever-glamp/" coords="1013,313,82" shape="circle">
</map>

</div>-->


<?php
}
?>
 

<!--
<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1s1gFaJ8vQUul_D64ogcCuBJsGrPgvz0&ehbc=2E312F" width="100%" height="500"></iframe>
-->


<!--
<iframe src="https://www.google.com/maps/d/u/0/embed?mid=125rxj4TN-iTHuyrU9pIB6U2EE5F_K1g&ehbc=2E312F" width="640" height="480"></iframe>
-->








<script type="text/javascript" >
	
$( document ).ready(function() {	
	
	var loctitle = <?php echo json_encode($titlearr); ?>;
	var locfulladdress = <?php echo json_encode($full_location_address); ?>;
	var locfulladdresslink = <?php echo json_encode($full_location_address_link); ?>;
		var locations = [];
	for (let i = 0; i < loctitle.length; i++) {
		
		locations.push([loctitle[i], locfulladdress[i], locfulladdresslink[i]]);
	}
	//~ var locations = [
	

	//~ arr
	
	//~ ];	

	console.log(locfulladdress);
	console.log(locations);
	var geocoder;
	var map;
	var bounds = new google.maps.LatLngBounds();

	function initialize() {
		map = new google.maps.Map(
		document.getElementById("map_canvas"), {
			center: new google.maps.LatLng(37.4419, -122.1419),
			zoom: 5,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		geocoder = new google.maps.Geocoder();

		for (i = 0; i < locations.length; i++) {
			geocodeAddress(locations, i);
		}
	}
	google.maps.event.addDomListener(window, "load", initialize);

	function geocodeAddress(locations, i) {
		var title = locations[i][0];
		var address = locations[i][1];
		console.log(address);
		var url = locations[i][2];
		geocoder.geocode({
			'address': locations[i][1]
		},

		function(results, status) {
		//~ if (status == google.maps.GeocoderStatus.OK) {
			var marker = new google.maps.Marker({
			icon: 'http://maps.google.com/mapfiles/ms/icons/red.png',
			map: map,
			position: results[0].geometry.location,
			title: title,
			animation: google.maps.Animation.DROP,
			address: address,
			url: url
			})
			infoWindow(marker, map, title, address, url);
			bounds.extend(marker.getPosition());
			map.fitBounds(bounds);
		//~ } else {
			//~ console.log("geocode of " + address + " failed:" + status);
		//~ }
		});
	}
	

	function infoWindow(marker, map, title, address, url) {
		google.maps.event.addListener(marker, 'click', function() {
			var html = "<div><h3>" + title + "</h3><p>" + address + "<br></div><a href='" + url + "'>View location</a></p></div>";
			iw = new google.maps.InfoWindow({
			content: html,
			maxWidth: 350
			});
			iw.open(map, marker);
		});
	}

	function createMarker(results) {
		var marker = new google.maps.Marker({
			icon: 'http://maps.google.com/mapfiles/ms/icons/red.png',
			map: map,
			position: results[0].geometry.location,
			title: title,
			animation: google.maps.Animation.DROP,  
			address: address,
			url: url
		})
		bounds.extend(marker.getPosition());
		map.fitBounds(bounds);
		infoWindow(marker, map, title, address, url);
		return marker;
	}

});
</script>

<style>
html,
body,
#map_canvas {
  height: 100%;
  width: 100%;
  margin: 0px;
  padding: 0px
}
#map_canvas {
    height: 406px;
}
</style>

<!--
<div id="map_canvas"></div>
-->










  

<?php

	crb_render_fragment( 'inner/text-with-image-sections' );
	
	crb_render_fragment( 'inner/features' );
	
	
	crb_render_fragment( 'inner/slider' );
	
	
	crb_render_fragment( 'inner/text-with-image-single' );
	?>
</div><!-- /.main -->

<?php get_footer('alt'); ?>