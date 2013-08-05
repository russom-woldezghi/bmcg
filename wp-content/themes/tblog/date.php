<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */
get_header(); ?>
<div id="page-heading">
	<?php /* If this is a daily archive */ if ( is_day() ) { ?>
    	<h1><?php _e('Archive For','wdt'); ?> <?php the_time( 'F jS, Y' ); ?></h1>
    <?php /* If this is a monthly archive */ } elseif ( is_month() ) { ?>
    	<h1><?php _e('Archive For','wdt'); ?> <?php the_time( 'F, Y' ); ?></h1>
    <?php /* If this is a yearly archive */ } elseif ( is_year() ) { ?>
    	<h1><?php _e('Archive For','wdt'); ?> <?php the_time( 'Y' ); ?></h1>
    <?php } ?>
</div><!-- END page-heading -->
<div id="wrap" class="clearfix">
<div id="post" class="post clearfix">   
	<?php
    if (have_posts()) : 
		get_template_part( 'loop' , 'entry');              	     
		if ( function_exists("pagination") )pagination();
	endif; ?>
</div><!-- END post -->

<?php get_sidebar(); //get sidebar template ?>
</div>
<?php  get_footer(); //get template footer ?>