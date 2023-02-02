<?php
if ( is_singular( 'listing' ) ) {
	return;
}
?>
<?php if ( is_page_template( 'templates/glamping.php' ) ) : ?>

	<div class="shell shell--sm">
		<div class="intro__foot">
			<div class="form-book--alt">
				<div class="form-book-inner">
					<form role="search" method="get" id="searchform" action="<?= home_url( '/' ) ?>">
						<input type="hidden" value="" name="s"/>
						<input type="hidden" value="listing" name="post_type"/>

						<div class="form__body">
							<div class="form__row">
								<div class="form__col form__col--size1">
									<label for="check-in"><?php _e( 'Location', 'crb' ); ?></label>

									<div class="form__field-date form__field-select">
										<select name="locations" class="form__field form__field--date" placeholder="Location Name" id="">
											<option value="">Location Name</option>
											<?php foreach ( $this->getNodeTypes() as $type ): ?>
												<optgroup label="<?= $type->name ?>">
													<?php foreach ( $this->getNodes( $type ) as $node ): ?>
														<?php if ( $node->count ): ?>
															<option
															value="<?= $node->slug ?>" <?= ( $node->slug == $locations ) ? ' selected ' : '' ?>><?= $node->name ?>
															(<?= $node->count ?>)
														</option>
													<?php endif; ?>
												<?php endforeach; ?>
											</optgroup>
										<?php endforeach; ?>
									</select>
									</div><!-- /.form__field-date -->
								</div><!-- /.form__col -->

								<div class="form__col form__col--size2">
									<label for="check-in"><?php _e( 'Arrival', 'crb' ); ?></label>

									<div class="form__field-date">
										<input type="text" id="checkin" name="checkin" class="form__field form__field--date" placeholder="Arrival">

										<i class="far fa-calendar-alt"></i>
									</div><!-- /.form__field-date -->
								</div><!-- /.form__col -->

								<div class="form__col form__col--size2">
									<label for="check-in"><?php _e( 'Departure', 'crb' ); ?></label>

									<div class="form__field-date">
										<input type="text" id="checkout" name="checkout" class="form__field form__field--date" placeholder="Departure">

										<i class="far fa-calendar-alt"></i>
									</div><!-- /.form__field-date -->
								</div><!-- /.form__col -->

								<div class="form__col form__col--size2">
									<label for="check-in"><?php _e( 'Sleeps', 'crb' ); ?></label>

									<div class="form__field-date form__field-select">
										<select name="sleeps" class="form__field form__field--alt" placeholder="Sleeps" id="">
											<?php for ( $i = 1; $i <= 32; $i++ ) : ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php endfor; ?>
										</select>
									</div><!-- /.form__field-date -->
								</div><!-- /.form__col -->

								<div class="form__actions">
									<label for="search_btn" class="hidden"><?php _e( 'Search', 'crb' ); ?></label>

									<div class="form__controls">
										<input type="submit" id="search_btn" class="btn" value="Search">
									</div><!-- /.form__controls -->
								</div><!-- /.form__actions-->
							</div><!-- /.form__row -->
						</div><!-- /.form__body -->
					</form>
				</div><!-- /.form-book-inner -->
			</div><!-- /.form-book-inner -->
		</div>
	</div>

<?php else : ?>
	<form role="search" method="get" id="searchform" action="<?= home_url( '/' ) ?>">
		<input type="hidden" value="" name="s"/>
		<input type="hidden" value="listing" name="post_type"/>

		<?php if ( ! is_front_page() ): ?>
			<div id="datepicker-search-container">
				<div class="input-daterange input-group" id="datepicker-search">
					<span>Arrival Date</span>
					<input type="text" class="input-sm form-control" name="checkin" id="checkin_date-search"
					value="<?= $checkin ?>">
					<span>Departure Date</span>
					<input type="text" class="input-sm form-control" name="checkout" id="checkout_date-search"
					value="<?= $checkout ?>">
				</div>
			</div>
		<?php endif ?>

		<?php if ( ! $hide_locations = carbon_get_theme_option( 'crb_tc_widget_hide_locations' ) ): ?>
			<span class="search-locations-header"><strong>Locations</strong></span>

			<?php $current = ! empty( $wp_query->query_vars['tax_query'][0]['terms'] ) ? $wp_query->query_vars['tax_query'][0]['terms'] : ''; ?>

			<div class="select-holder">
				<select name='locations' id='locations-select' class='wp-listings-taxonomy'>
					<option value="">All</option>
					<?php foreach ( $this->getNodeTypes() as $type ): ?>
						<optgroup label="<?= $type->name ?>">
							<?php foreach ( $this->getNodes( $type ) as $node ): ?>
								<?php if ( $node->count ): ?>
									<option
										value="<?= $node->slug ?>" <?= ( $node->slug == $locations ) ? ' selected ' : '' ?>><?= $node->name ?>
										(<?= $node->count ?>)
									</option>
								<?php endif; ?>
							<?php endforeach; ?>
						</optgroup>
				<?php endforeach; ?>
			</select>
		</div>
	<?php endif ?>

	<br/>

	<?php if ( is_front_page() ): ?>
		<div id="datepicker-search-container">
			<div class="input-daterange input-group" id="datepicker-search">
				<div class="datepicker-entry">
					<span>Arrival Date</span>
					<input type="text" class="input-sm form-control" name="checkin" id="checkin_date-search"
					value="<?= $checkin ?>">
				</div>

				<div class="datepicker-entry">
					<span>Departure Date</span>
					<input type="text" class="input-sm form-control" name="checkout" id="checkout_date-search"
					value="<?= $checkout ?>">
				</div>
			</div>
		</div>
	<?php endif ?>

	<span class="sleeps-header hide-home"><strong>Sleeps</strong></span>
	<br/>
	<div class="select-holder hide-home">
		<select name="sleeps" class="sleeps-input">
			<option value=""></option>
			<?php for ( $i = 1; $i <= 32; $i ++ ) : ?>
				<option <?= $i == $sleeps ? ' selected ' : ''; ?> value="<?= $i ?>"><?= $i ?></option>
			<?php endfor; ?>
		</select>
	</div>
	<br/>

	<br/>

	<?php if ( ! $hide_property_types = carbon_get_theme_option( 'crb_tc_widget_hide_proeprty_types' ) ): ?>
		<label for="lodging" class="hide-home">Property Type</label>
		<div class="select-holder hide-home">
			<select name="lodging" id="lodging" class="listing-lodging">
				<option value="">No Preference</option>
				<?php foreach ( (array)json_decode(get_option('track_connect_lodging_types')) as $lodgingTypeId => $lodgingTypeValue): ?>
				<option <?= ( $lodgingType == $lodgingTypeId ) ? 'SELECTED' : ''; ?>
					value="<?= $lodgingTypeId ?>"><?= $lodgingTypeValue; ?></option>';
				<?php endforeach; ?>
			</select>
		</div><!-- /.select-holder -->
		<br>
	<?php endif ?>

	<span class="beds-header hide-home"><b>Bedrooms</b></span>
	<input type="hidden" id="lowbed" name="lowbed"/>
	<input type="hidden" id="highbed" name="highbed"/>
	<br/>

	<input class="slider-beds hide-home" type="text" id="slider-beds" readonly
	style="border:0; color:#f6931f; font-weight:bold;">
	<br/>

	<div id="bed-range" class="hide-home"></div>
	<br/>

	<span class="price-header hide-home" for="amount"><strong>Price range</strong></span>
	<input type="hidden" id="lowrate" name="low"/>
	<input type="hidden" id="highrate" name="high"/>
	<br>

	<input class="slider-amount hide-home" type="text" id="amount" readonly
	style="border:0; color:#f6931f; font-weight:bold;">
	<br/>

	<div id="price-range" class="hide-home"></div>
	<br/>

	<div class="listing-amenities" style="max-height:200px;overflow: hidden;overflow-y: scroll">
		<?php foreach ( $listings_taxonomies as $tax => $data ): ?>
			<?php if ( $tax != 'features' || ! isset( $instance[ $tax ] ) || ! $instance[ $tax ] ) {
				continue;
			} ?>

			<?php $terms = get_terms( $tax,
				array( 'orderby' => 'title', 'number' => 100, 'hierarchical' => false ) ); ?>
			<?php if ( empty( $terms ) ) {
				continue;
			} ?>

			<?php $current = ! empty( $wp_query->query_vars['tax_query']['terms'] ) ? $wp_query->query_vars['tax_query']['terms'] : ''; ?>
			<?php foreach ( (array) $terms as $term ): ?>
				<?php if ( in_array( $term->name, $activeAmenities ) ): ?>
					<input type="checkbox" name="features[]" value="<?= $term->slug ?>"
					id="<?= $tax ?>" <?= ( in_array( $term->slug, $features ) ) ? ' checked ' : ''; ?>
					class='wp-listings-taxonomy-checkbox'><?= $term->name ?><br/>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</div>
	<br/>
	<div class="btn-search">
		<button type="submit" class="searchsubmit"><i class="fa fa-search"></i><span
			class="button-text"><?= esc_attr( $instance['button_text'] ) ?></span>
		</button>
	</div>
	<div class="clear"></div>
</form>
<?php endif; ?>
<script type="text/javascript">
	jQuery(function ($) {
		$("#bed-range").slider({
			range: true,
			min: <?=$bedsMin->bed ?: 0; ?>,
			max: <?=$bedsMax->bed ?>,
			step: 1,
			values: [ <?=( $lowBed ) ? $lowBed : $bedsMin->bed ?: 0; ?>, <?=( $highBed ) ? $highBed : $bedsMax->bed?> ],
			slide: function (event, ui) {
				$("#slider-beds").val(ui.values[0] + " - " + ui.values[1]);
				$("#lowbed").val(ui.values[0]);
				$("#highbed").val(ui.values[1]);
			}
		});
		$("#slider-beds").val($("#bed-range").slider("values", 0) +
			" - " + $("#bed-range").slider("values", 1));
		$("#lowbed").val($("#bed-range").slider("values", 0));
		$("#highbed").val($("#bed-range").slider("values", 1));

		$("#price-range").slider({
			range: true,
			min: 0,
			max: 2500,
			step: 100,
			values: [0, 2500],
			slide: function (event, ui) {
				var plus = (ui.values[1] == 2500) ? '+' : '';
				$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1] + plus);
				$("#lowrate").val(ui.values[0]);
				$("#highrate").val(ui.values[1]);
			}
		});
		$("#amount").val("$" + $("#price-range").slider("values", 0) +
			" - $" + $("#price-range").slider("values", 1) + '+');
		$("#lowrate").val($("#price-range").slider("values", 0));
		$("#highrate").val($("#price-range").slider("values", 1));

		$('#datepicker-search-container .input-daterange').datepicker({
			autoclose: true,
			clearBtn: true,
			startDate: '0'
		});

		$('#checkin_date-search').datepicker().on('hide', function (e) {
			$('#checkout_date-search').datepicker('show');
		});
	});
</script>
