<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */

get_header(); ?>
<div id="page-heading">
	<h1><?php echo single_term_title( ); ?></h1>
	<?php if ( term_description() !== '' ) { ?>
		<div id="archive-description"><?php echo term_description( ); ?></div>
	<?php } ?>
</div><!-- END page-heading -->
<div id="wrap" class="clearfix">
<div id="post" class="post clearfix">   
	<?php
	if (have_posts()) : 
		get_template_part( 'loop' , 'entry');               	     
		if ( function_exists("pagination") ) pagination();
	endif; ?>
</div><!-- END post -->


<?php get_sidebar(); //get sidebar template ?>
 </div>
<?php get_footer(); //get template footer ?>