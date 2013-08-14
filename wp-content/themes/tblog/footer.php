<?php
/**
 * @package WordPress
 * @subpackage TBLOG Theme
 */
global $data; //get theme options
?>

<div class="clear"></div>
	<div id="footer" class="clearfix">
    	<div id="inner-footer" class="clearfix">
        <div id="copyright" class="one-half">
            &copy; <?php echo date('Y'); ?> // <a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ) ?></a>
        </div>
        <div id="backtop" class="one-half column-last">
            <?php if(!empty($data['coyright_footer'])) { ?>
				<?php echo $data['coyright_footer']; ?> 
			<?php } ?>   
        </div>
    </div><!-- END inner-footer -->
</div><!-- END footer -->
<?php if(!empty($data['tracking_footer'])) { ?>
	<?php echo $data['tracking_footer']; ?>
<?php } ?>  

<?php wp_footer(); ?>
<script>

	$( function()
	{
		$( '#nav li:has(ul)' ).doubleTapToGo();
	});

</script>
</body>
</html>