<?php
$section_title = $entry['title'];
$boxes         = $entry['boxes'];
?>
<div class="section-boxes-two-cols">
	<div class="shell">
		<?php if ( $section_title ) : ?>
			<h2><?php echo esc_html( $section_title ); ?></h2>
		<?php endif; ?>

		<div class="section__boxes">
			<?php foreach ( $boxes as $box ) : ?>
				<?php
				$box_image   = $box['thumbnail'];
				$box_title   = $box['title'];
				$box_content = $box['content'];

				$btn_title   = $box['btn_text'];
				$btn_url     = $box['btn_url'];
				$btn_tab     = $box['btn_tab'] ? '_blank' : '_self';
				?>
				<div class="box-entry">
					<div class="box__image" style="background-image: url(<?php echo wp_get_attachment_image_url( $box_image, 'full', false ); ?>)">
					</div><!-- /.box__image -->

					<div class="box__content">
						<?php if ( $box_title ) : ?>
							<h3><?php echo nl2br( $box_title ); ?></h3>
						<?php endif; ?>

						<?php
						if ( $box_content ) {
							echo crb_content( $box_content );
						}
						?>

						<?php if ( $btn_title && $btn_url ) : ?>
							<a class="link-more" href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo $btn_tab; ?>"><?php echo esc_html( $btn_title ); ?></a>
						<?php endif; ?>
					</div><!-- /.box__content -->
				</div>
			<?php endforeach; ?>
		</div><!-- /.section__boxes -->
	</div><!-- /.shell -->
</div><!-- /.section-boxes-two-cols -->