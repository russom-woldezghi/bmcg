<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */
 
get_header(); // Loads the header.php template ?>
<div id="wrap" class="clearfix">
<div id="post" class="post clearfix">   
	<?php
	if (have_posts()) :
		get_template_part( 'loop' , 'entry');
	if ( function_exists("pagination") ) pagination();
	endif; ?>
</div><!-- END post -->
<?php get_sidebar(); ?>
</div>
<?php  get_footer(); ?>