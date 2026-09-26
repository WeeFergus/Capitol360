<?php
/**
 * Template Name: Contact Us
 *
 * @package cap360
 */
 
get_header();  ?>
 
<?php $bg_image = get_field('hero_image');?>  
<div id="hero" style="background-image: url('<?php echo esc_url($bg_image); ?>');">
	<div class="hero-content">
		<p class="sm-caps">Capital 360</p>
		<h1 class="compressed italic"><?php the_title(); ?></h1>
	</div>
</div>

<div id="contact-intro-grid">
    <div class="contact-intro">
		<?php if(get_field('contact_intro_subtitle')) { ?>
			<div class="intro-title">
				<h2><?php echo the_field('contact_intro_subtitle');?></h2>
			</div>
		<?php } ?>
		<div class="intro-text">
			<p><?php echo the_field('contact_intro_text');?></p>
		</div>
		<sidebar>
			<?php echo the_field('contact_sidebar');?>
		</sidebar>
	</div>
</div>


 
<main class="contact">
	<div class="form-grid">
		<div class="form-wrap">
			<?php echo do_shortcode('[gravityform id="1" title="false"]');?>
		</div>
	</div>
</main>

<?php get_footer(); ?>

 