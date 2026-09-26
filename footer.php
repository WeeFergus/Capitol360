		<footer>
			<div class="footer-grid">
				<div id="footer-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="/wp-content/uploads/2026/09/capital360_logo_reversed.svg" alt="Capital 360 Logo" />
					</a>
					<p><?php echo the_field('under_logo', 'options');?></p>
				</div>
				<div id="divisions-menu">
					<p class="footer-menu-title">Our Divisions</p>
					<ul>
						<li><a href="/roofing">Roofing Division</a></li>
						<li><a href="/flooring">Flooring Division</a></li>
						<li><a href="/coating">Coating Division</a></li>
					</ul>
				</div>
				<div id="contact-cta">
					<p class="footer-menu-title">Contact Us</p>
					<a href="tel:717-442-0979"><i class="fa-solid fa-phone"></i> 717-442-0979</a>
					<br>
					<a href="tel:717-442-0979"><i class="fa-solid fa-envelope"></i> contact@capitalcoating.com</a>
				</div>
			</div>
			<div id="subfooter">
				<span class="copyright">© 2026 Capital 360 Inc. All rights reserved.</span>
			</div>		
		</footer> 
		<?php wp_footer(); ?>
	</body>
</html>
