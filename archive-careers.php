<?php
/**
 * The template for displaying the career archives
 */

get_header(); ?>
<div id="archives-hero">
  <div class="hero-content">
  <p class="sm-caps">Capital 360</p>
  <h1 class="compressed italic">Careers</h1>
  </div>
</div>

<div id="careers-intro-grid">
    <div class="careers-intro">
        <p><?php echo the_field('career_page_intro', 'options');?></p>
    </div>
</div>


    <?php if (have_posts()) : ?>
      <div id="careers-wrap">
        <div class="careers-title-wrap">
          <h2>Current Opportunities</h2>
        </div>  
        <div class="archive-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $field = get_field_object('full_part_time');
                $full_part_time_label = $field && $field['value'] ? $field['choices'][$field['value']] : '';
                ?>
                <div class="job-post">
                    <div class="job-description">
                        <?php if ( has_term( 'roofing', 'division', get_the_ID() ) ) :
                            echo '<h3 class="career-title roofing">';
                            $division = 'roofing';
                            elseif ( has_term( 'coatings', 'division', get_the_ID() ) ) :
                            echo '<h3 class="career-title coatings">';
                            $division = 'coating';
                            elseif ( has_term( 'flooring', 'division', get_the_ID() ) ) :
                            echo '<h3 class="career-title flooring">';
                            $division = 'flooring';
                            else :
                            echo '<h3 class="career-title undefined">';
                            $division = 'undefined';
                            endif; 
                        ?>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="career-employment-type">
                        <?php 
                            $field = get_field_object('career_full_part');
                            $label = $field['value'] ? $field['choices'][$field['value']] : '';
                            if($field) {
                            echo $label . '&nbsp;|&nbsp;';
                        }?>
                        <?php 
                            $field = get_field_object('career_division');
                            $label = $field['value'] ? $field['choices'][$field['value']] : '';
                            if($field) {
                            echo $label;
                        }?>
                        </p>
                        <div class="career-excerpt">
                            <p>
                                <?php $job_description = get_field('job_description'); // gets the ACF field for the current post in the loop
                                if ( $job_description ) {
                                    echo wp_trim_words( $job_description, 20, '...' );
                                }
                                ?>
                        </p>
                    </div>
                </div>
               <div class="position-link">
    <?php
        if ( $division === 'roofing' ) {
            echo '<a class="arrow-right-button rust"';
        } elseif ( $division === 'flooring' ) {
            echo '<a class="arrow-right-button orange"';
        } elseif ( $division === 'coatings' || $division === 'undefined' ) {
            echo '<a class="arrow-right-button green"';
        } else {
            echo '<a class="arrow-right-button green"';
        }
    ?> 
    href="<?php the_permalink(); ?>"> 
        <span class="btn-icon">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="4" y1="12" x2="18" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            <polyline points="13,6 19,12 13,18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
            </svg>
        </span>
        <span class="btn-text condensed">Learn More</span>
    </a>     
</div>
            </div>
            <?php endwhile; ?>
        </div>
        </div>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p>No career opportunities are currently available.</p>
    <?php endif; ?>

 

<?php 
 
get_footer();
