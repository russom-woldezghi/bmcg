<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */

get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="wrap" class="clearfix">
  <div id="page-heading">
    <h1><?php the_title(); ?></h1>		
</div><!-- END page-heading -->
<div class="post clearfix">
    <div class="clearfix">	
    	<?php
    	the_content();
		//comments_template(); ?>  
	</div><!-- END entry -->
</div><!-- END post -->

<?php endwhile; endif; get_sidebar(); ?>

</div>
<?php get_footer(); ?>