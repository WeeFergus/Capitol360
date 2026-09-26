<?php
/**
 * Template Name: About Us
 *
 * @package cap360
 */
 
get_header(); ?> <?php 
$bg_image = get_field('hero_image');?> <div id="hero" style="background-image: url('<?php echo esc_url($bg_image); ?>');">
  <div class="hero-content">
    <p class="sm-caps">Capital 360</p>
    <h1 class="compressed italic"> <?php the_title(); ?> </h1>
  </div>
</div>
<main class="experience">
  <div class="two-col">
    <div class="col">
      <h2> <?php the_field('experience_title');?> </h2>
      <p class="intro-txt"> <?php the_field('experience_intro');?> </p>
    </div>
    <div class="col">
      <p class="sm"> <?php the_field('experience_content');?> </p>
    </div> <?php 
				$link = get_field('division_1_link');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?> <a class="arrow-right-button rust" href="
			<?php echo esc_url( $link_url );?>" target="
			<?php echo esc_attr( $link_target ); ?>">
      <span class="btn-icon">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line x1="4" y1="12" x2="18" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
          <polyline points="13,6 19,12 13,18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" />
        </svg>
      </span>
      <span class="btn-text condensed"> <?php echo esc_html( $link_title ); ?> </span>
    </a> <?php endif; ?>
  </div>
  <div id="main-about-content">
    <div class="main-content-grid">
      <div class="main-content-title">
        <h2> <?php the_field('main_content_title');?> </h2>
      </div>
      <div class="main-two-col">
        <div class="main-col"> <?php the_field('main_content');?> </div>
        <div class="main-col">
          <div id="jobsite-slider" class="js-slider" aria-roledescription="carousel" aria-label="Project photo slider">
            <div class="js-viewport">
              <div class="js-track">
				<?php 
				$rows = get_field('image_carousel');
				$total_slides = is_array($rows) ? count($rows) : 0;
				$slide_number = 1;
				
				if( have_rows('image_carousel') ): 
					while( have_rows('image_carousel') ): the_row(); 
						$image = get_sub_field('carousel_image'); // array format
						$image_url = $image['url'];
						$alt_text = $image['alt'];
					?>
					<div class="js-slide" aria-roledescription="slide" aria-label="<?php echo $slide_number; ?> of <?php echo $total_slides; ?>"> 
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>">
					</div>
					<?php $slide_number++; ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
            <div class="js-controls">
              <div class="js-dots" role="tablist" aria-label="Slide navigation"></div>
              <div class="js-arrows">
                <button type="button" class="js-arrow js-arrow-prev" aria-label="Previous slide">
                  <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                  </svg>
                </button>
                <button type="button" class="js-arrow js-arrow-next" aria-label="Next slide">
                  <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
<div id="philosophy">
  <div class="bkgnd"></div>
  <div class="two-col-wrap">
    <div class="col-1"> <?php if ( get_field('our_philosophy_title') ) : ?> <h2 class="h3"> <?php the_field('our_philosophy_title'); ?> </h2> <?php endif; 
			if ( get_field('our_philosophy_content') ) : ?> <p> <?php the_field('our_philosophy_content');?> </p> <?php endif; ?> </div>
    <div class="col-2"> <?php if ( get_field('contact_title') ) : ?> <h2 class="h3"> <?php the_field('contact_title'); ?> </h2> <?php endif; 
			if ( get_field('contact_content') ) : ?> <?php the_field('contact_content');?> <?php endif; ?> <a class="arrow-right-button orange" href="/contact" target="
								<?php echo esc_attr( $link_target ); ?>">
        <span class="btn-icon">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="4" y1="12" x2="18" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            <polyline points="13,6 19,12 13,18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" />
          </svg>
        </span>
        <span class="btn-text condensed">Contact Us</span>
      </a>
    </div>
  </div>
</div> 
<?php get_footer(); ?> 
<script>
  (function() {
    document.querySelectorAll('.js-slider').forEach(function(root) {
      const viewport = root.querySelector('.js-viewport');
      const track = root.querySelector('.js-track');
      const dotsWrap = root.querySelector('.js-dots');
      const realSlides = Array.from(track.children);
      const count = realSlides.length;
      if (count < 2) return; // nothing to slide
      // Clone first and last slide for a seamless infinite loop.
      const firstClone = realSlides[0].cloneNode(true);
      const lastClone = realSlides[count - 1].cloneNode(true);
      firstClone.setAttribute('aria-hidden', 'true');
      lastClone.setAttribute('aria-hidden', 'true');
      track.appendChild(firstClone);
      track.insertBefore(lastClone, track.firstChild);
      let index = 1; // start on the first real slide (position 1, since clone sits at 0)
      let isTransitioning = false;

      function setPosition(withTransition) {
        track.style.transition = withTransition ? '' : 'none';
        track.style.transform = 'translateX(' + (-index * 100) + '%)';
      }
      // Build dots (one per real slide).
      const dots = realSlides.map(function(_, i) {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'js-dot';
        dot.setAttribute('role', 'tab');
        dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
        dot.addEventListener('click', function() {
          goTo(i + 1);
        });
        dotsWrap.appendChild(dot);
        return dot;
      });

      function updateDots() {
        const realIndex = ((index - 1) + count) % count;
        dots.forEach(function(d, i) {
          d.classList.toggle('is-active', i === realIndex);
        });
      }

      function goTo(newIndex) {
        if (isTransitioning) return;
        isTransitioning = true;
        index = newIndex;
        setPosition(true);
        updateDots();
      }
      track.addEventListener('transitionend', function() {
        isTransitioning = false;
        // Jump invisibly when we've landed on a clone, so the loop is endless.
        if (index === 0) {
          index = count;
          setPosition(false);
        } else if (index === count + 1) {
          index = 1;
          setPosition(false);
        }
      });

      function next() {
        goTo(index + 1);
      }

      function prev() {
        goTo(index - 1);
      }
      root.querySelector('.js-arrow-next').addEventListener('click', function() {
        next();
      });
      root.querySelector('.js-arrow-prev').addEventListener('click', function() {
        prev();
      });
      // Basic swipe support for touch devices.
      let startX = 0;
      viewport.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
      }, {
        passive: true
      });
      viewport.addEventListener('touchend', function(e) {
        const dx = e.changedTouches[0].clientX - startX;
        if (dx > 40) prev();
        else if (dx < -40) next();
      }, {
        passive: true
      });
      setPosition(false);
      updateDots();
    });
  })();
</script>