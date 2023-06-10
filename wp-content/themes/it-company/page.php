<?php
/**
 * The template for displaying all pages.
 * @package IT Company
 */
get_header(); ?>

<?php do_action('it_company_page_header'); ?>

<main id="maincontent" role="main">
    <div class="innerlightbox">
        <div class="container">
            <div class="feature-box">
                <div class="bradcrumbs">
                    <?php it_company_the_breadcrumb(); ?>
                </div>
            </div> 
            <?php $page_layout = get_theme_mod( 'it_company_single_page_layout','One Column');
            if($page_layout == 'One Column'){ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="title-box">
                		<h1><?php esc_html(the_title()); ?></h1>
                    </div>
                    <div id="wrapper">
                        <div class="main-wrap-box"> 
                            <div class="feature-box">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <?php the_content(); ?> 
                            <?php wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'it-company' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span class="page-number">',
                                'link_after'  => '</span>',
                                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'it-company' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                            )   ); ?>       
                            <div class="clear"></div>    
                        </div>
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        ?>
                    </div>
                <?php endwhile; // end of the loop. 
                wp_reset_postdata();?>
            <?php }else if($page_layout == 'Left Sidebar'){ ?>
                <div class="row">
                    <div  id="sidebar" class="col-lg-3 col-md-4">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="title-box">
                                <h1><?php esc_html(the_title()); ?></h1>
                            </div>
                            <div id="wrapper">
                                <div class="main-wrap-box">
                                    <div class="feature-box">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <?php the_content(); ?> 
                                    <?php wp_link_pages( array(
                                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'it-company' ) . '</span>',
                                        'after'       => '</div>',
                                        'link_before' => '<span class="page-number">',
                                        'link_after'  => '</span>',
                                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'it-company' ) . ' </span>%',
                                        'separator'   => '<span class="screen-reader-text">, </span>',
                                    )   ); ?>       
                                    <div class="clear"></div>    
                                </div>
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) {
                                        comments_template();
                                    }
                                ?>
                            </div>
                        <?php endwhile; // end of the loop. 
                        wp_reset_postdata();?>
                    </div>
                </div>
            <?php }else if($page_layout == 'Right Sidebar'){ ?>
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="title-box">
                                <h1><?php esc_html(the_title()); ?></h1>
                            </div>
                            <div id="wrapper">
                                <div class="main-wrap-box"> 
                                    <div class="feature-box">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <?php the_content(); ?> 
                                    <?php wp_link_pages( array(
                                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'it-company' ) . '</span>',
                                        'after'       => '</div>',
                                        'link_before' => '<span class="page-number">',
                                        'link_after'  => '</span>',
                                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'it-company' ) . ' </span>%',
                                        'separator'   => '<span class="screen-reader-text">, </span>',
                                    )   ); ?>       
                                    <div class="clear"></div>    
                                </div>
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) {
                                        comments_template();
                                    }
                                ?>
                            </div>
                        <?php endwhile; // end of the loop. 
                        wp_reset_postdata();?>
                    </div>
                    <div  id="sidebar" class="col-lg-3 col-md-4">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</main>

<?php do_action('it_company_page_left_footer'); ?>

<?php get_footer(); ?>