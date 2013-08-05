<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */
get_header(); ?>
<div id="page-heading">
		<?php
        if(isset($_GET['author_name'])) :
        $curauth = get_userdatabylogin($author_name);
        else :
        $curauth = get_userdata(intval($author));
        endif; ?>
        <h1><?php _e('Posts by','TBLOG'); ?>: <?php echo $curauth->nickname; ?></h1>		
</div><!-- END page-heading -->
<div id="wrap" class="clearfix">
<div id="post" class="post clearfix">
      
	<?php
    if (have_posts()) : 
		get_template_part('loop', 'entry');
		if (function_exists("pagination")) pagination();
	endif; ?>
</div><!-- END #post -->

<?php get_sidebar(); //get sidebar template ?>
 </div>
<?php get_footer(); //get template footer ?>