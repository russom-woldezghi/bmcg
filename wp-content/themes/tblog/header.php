<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */
global $data; //get theme options
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
<?php if(!empty($data['custom_favicon'])) { ?>
	<link rel="icon" type="image/png" href="<?php echo $data['custom_favicon']; ?>" />
<?php } ?>   
<!-- WP Head -->
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<div id="header" class="clearfix">
        <div id="logo">
        	<?php
            	if(!empty($data['custom_logo'])) { ?>
					<a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo $data['custom_logo'];; ?>" alt="<?php bloginfo( 'name' ) ?>" /><?php bloginfo( 'name' ) ?></a>
			 	<?php } else { ?>
            	<a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ) ?></a>
            <?php } ?>
            <span class="description"><?php bloginfo( 'description' ); ?></span>
            
        </div><!-- END logo -->
     
 
     <?php if(!empty($data['custom_logo'])) { ?>
        <link rel="icon" type="image/png" href="<?php echo $data['custom_logo']; ?>" />
    <?php } ?>
    


        <!-- BEGIN #navigation -->
        <nav id="nav" role="navigation">
          <a href="#nav" title="Show navigation">Show navigation</a>
            <a href="#" title="Hide navigation">Hide navigation</a>
             <?php
            //define main navigation
              wp_nav_menu(array(
                'theme_location'  => 'menu',
                'container'       => '',
                'items_wrap'      => '<ul id="nav" class="%2$s">%3$s</ul>'
                ));
          ?>
			<div class="clearfix"></div>
          <!-- END #navigation -->
        </nav>
            
  
        
</div><!-- END header -->