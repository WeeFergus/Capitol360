<?php
/**
 * Template Name: Blog
 *
 * @package cap360
 */

get_header(); ?>


<div id="hero">
  <div class="hero-content">
  <p class="sm-caps">Capital 360</p>
  <h1 class="compressed italic">Blogs</h1>
  </div>
</div>

<main> 
	<div class="two-col-wrap">
	<div class="two-col-grid">
		<div>
			<h2><?php echo the_field('intro_title')?></h2>
		</div>
		<div>
			<p class="intro-txt"><?php echo the_field('intro_text')?></p>
		</div>
		<div class="card coatings">
			<?php $image = get_field('coatings_blog_photo');
				if ($image) {
					echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
				}?>
			<div class="txt-block">
				<h3>Coating Division Blog</h3>
				 <a class="arrow-right-button green" href="<?php the_permalink(); ?>"> 
					<span class="btn-icon">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<line x1="4" y1="12" x2="18" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
						<polyline points="13,6 19,12 13,18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
						</svg>
					</span>
					<span class="btn-text condensed">Go To Blog</span>
				</a>     
			</div>	
		</div>
		<div class="card roofing">
			<?php $image = get_field('roofing_blog_photo');
				if ($image) {
					echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
				}?>
			<div class="txt-block">
				<h3>Roofing Division Blog</h3>
				 <a class="arrow-right-button rust" href="<?php the_permalink(); ?>"> 
					<span class="btn-icon">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<line x1="4" y1="12" x2="18" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
						<polyline points="13,6 19,12 13,18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
						</svg>
					</span>
					<span class="btn-text condensed">Go To Blog</span>
				</a>   
			</div>	
		</div>
	</div>
</div>
</main>

<?php get_footer(); ?>

</body>
</html>