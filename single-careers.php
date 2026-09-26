<?php
/**
 * The template for displaying single career posts
 * Post Type: Career
 */

get_header(); ?>
<div id="hero">
  <div class="hero-content">
  <p class="sm-caps">Capital 360</p>
  <h1 class="compressed italic">Careers</h1>
  </div>
</div>
<main id="primary" class="site-main">
    <div id="return">
       <a href="/careers/" alt="return to careers page"><svg xmlns="http://www.w3.org/2000/svg" width="11.522" height="18.685" viewBox="0 0 11.522 18.685">
  <path id="keyboard_arrow_down_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24" d="M249.342-628.478,240-637.82l2.18-2.18,7.163,7.162L256.5-640l2.18,2.18Z" transform="translate(-628.478 -240) rotate(90)" fill="#d28028"/>
</svg> More Careers</a>
</div>    

    <?php if ( has_term( 'roofing', 'division', get_the_ID() ) ) :
      echo '<div class="career-single-container roofing">';
    elseif ( has_term( 'coatings', 'division', get_the_ID() ) ) :
      echo '<div class="career-single-container coatings">';
    elseif ( has_term( 'flooring', 'division', get_the_ID() ) ) :
      echo '<div class="career-single-container flooring">';
    else :
      echo '<div class="career-single-container undefined">';
    endif; ?>
    
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php
                $job_description = get_field('job_description');
                ?>
                <h2><?php the_title();?></h2>
                <p class="division"><strong>
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
                  </strong>
                </p>
                <p><?php echo the_field('job_description');?></p>
                <?php if( have_rows('career_details') ):
                    while( have_rows('career_details') ) : the_row();
                        $section_title = get_sub_field('career_section_title');
                        $section_content = get_sub_field('career_section_content');
                        echo '<h3>' . $section_title . '</h3>';
                        echo $section_content;
                    endwhile;
                endif;?>
            </article>
        <?php endwhile; ?>
    </div>
     <div id="apply" class="
        <?php if ( has_term( 'roofing', 'division', get_the_ID() ) ) :
	        echo 'roofing';
        elseif ( has_term( 'coatings', 'division', get_the_ID() ) ) :
	        echo 'coatings';
        elseif ( has_term( 'flooring', 'division', get_the_ID() ) ) :
	        echo 'flooring';
        elseif ( has_term( 'administrative', 'division', get_the_ID() ) ) :
          echo 'roofing';
        endif; ?>
        ">
        <div class="apply-text">
             <h3>Interested in this Position?</h3>
             <a class="arrow-right-button-white" href="<?php echo esc_url( $link_url );?>" target="<?php echo esc_attr( $link_target ); ?>"> 
                <span class="btn-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="4" y1="12" x2="18" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <polyline points="13,6 19,12 13,18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                    </svg>
                </span>
                <span class="btn-text condensed"><?php echo esc_html( $link_title ); ?></span>
            </a>
         </div>  

    </div>
</main>

<?php 
 
get_footer();
