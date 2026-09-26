<?php
/**
 * Card Grid Layout Block
 */

 $title   = get_field('card_grid_title');
 $intro   = get_field('card_grid_intro');
 $columns = get_field('card_grid_columns') ?: '3';
 $cards   = get_field('card_grid');
 
 $column_class = 'columns-' . esc_attr($columns);
 ?>
 
 <section id="card-grid-block">
 	<div class="card-grid <?php echo $column_class; ?>">
	 	<?php if ($title): ?>
		 	<h2 class="card-grid__title"><?php echo esc_html($title); ?></h2>
	 	<?php endif; ?>
 	
	 	<?php if ($intro): ?>
		 	<div class="card-grid__intro">
			 	<?php echo wp_kses_post(wpautop($intro)); ?>
		 	</div>
	 	<?php endif; ?>
 	
	 	<?php if ($cards): ?>
		 	<div class="card-grid__items">
			 	<?php foreach ($cards as $card): ?>
				 	<?php
					 	$image   = $card['card_image'];
					 	$link    = $card['card_link'];
				 	?>
				 	<article class="card-grid__card">
 	
					 	<?php if ($image): ?>
						 	<img
							 	src="<?php echo esc_url($image['sizes']['medium']); ?>"
							 	alt="<?php echo esc_attr($image['alt']); ?>"
						 	/>
					 	<?php endif; ?>
 	
					 	<?php if ($card['card_title']): ?>
						 	<h3><?php echo esc_html($card['card_title']); ?></h3>
					 	<?php endif; ?>
 	
					 	<?php if ($card['card_content']): ?>
						 	<div class="card-grid__content">
							 	<?php echo wp_kses_post(wpautop($card['card_content'])); ?>
						 	</div>
					 	<?php endif; ?>
 	
					 	<?php if ($link): ?>
						 	<a
							 	class="card-grid__link"
							 	href="<?php echo esc_url($link['url']); ?>"
							 	target="<?php echo esc_attr($link['target'] ?: '_self'); ?>"
						 	>
							 	<?php echo esc_html($link['title']); ?>
						 	</a>
					 	<?php endif; ?>
 	
				 	</article>
			 	<?php endforeach; ?>
		 	</div>
	 	<?php endif; ?>
	 </div> 
 </section>
