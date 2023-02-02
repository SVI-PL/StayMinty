<?php
function crb_listings() {
	global $post,$wp_query,$wp_the_query,$availableUnits,$checkAvailability,$bedrooms,$checkin,$checkout,$mam_posts_query,$lowRate,$highRate,$lowBed,$highBed, $sleeps, $lodgingType;

		$count = 0; // start counter at 0
		$unitsAvailable = true;

		if($checkAvailability && $availableUnits['success'] == false){
			echo '<div align="center" style="padding:25px;">'.$availableUnits['message'].'</div>';
			$unitsAvailable = false;
		}

		if($checkAvailability && !count($availableUnits['units'])){
			$unitsAvailable = false;
		}

		$avgRates = null;
		$avgRates = $availableUnits['rates'];

		// Start the Loop.
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type'         => 'listing',
			'posts_per_page'    => 15,
			'paged'             => $paged,
			'order'             => 'ASC',
			'orderby'           => 'rand'
		);

		add_filter('query','mam_posts_query');
		$seed = date('G');
		$mam_posts_query = " ORDER BY rand($seed) "; // Turn on filter

		$metaArgs = array();
		if($lowRate > 0){
			$metaArgs[] = array(
				'key' => '_listing_min_rate',
				'compare' => '>=',
				'value' => $lowRate,
				'type' => 'numeric',
			);
		}

		if($highRate > 0 && $highRate < 2500){
			$metaArgs[] = array(
				'key' => '_listing_max_rate',
				'compare' => '<=',
				'value' => $highRate,
				'type' => 'numeric',
			);
		}

		if($lowBed > 0){
			$metaArgs[] = array(
				'key' => '_listing_bedrooms',
				'value' => $lowBed,
				'compare' => '>=',
				'type' => 'numeric',
			);
		}
		if($highBed > 0){
			$metaArgs[] = array(
				'key' => '_listing_bedrooms',
				'value' => $highBed,
				'compare' => '<=',
				'type' => 'numeric',
			);
		}
		if($bedrooms > 0){
			$metaArgs[] = array(
				'key' => '_listing_bedrooms',
				'value' => $bedrooms,
				'compare' => '=',
				'type' => 'numeric',
			);
		}

		if($sleeps > 0){
			$metaArgs[] = array(
				'key' => '_listing_occupancy',
				'value' => $sleeps,
				'compare' => '>=',
				'type' => 'numeric',
			);
		}

		if($lodgingType){
			$metaArgs[] = array(
				'key' => '_listing_lodging_type_'.$lodgingType,
				'compare' => 'EXISTS'
			);
		}

		if(count($metaArgs)){
			$args += array('meta_query' => array(
				$metaArgs
			));
		}


		if($checkAvailability){
			$args += array('post__in' => $availableUnits['units']);
		}
		$taxargs = array();
		if(get_query_var('status') != ''){
			$taxargs[] = array(
				'taxonomy'          => 'status',
				'field'             => 'slug',
				'terms'             => get_query_var('status')
			);
		}
		if(get_query_var('features') != ''){
			$taxargs[] = array(
				'taxonomy'          => 'features',
				'field'             => 'slug',
				'terms'             => get_query_var('features'),
				'operator'          => 'AND'
			);
		}
		if(get_query_var('locations')){
			$taxargs[] = array(
				'taxonomy'          => 'locations',
				'field'             => 'slug',
				'terms'             => get_query_var('locations')
			);
		}
		if(get_query_var('property-types') != ''){
			$taxargs[] = array(
				'taxonomy'          => 'property-types',
				'field'             => 'slug',
				'terms'             => get_query_var('property-types')
			);
		}

		if(count($taxargs)){
			$args += array('tax_query' => array(
				'relation' => 'AND',
				$taxargs
			));
		}

		//query_posts($args);
		$wp_query = new WP_Query();
		$wp_query->query($args);
		$mam_posts_query = ''; // Turn off filter

		if ( have_posts() && $unitsAvailable ) :
			//echo $GLOBALS['wp_query']->request; // will spit out the query
			while ( have_posts() ) : the_post();
				//$post = $query->post;

				$unitId = get_post_meta( $post->ID, '_listing_unit_id', true );
				$bedroomSize = get_post_meta( $post->ID, '_listing_bedrooms', true );

				$link = get_permalink();
				if($checkin && $checkout){
					$link = add_query_arg( 'checkin', $checkin, get_permalink() );
					$link = add_query_arg( 'checkout', $checkout, $link );
				}

				$count++; // add 1 to counter on each loop
				$first = ($count == 1) ? 'first' : ''; // if counter is 1 add class of first
				$firstImage = get_post_meta( $post->ID, '_listing_first_image', true );

				$loop = sprintf( '<div class="listing-widget-thumb"><a href="%s" class="listing-image-link">%s</a>', $link, '<img src="https://d2epyxaxvaz7xr.cloudfront.net/305x208/'.get_post_meta( $post->ID, '_listing_first_image', true ).'"></img> ' );

				if($firstImage == '' || $firstImage === null){
					$loop = sprintf( '<div class="listing-widget-thumb"><a href="%s" class="listing-image-link">%s</a>', $link, '<img src="http://placehold.it/305x208">' );
				}

				if ( wp_listings_get_featured()  ) {
					// Banner across thumb
					$loop .= sprintf( '<span class="listing-status %s">Featured</span>', strtolower(str_replace(' ', '-', wp_listings_get_status())), wp_listings_get_status() );
				}

				 

                $loop .= sprintf( '<div class="listing-thumb-meta">' );

                if ( $avgRates[$unitId] > 0 ) {
                    $loop .= sprintf( '<span class="listing-property-type">%s</span>', 'avg. rate : ' );
                    $loop .= sprintf( '<span class="listing-price">$%s/night</span>', number_format($avgRates[$unitId],0) );
                }
                //~ else{
                    //~ $loop .= sprintf( '<span class="listing-property-type stayminty-listing-property-type-starting">%s</span>', 'starting at : ' );
                    //~ $loop .= sprintf( '<span class="listing-price stayminty-listing-price-starting">$%s/night</span>', number_format(get_post_meta( $post->ID, '_listing_min_rate', true ),0) );
                //~ }

                $loop .= sprintf( '</div><!-- .listing-thumb-meta --></div><!-- .listing-widget-thumb -->' );



				$loop .= sprintf( '<div class="listing-widget-details"><h3 class="listing-title"><a href="%s">%s</a></h3>', $link, get_the_title() );

				$loop .= sprintf( '<p class="listing-information">%s BR / %s BA / %s PPL - %s, %s</p>', get_post_meta( $post->ID, '_listing_bedrooms', true ), get_post_meta( $post->ID, '_listing_bathrooms', true ), get_post_meta( $post->ID, '_listing_occupancy', true ),  get_post_meta( $post->ID, '_listing_city', true ), get_post_meta( $post->ID, '_listing_state', true ) );

				if ( $short_description = carbon_get_the_post_meta( 'crb_listing_short_description' ) ) {
					$loop .= sprintf( '<p class="description">%s</p>', $short_description );
				}

				$loop .= sprintf( '<p class="listing-overview">%s</p>', get_post_meta( $post->ID, '_listing_overview', true ) );

				//$loop .= sprintf( '<span style="margin-left:14px;"><a href="%s" class="button btn-primary">%s</a><span>', $link, __( 'View Property', 'wp_listings' ) );

				$loop .= sprintf('</div><!-- .listing-widget-details -->');

//~ echo "<pre style='display:none;'>";
//~ print_r(get_post_meta( $post->ID));
//~ print_r(get_post_meta( $post->ID)['_listing_latitude'][0]);
//~ print_r(get_post_meta( $post->ID)['_listing_longitude'][0]);
//~ echo ldata[] = get_post_meta($post->ID);

//~ foreach(get_post_meta($post->ID) as $k=>$v){
    //~ //echo $k."=>".$v."<br>";
    //~ if($k == "_listing_latitude" ){
        //~ echo "lat". $v[0];
    //~ }
    //~ else {
        //~ if($k == "_listing_longitude" ){
        //~ echo "long". $v[0];
        //~ }
    //~ }
//~ }
//~ echo "</pre>";

				/** wrap in div with column class, and output **/
				printf( '<article id="post-%s" class="listing entry listing-box %s"><div class="listing-wrap">%s</div><!-- .listing-wrap --></article><!-- article#post-## -->', get_the_id(), $first, apply_filters( 'wp_listings_featured_listings_widget_loop', $loop ) );

				if ( 3 == $count ) { // if counter is 3, reset to 0
					$count = 0;
				}

			endwhile;

		else:
			echo '<div align="center" style="padding:25px;"><strong>No units are available with the selected filters.<br>Please note: we do not allow check in or check out on Saturdays. Also, 1 night and 2 night stays are not always available for selected dates. Try 3-4 night stays to see units available.<br>Rates will only reflect up to 1 year in advance. For future rates or group bookings contact <a href="milto:hello@stayminty.com">hello@stayminty.com</a></strong></div>';
		endif;

		if($unitsAvailable){
			crb_listing_paging();
			//wpbeginner_numeric_posts_nav();
		}
	}

function crb_listing_paging() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );
	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}
	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'wp_listings' ),
		'next_text' => __( 'Next &rarr;', 'wp_listings' ),
	) );
	if ( $links ) :
	?>
	<nav class="navigation archive-listing-navigation" role="navigation">
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}