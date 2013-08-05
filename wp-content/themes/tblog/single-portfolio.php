<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */

get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>
    <div id="single-portfolio-nav" class="clearfix"> 
		<div id="single-nav-left"><?php next_post_link('%link', '&larr; Next', FALSE); ?></div>
		<div id="single-nav-right"><?php previous_post_link('%link', 'Previous &rarr;', FALSE); ?></div>
	</div>
</div>

<div id="wrap" class="clearfix">
<div class="post full-width clearfix">
	<div id="single-portfolio" class="clearfix">

		<div id="single-portfolio-left">
			<?php the_content(); ?>
            <div class="clear"></div>
            <?php
			// Show categories
			$terms = get_the_term_list( get_the_ID(), 'portfolio_cats' );
			if($terms) { ?>
            <div id="single-portfolio-meta" class="clearfix">
            <h4><?php _e('Project Category','TBLOG'); ?></h4>
            	<?php echo $terms; ?>
            </div>
            <?php } ?>
            
            
        </div><!-- END single-portfolio-left -->
        
        <div id="single-portfolio-right">
       		<div class="drop-shadow curved curved-hz-1">
                <div class="slides_container">
					<?php
                    //get attachement count
                    $get_attachments = get_children( array( 'post_parent' => $post->ID ) );
                    $attachments_count = count( $get_attachments );
                    $thumb_ID = get_post_thumbnail_id( $post->ID ); //set current featured image ID
                    $feat_full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size');; // featured image full size ?>
                    <div class="slide">
                        <a href="<?php echo $feat_full_img[0]; ?>" title="<?php the_title(); ?>" <?php if($attachments_count =='1') { echo 'class="prettyphoto-link"'; } else { echo 'rel="prettyPhoto[gallery]"'; } ?>><?php the_post_thumbnail('portfolio-single'); ?></a>
                    </div><!-- END slide -->
                    <?php   
                    //attachement loop
                    $args = array(
                        'orderby' => 'menu_order',
                        'post_type' => 'attachment',
                        'post_parent' => get_the_ID(),
                        'post_mime_type' => 'image',
                        'post_status' => null,
                        'posts_per_page' => -1,
                        'exclude' => $thumb_ID
                    );
                    $attachments = get_posts($args);
                    
                    //start loop
                    foreach ($attachments as $attachment) :
                    
                    //get images
                    $full_img = wp_get_attachment_image_src( $attachment->ID, 'full-size');
                    $portfolio_single = wp_get_attachment_image_src( $attachment->ID, 'portfolio-single'); ?>
                        <div class="slide">
                            <a href="<?php echo $full_img[0]; ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" <?php if($attachments_count == '1') { echo 'class="prettyphoto-link"'; } else { echo 'rel="prettyPhoto[gallery]"'; } ?>><img src="<?php echo $portfolio_single[0]; ?>" height="<?php echo $portfolio_single[2]; ?>" width="<?php echo $portfolio_single[1]; ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" /></a>
                        </div><!-- END slide -->
                    <?php endforeach; ?>
                </div><!-- END slides_container -->
		</div><!-- END single-right -->        
	</div><!-- END drop-shadow -->
</div><!-- END single-portfolio -->
</div><!-- END post -->
</div>   
<?php
endwhile; endif;
get_footer(); ?>      