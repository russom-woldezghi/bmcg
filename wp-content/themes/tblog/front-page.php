<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */

get_header(); ?>

        <div class="front-page-content-main">
          <div class="inner-front-page-content-main">
            <?php if(!empty($data['h1_tagline'])) { ?>
                <?php echo $data['h1_tagline']; ?>
            <?php } ?>   
            <?php if(!empty($data['message_tagline'])) { ?>
                <?php echo $data['message_tagline']; ?>
            <?php } ?> 
          </div>
        </div>

<!--<div id="wrap" class="clearfix">
<div class="home-wrap clearfix">
	<div id="home" class="clearfix">

	<?php
	if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
	} else if ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	query_posts( array( 'post_type' => 'portfolio', 'paged' => $paged, 'posts_per_page' => 9 ) );

	if ( have_posts() ) :
	
		// Show category filter
		$cats = get_terms('portfolio_cats');
		if($cats[1] !='') { ?> 
         Portfolio Filter 
        <ul id="portfolio-cats" class="filter clearfix">
            <li><a href="#all" rel="all" class="active"><span><?php _e('All', 'TBLOG'); ?></span></a></li>
            <?php
            foreach ($cats as $cat ) : ?>
            <li> / <a href="#<?php echo $cat->slug; ?>" rel="<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a></li>
            <?php endforeach; ?>
        </ul>
        
		<?php } ?>
    
        <div id="portfolio-wrap" class="clearfix">
                <ul class="portfolio-content">
                    <?php
                    $count=0;
                    while (have_posts()) : the_post();
                    $count++;
                    $thumbail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-thumb');
                    $terms = get_the_terms( get_the_ID(), 'portfolio_cats' );
                    $terms_list = get_the_term_list( get_the_ID(), 'portfolio_cats' );
					
					if ( has_post_thumbnail() ) {  ?>
                        <li data-id="id-<?php echo $count; ?>" data-type="<?php if($terms) { foreach ($terms as $term) { echo $term->slug .' '; } } else { echo 'none'; } ?>" class="portfolio-item entry">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $thumbail[0]; ?>" height="<?php echo $thumbail[2]; ?>" width="<?php echo $thumbail[1]; ?>" alt="<?php echo the_title(); ?>" />
                        <span class="portfolio-item-overlay"><h3><?php echo the_title(); ?></h3></span>
						<span class="magnifier"></span>

                        </a>
                        
    
                        </li>
                    <?php }
					endwhile; ?>
                </ul>
            </div>
        
        </div> END #home       	

	<?php
    pagination();
	wp_reset_query();
	endif; ?>


</div> END home-wrap    
</div>-->
<?php get_footer(); ?>
