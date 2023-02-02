<?php
$button_name = carbon_get_the_post_meta( 'crb_intro_intro_form_btn_text' );
$action = carbon_get_the_post_meta( 'crb_intro_intro_form_url' );
?>
<div class="intro__foot">
	<div class="form-book-inner">
		<form action="<?php echo $action; ?>" method="get" autocomplete="off">
			<div class="form__body">
				<div class="form__row">
					<label for="check-in" class="hidden"><?php _e( 'Choose a chek In/Out date', 'crb' ); ?></label>

					<div class="form__controls form__datepicker">
						<div class="form__col form__col--size1">
							<div class="form__field-date">
								<input type="text" id="checkin" name="a" class="form__field form__field--date" placeholder="Check-in">

								<i class="far fa-calendar-alt"></i>
							</div><!-- /.form__field-date -->
						</div><!-- /.form__col -->

						<div class="form__col form__col--size1">
							<div class="form__field-date">
								<input type="text" id="checkout" name="d" class="form__field form__field--date" placeholder="Check-out">

								<i class="far fa-calendar-alt"></i>
							</div><!-- /.form__field-date -->
						</div><!-- /.form__col -->
					</div><!-- /.form__controls -->

					<div class="form__actions">
						<label for="search_btn" class="hidden"><?php _e( 'Search', 'crb' ); ?></label>

						<div class="form__controls">
							<input type="submit" id="search_btn" class="btn" value="<?php echo esc_html( $button_name ); ?>">
						</div><!-- /.form__controls -->
					</div><!-- /.form__actions-->
				</div><!-- /.form__row -->
			</div><!-- /.form__body -->
		</form>
	</div><!-- /.form-book-inner -->
</div>
