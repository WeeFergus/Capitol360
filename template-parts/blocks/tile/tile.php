<?php
/**
 * Tile Block
 */

$image       = get_field('tile_image');
$title       = get_field('tile_title');
$description = get_field('tile_description');
$link        = get_field('tile_link');

$block_id = 'tile-' . $block['id'];
$class_name = 'tile';

if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
?>

<div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($class_name); ?>">

	<?php if ( $link ) : ?>
	<a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>">
	<?php endif; ?>

		<?php if ( $image ) : ?>
			<div class="tile__image">
				<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
			</div>
		<?php endif; ?>

		<div class="tile__content">
			<?php if ( $title ) : ?>
				<h3 class="tile__title"><?php echo esc_html($title); ?></h3>
			<?php endif; ?>

			<?php if ( $description ) : ?>
				<p class="tile__description"><?php echo esc_html($description); ?></p>
			<?php endif; ?>
		</div>

	<?php if ( $link ) : ?>
	</a>
	<?php endif; ?>

</div>
