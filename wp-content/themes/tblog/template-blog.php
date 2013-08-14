<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 * Template Name: Blog
 */
get_header();

if (have_posts()) : while (have_posts()) : the_post(); ?>

    
    
<div id="wrap" class="clearfix">
  <div id="page-heading">
        <h1><?php the_title(); ?></h1>		
    </div>
<?php endwhile; endif; ?>

<div class="post clearfix">

  	<?php
    	the_content();
		?>  
  
	<?php
	//query posts
	query_posts(
		array(
		'post_type'=> 'post',
		'paged'=>$paged
	));
	if (have_posts()) :
		get_template_part( 'loop', 'entry');
		if (function_exists("pagination")) pagination();
	endif; ?>
</div>

<?php get_sidebar(); //get sidebar template ?>
 </div>
<?php get_footer(); //get template footer ?>