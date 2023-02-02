<?php

use Carbon_Fields\Widget\Widget;
use Carbon_Fields\Field\Field;

/**
 * Register the new widget classes here so that they show up in the widget list.
 */
function crb_register_widgets() {
	register_widget( 'CrbThemeWidgetRichText' );
	register_widget( 'CrbMenuWithoutTitle' );
	register_widget( 'CrbMenuColumns' );
}
add_action( 'widgets_init', 'crb_register_widgets' );

/**
 * Displays a block with a title and WYSIWYG rich text content
 */
class CrbThemeWidgetRichText extends Widget {
	function __construct() {
		$this->setup(
			'rich_text',
			__( 'Rich Text', 'crb' ),
			__( 'Displays a block with title and WYSIWYG content.', 'crb' ),
			array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'rich_text', 'content', __( 'Content', 'crb' ) ),
			)
		);
	}

	function front_end( $args, $instance ) {
		if ( $instance['title'] ) {
			$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

			echo $args['before_title'] . $title . $args['after_title'];
		}

		echo apply_filters( 'the_content', $instance['content'] );
	}
}

class CrbMenuWithoutTitle extends Widget {
	function __construct() {
		$this->setup(
			'menu_without_title',
			__( 'Navigation Menu', 'crb' ),
			__( 'Displays a menu without title.', 'crb' ),
			array(
				Field::make( 'complex', 'entries', __( 'Links', 'crb' ) )
				->add_fields( array(
					Field::make( 'text', 'title', __( 'Title', 'crb' ) )
					->set_width(50),
					Field::make( 'text', 'url', __( 'Link', 'crb' ) )
					->set_width(50)
				) )
			)
		);
	}

	function front_end( $args, $instance ) {
		if ( $entries = $instance['entries'] ) : ?>
			<nav class="footer__nav widget-menu">
				<ul>
					<?php foreach ( $entries as $entry ) : ?>
						<?php 
						$text = $entry['title'];
						$url = $entry['url'];

						$is_link_valid = ! empty( $text ) && ! empty( $url );
						?>
						<?php if ( $is_link_valid ) : ?>
							<li>
								<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $text ); ?></a>
							</li>
						<?php endif; ?>
					<?php endforeach;; ?>
				</ul>
			</nav><!-- /.nav -->
			<?php
		endif;
	}
}

class CrbMenuColumns extends Widget {
	function __construct() {
		$this->setup(
			'menu_columns',
			__( 'Menu Columns', 'crb' ),
			__( 'Displays Columns as Menu', 'crb' ),
			array(
				Field::make( 'complex', 'menus', __( 'Menus', 'crb' ) )
				->set_layout( 'tabbed-horizontal' )
				->add_fields( array(
					Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
					Field::make( 'complex', 'links', __( 'Links', 'crb' ) )
					->set_layout( 'tabbed-vertical' )
					->add_fields( array(
						Field::make( 'text', 'title', __( 'Title', 'crb' ) )
						->set_width(50),
						Field::make( 'text', 'url', __( 'Url', 'crb' ) )
						->set_width(50),
					) )
					->set_header_template( '
						<% if (title) { %>
							<%- title %>
							<% } %>
							' ),
				) )
				->set_max(2)
				->set_header_template( '
					<% if (title) { %>
						<%- title %>
						<% } %>
						' ),
			)
		);
	}

	function front_end( $args, $instance ) {
		if ( $entries = $instance['menus'] ) : ?>
			<nav class="nav-locations">
				<ul>
					<?php foreach ( $entries as $entry ) : ?>
						<li><?php echo esc_html( $entry['title'] ); ?>

						<ul>
							<?php if ( $links = $entry['links'] ) : ?>
								<?php foreach ( $links as $link ) : ?>
									<?php 
									$title = $link['title'];
									$url = $link['url'];

									$is_link_valid = ! empty( $title ) && ! empty ( $url );
									?>

									<?php if ( $is_link_valid ) : ?>
										<li>
											<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $title ); ?></a>
										</li>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav><!-- /.nav-locations -->

		<?php
	endif;
}
}

