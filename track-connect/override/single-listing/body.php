<?php
// Start the Loop.
while ( have_posts() ) : the_post(); ?>
    <article class="search-single" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="shell">


            <header class="entry-header">
                <small><?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?></small>
                <div class="entry-meta">
                    <?php
                    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
                        ?>
                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wp_listings' ), __( '1 Comment', 'wp_listings' ), __( '% Comments', 'wp_listings' ) ); ?></span>
                        <?php
                    endif;

                    edit_post_link( __( 'Edit', 'wp_listings' ), '<span class="edit-link">', '</span>' );
                    ?>
                </div><!-- .entry-meta -->
            </header><!-- .entry-header -->


            <div class="search-wrapper">
                <?php if($options['wp_listings_force_sidebar'] == 1): ?>
                <div class="sidebar--listing">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('track_connect') ) :
                    endif; ?>
                </div>
                <div class="content--listing">
                	<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
                    <?php else: ?>
                    <div>
                       <?php endif; ?>

                       <?php
                       $address = get_post_meta( $post->ID, '_listing_address', true );
                       $city    = get_post_meta( $post->ID, '_listing_city', true );
                       $state   = get_post_meta( $post->ID, '_listing_state', true );
                       $zip     = get_post_meta( $post->ID, '_listing_zip', true );
                       $full_location_address = $address . ' ' . $city .', ' . $state . ' ' . $zip;
                       $data_lat_lng = crb_get_lat_lng( $full_location_address );

                       

                       ?>
						
                       <?php //if ( $address && $city && $state && $zip && ! empty( $data_lat_lng ) ) : ?>
                       <?php //if ( $address && ($city || $state || $zip) ) : ?>
                       <?php if ( $address ) : ?>
                       
                           <div class="section-location-map">
                            <div class="location__map">
                                
                                <!--<div class="map js-map" data-lat="<?php echo esc_attr( $data_lat_lng['lat'] ); ?>" data-lng="<?php echo esc_attr( $data_lat_lng['lng'] ); ?>">
                                    <div class="map__holder"></div><!-- /.map__inner -->
                                <!--</div><!-- /.map -->
                                
                                
                                <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=2000&amp;height=400&amp;hl=en&amp;q=<?php echo $full_location_address; ?>&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.kokagames.com/fnf-friday-night-funkin-mods/">FNF Mods</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
                                
                                
                            </div><!-- /.location__map -->

                            <section class="section-map">
                                <h3><?php _e( 'Located At:', 'crb' ); ?></h3>

<!--
                                <a href="<?php echo esc_url( 'https://maps.google.com/?ll=' . $data_lat_lng['lat'] . ',' . $data_lat_lng['lng'] ); ?>" target="_blank"><?php echo $full_location_address; ?></a>
-->
                                <a href="<?php echo esc_url( 'https://maps.google.com/?q=' . $full_location_address ); ?>" target="_blank"><?php echo $full_location_address; ?></a>
                            </section><!-- /.section-map -->
                           </div><!-- /.section-location-map -->
                        <?php endif; ?>

						
                        <?php single_listing_post_content(); ?>
            </div><!-- /.search-wrapper -->

        </div><!-- /.shell -->


    </article><!-- #post-ID -->
		<div class="wprev_header_txt"><h3>Take a Tour with us</h3></div>
			<div class="item-main">
				
				<div class="item-inner">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/gDu2iBuT7TY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="item-inner">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/-5oi6TeyJs0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="item-inner">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/Q6flxTLhhIk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="item-inner">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/u4fWR460rEY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="item-inner">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/nwziokf8wYY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="item-inner">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/IW11OzEdE2Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			
			</div>
    <?php
    // Previous/next post navigation.

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
endwhile;
?>




