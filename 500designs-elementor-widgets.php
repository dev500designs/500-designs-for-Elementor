<?php
/**
 * 500 Designs Elementor Widgets
 *
 * @package fh500ElementorWidgets
 *
 * Plugin Name: 500 Designs Elementor Widgets
 * Description: Custom Widgets for the 500 Designs sites
 * Plugin URI:  https://www.500designs.com
 * Version:     1.0.4
 * Author:      500 Designs
 * Author URI:  https://www.500designs.com
 * Text Domain: 500design-elementor-widgets
 */


// PLUGIN UPDATER FROM GITHUB //

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/dev500designs/500-designs-for-Elementor',
	__FILE__,
	'500-designs-for-Elementor'
);

$token  = "ghp_8xSp7DTiDJ";
$token .= "mzWwjKJYpw0GeXiAm";
$token .= "8Z53xhVPN";

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication($token);


/////////////////////////////////////////////////////


define( 'FHDESIGNS_ELEMENTOR_WIDGETS', __FILE__ );
define( 'FHDESIGNS_ELEMENTOR_WIDGETS_VERSION', '1.0.4' );

/**
 * Include the Unelab_Elementor_Widgets class.
 */
require plugin_dir_path( FHDESIGNS_ELEMENTOR_WIDGETS ) . 'class-500designs-elementor-widgets.php';