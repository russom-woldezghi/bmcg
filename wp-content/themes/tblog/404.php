<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */

get_header(); ?>
<div id="page-heading">
    <h1 class="page-title"><?php _e('404 Error','TBLOG'); ?></h1>		
</div><!-- END page-heading -->
<div id="wrap" class="clearfix">
<div class="post clearfix">

<div class="clearfix">		
	<p><?php _e('Sorry, the page you were looking for could not be found.','TBLOG'); ?>.</p>
</div><!-- END entry -->

</div><!-- END post -->

<?php get_sidebar(); ?>
</div>
<?php  get_footer(); ?>