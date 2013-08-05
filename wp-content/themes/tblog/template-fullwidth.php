<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 * Template Name: Full-Width
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="page-heading">
    <h1><?php the_title(); ?></h1>		
</div>

<div id="wrap" class="clearfix">
<div class="post full-width clearfix">
<?php the_content(); ?>
<?php comments_template(); ?>
</div>
<!-- END .post -->

<?php endwhile; ?>
<?php endif; ?>
</div>
<?php  get_footer(); ?>