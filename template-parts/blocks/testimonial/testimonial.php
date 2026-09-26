<?php
/**
 * Testimonial Block Template
 */

// Create id attribute allowing for custom 'anchor' value
$id = 'testimonial-' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values
$className = 'testimonial';

if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

// Load values and assign defaults
$text = get_field( 'testimonial' ) ?: __( 'Your testimonial here...', 'cap360-media' );
$author = get_field( 'author' ) ?: __( 'Author Name', 'cap360-media' );
$role = get_field( 'role' ) ?: __( 'Author Role', 'cap360-media' );
$image = get_field( 'image' ) ?: 295;
$background_color = get_field( 'background_color' );
$text_color = get_field( 'text_color' );
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
	<blockquote class="testimonial-blockquote">
		<span class="testimonial-text"><?php echo esc_html( $text ); ?></span>
		<span class="testimonial-author"><?php echo esc_html( $author ); ?></span>
		<span class="testimonial-role"><?php echo esc_html( $role ); ?></span>
	</blockquote>

	<?php if ( $image ) : ?>
		<div class="testimonial-image">
			<?php echo wp_get_attachment_image( $image, 'full' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( $background_color || $text_color ) : ?>
		<style>
			#<?php echo esc_attr( $id ); ?> {
				<?php if ( $background_color ) : ?>
					background-color: <?php echo esc_attr( $background_color ); ?>;
				<?php endif; ?>

				<?php if ( $text_color ) : ?>
					color: <?php echo esc_attr( $text_color ); ?>;
				<?php endif; ?>
			}
		</style>
	<?php endif; ?>
</div>
