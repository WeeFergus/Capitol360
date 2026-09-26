<?php
/**
 * Template Name: Home Page
 *
 * @package cap360
 */
 
get_header(); ?>
<main>
	<?php $background_url = get_field('hero_background'); ?>
	<div id="hero" style="background-image: url('<?php echo esc_url($background_url); ?>');">
		<div class="hero-content">
			<div class="headline-wrap">
				<h1 class="compressed"><?php the_field('hero_title');?></h1>
			</div>
			<div class="subhead-wrap">
				<p class="subtitle"><?php the_field('hero_subtext');?></p>
				<?php 
					$link = get_field('hero_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="arrow-hero-button rust" href="<?php echo esc_url( $link_url );?>" target="<?php echo esc_attr( $link_target ); ?>"> 
							<span class="btn-icon">
								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line x1="4" y1="12" x2="18" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
								<polyline points="13,6 19,12 13,18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
								</svg>
							</span>
							<span class="btn-text condensed"><?php echo esc_html( $link_title ); ?></span>
						</a>
					<?php endif; ?>
			</div>
		</div>
	</div>
	<div id="division-band">
		<div class="left-band"></div>
			<div class="animated-blocks-wrap">
				<div class="animated-block-cell">
					<div id="roofing-div" class="animated-block">
						<div class="arrow">
							<img src="/wp-content/uploads/2026/09/right-arrow.svg"/>	
						</div>
						<p class="constant">Roofing Division</p>
						<p class="hidden-txt-subtitle">
							Covered. Rain or Shine.
						</p>
						<ul class="hidden-list">
							<li>Preventative Maintenance</li>
							<li>Leak Repair & Diagnostics</li>
							<li>Roof Restoration Systems</li>
							<li>Asset Management</li>
						</ul>
					</div>
				</div>

				<div class="animated-block-cell">
					<div id="flooring-div" class="animated-block">
						<div class="arrow">
							<img src="/wp-content/uploads/2026/09/right-arrow.svg"/>	
						</div>
						<p class="constant">Flooring Division</p>
						<p class="hidden-txt-subtitle">
							Covered. Roof to Floor.
						</p>
						<ul class="hidden-list">
							<li>Preventative Maintenance</li>
							<li>Leak Repair & Diagnostics</li>
							<li>Roof Restoration Systems</li>
							<li>Asset Management</li>
						</ul>
					</div>
				</div>

				<div class="animated-block-cell">
					<div id="coatings-div" class="animated-block">
						<div class="arrow">
							<img src="/wp-content/uploads/2026/09/right-arrow.svg"/>	
						</div>
						<p class="constant">Coating Division</p>
						<p class="hidden-txt-subtitle">
							Covered. Corner to Corner.
						</p>
						<ul class="hidden-list">
							<li>Preventative Maintenance</li>
							<li>Leak Repair & Diagnostics</li>
							<li>Roof Restoration Systems</li>
							<li>Asset Management</li>
						</ul>
					</div>
				</div>
			</div>
		<div class="right-band"></div>					
	</div>
	<div id="intro-banner">
		<div class="intro-text">
			<p class="sm-caps"> Capital 360	</p>
			<h2><?php the_field('introduction_title');?></h2>
			<p class="intro-txt"><?php the_field('introduction_text');?></p>
		</div>
	</div>	

	<div id="divisions">
		<div class="img-text-cols">
			<?php 
				$image = get_field('division_1_image');
				if( !empty( $image ) ): ?>
				<figure>
					<img class="radius-bl-80" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				</figure>
			<?php endif; ?>
			<div class="txt-wrap roofing">
				<h2><?php the_field('division_1_name');?></h2>
				<h3><?php the_field('division_1_title');?></h3>
				<p><?php the_field('division_1_description');?></p>
			
				<?php 
					$link = get_field('division_1_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>

						<a class="arrow-right-button rust" href="<?php echo esc_url( $link_url );?>" target="<?php echo esc_attr( $link_target ); ?>"> 
							<span class="btn-icon">
								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line x1="4" y1="12" x2="18" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
								<polyline points="13,6 19,12 13,18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
								</svg>
							</span>
							<span class="btn-text condensed"><?php echo esc_html( $link_title ); ?></span>
						</a>
 				<?php endif; ?>
			</div>
		</div>

		<div class="img-text-cols">
			<?php 
				$image = get_field('division_2_image');
				if( !empty( $image ) ): ?>
				<figure>
					<img class="radius-br-80" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				</figure>
			<?php endif; ?>
			<div class="txt-wrap flooring">
				<h2><?php the_field('division_2_name');?></h2>
				<h3><?php the_field('division_2_title');?></h3>
				<p><?php the_field('division_2_description');?></p>
				<?php 
					$link = get_field('division_2_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="arrow-right-button orange" href="<?php echo esc_url( $link_url );?>" target="<?php echo esc_attr( $link_target ); ?>"> 
							<span class="btn-icon">
								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line x1="4" y1="12" x2="18" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
								<polyline points="13,6 19,12 13,18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
								</svg>
							</span>
							<span class="btn-text condensed"><?php echo esc_html( $link_title ); ?></span>
						</a>
 				<?php endif; ?>
			</div>
		</div>

		<div class="img-text-cols">
			<?php 
				$image = get_field('division_3_image');
				if( !empty( $image ) ): ?>
				<figure>
					<img class="radius-bl-80" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				</figure>
			<?php endif; ?>
			<div class="txt-wrap coating">
				<h2><?php the_field('division_3_name');?></h2>
				<h3><?php the_field('division_3_title');?></h3>
				<p><?php the_field('division_3_description');?></p>
				<?php 
					$link = get_field('division_3_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="arrow-right-button green" href="<?php echo esc_url( $link_url );?>" target="<?php echo esc_attr( $link_target ); ?>"> 
							<span class="btn-icon">
								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line x1="4" y1="12" x2="18" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
								<polyline points="13,6 19,12 13,18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
								</svg>
							</span>
							<span class="btn-text condensed"><?php echo esc_html( $link_title ); ?></span>
						</a>
 				<?php endif; ?>
			</div>
		</div>
	</div><!--divisions-->
	<div id="our-philosophy">
		<div class="philosophy-text">
			<?php if ( get_field('small_title') ) : ?>
    			<h2><?php the_field('small_title'); ?></h2>
			<?php endif; 
			if ( get_field('section_headline') ) : ?>
    			<h3><?php the_field('section_headline');?></h3>
			<?php endif; 
			if ( get_field('section_text') ) : ?>
    			<?php the_field('section_text');?>
			<?php endif; ?>
			<div class="stats-wrap">
				<div class="stat">
					<span class="stat-lg"><?php the_field('stat_1_lg');?></span>
					<span class="stat-sm"><?php the_field('stat_1_sm');?></span>
				</div>
				<div class="stat">
					<span class="stat-lg"><?php the_field('stat_2_lg');?></span>
					<span class="stat-sm"><?php the_field('stat_2_sm');?></span>
				</div>
			</div>
		</div>
		<div class="philosophy-img" style="background-image:url('<?php the_field('section_image');?>');"> 
		</div>
	</div>
</main>

<?php get_footer(); ?>

 