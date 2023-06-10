<?php
/**
 * Template Name: Custom home page
 */
get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action('it_company_above_slider_section'); ?>

  <?php if(get_theme_mod('it_company_slider_display_option','frontpage') == 'frontpage' || get_theme_mod('it_company_slider_display_option') == 'both'){ ?>
    <?php get_template_part( 'template-parts/slider/slider'); ?>
  <?php }?>

  <?php do_action('it_company_below_slider_section'); ?>

  <?php if( get_theme_mod('it_company_page_title') != ''){ ?>
    <section id="about">
      <div class="container">
        <?php if( get_theme_mod('it_company_page_title') != ''){ ?>
          <div class="text-center">
            <h2><?php echo esc_html(get_theme_mod('it_company_page_title','')); ?></h2>
          </div>
        <?php }?>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <?php 
              $it_company_catData=  get_theme_mod('it_company_category');
              if($it_company_catData){
                $page_query = new WP_Query(array( 'category_name' => esc_html( $it_company_catData ,'it-company')));?>
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="right-part">
                  <div class="row m-0"> 
                    <div class="col-lg-3 col-md-3">
                      <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                    </div>
                    <div class="col-lg-9 col-md-9 p-0">
                      <h3><?php esc_html(the_title()); ?></h3>     
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( it_company_string_limit_words( $excerpt,10 ) ); ?></p>
                      <span><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('KNOW MORE','it-company'); ?><i class="fas fa-angle-double-right"></i><span class="screen-reader-text"><?php esc_html_e('KNOW MORE','it-company'); ?></span></a></span>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <?php endwhile;
                wp_reset_postdata();   
              }       
            ?>
          </div>
          <div class="col-lg-4 col-md-4">
            <?php
            $it_company_postData1 =  get_theme_mod('it_company_about_setting');
            if($it_company_postData1){
              $args = array( 'name' => esc_html($it_company_postData1 ,'it-company'));
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div class="abt-image">
                    <?php the_post_thumbnail(); ?>         
                  </div>    
                <?php endwhile; 
                wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php
            endif; }?>
          </div>
          <div class="col-lg-4 col-md-4">
            <?php 
              $it_company_catData=  get_theme_mod('it_company_category1');
              if($it_company_catData){
              $page_query = new WP_Query(array( 'category_name' => esc_html($it_company_catData,'it-company')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="left-part">
                <div class="row m-0"> 
                  <div class="col-lg-3 col-md-3">
                    <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                  </div>
                  <div class="col-lg-9 col-md-9 p-0">
                    <h3><?php esc_html(the_title()); ?></h3>     
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( it_company_string_limit_words( $excerpt,10 ) ); ?></p>
                    <span><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('KNOW MORE','it-company'); ?><i class="fas fa-angle-double-right"></i><span class="screen-reader-text"><?php esc_html_e('KNOW MORE','it-company'); ?></span></a></span>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <?php endwhile;
              wp_reset_postdata();  
              }        
            ?>  
          </div>
        </div>
        <div class="clearfix"></div> 
      </div>
    </section>
  <?php }?>

  <?php do_action('it_company_after_about_section'); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>