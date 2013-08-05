<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */

get_header(); ?>

<div id="page-heading">
	<?php
        $term =	$wp_query->queried_object;
        echo '<h1 class="page-title">'.$term->name.'</h1>';
    ?>		
</div>

<div id="wrap" class="clearfix">

<?php if (have_posts()) : ?>
    
	<div class="post full-width clearfix">

        <div id="portfolio-description">
             <?php echo category_description( ); ?>
        </div> 
        
        <div id="portfolio-wrap" class="clearfix">
    
			<?php
            while (have_posts()) : the_post();
            $thumbail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-thumb');
            if ( has_post_thumbnail() ) {  ?>
                <div class="portfolio-item <?php if($count == '4') { echo 'no-margin'; } ?>">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $thumbail[0]; ?>" height="<?php echo $thumbail[2]; ?>" width="<?php echo $thumbail[1]; ?>" alt="<?php echo the_title(); ?>" />
                    <span class="portfolio-item-overlay"><h3><?php echo the_title(); ?></h3></span>
                    </a>
                </div>
            <?php } 
            endwhile; ?>
          
    	</div>
    
	<?php
    if (function_exists("pagination")) pagination(); ?>
	</div>
  </div>  
<?php
endif; 
get_footer(); ?>