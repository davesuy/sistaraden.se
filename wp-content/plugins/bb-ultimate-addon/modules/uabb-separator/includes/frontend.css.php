<?php
/**
 *  UABB Separator Module front-end CSS php file
 *
 *  @package UABB Separator Module
 */

?>

<?php
	$version_bb_check = UABB_Compatibility::check_bb_version();
	$settings->color  = uabb_theme_base_color( UABB_Helper::uabb_colorpicker( $settings, 'color' ) );
	$settings->height = ( '' != trim( $settings->height ) ) ? $settings->height : '1';
	$settings->width  = ( '' != trim( $settings->width ) ) ? $settings->width : '100';
?>
.fl-node-<?php echo $id; ?> .uabb-separator {
	border-top:<?php echo $settings->height; ?>px <?php echo $settings->style; ?> <?php echo $settings->color; ?>;
	<?php if ( ! $version_bb_check ) { ?>
		width: <?php echo $settings->width; ?>%;
	<?php } else { ?>
		width: <?php echo $settings->width . $settings->width_unit; ?>;
	<?php } ?>
	display: inline-block;
}
.fl-node-<?php echo $id; ?> .uabb-separator-parent {
	text-align: <?php echo $settings->alignment; ?>;
}
