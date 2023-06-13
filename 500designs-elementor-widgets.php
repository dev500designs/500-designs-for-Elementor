<?php
/**
 * 500 Designs Elementor Widgets
 *
 * @package fh500ElementorWidgets
 *
 * Plugin Name: 500 Designs Elementor Widgets
 * Description: Custom Widgets for the 500 Designs sites
 * Plugin URI:  https://www.unelab.com
 * Version:     1.0.0
 * Author:      500 Designs
 * Author URI:  https://www.500designs.com
 * Text Domain: 500design-elementor-widgets
 */


add_action('wp_footer', function(){
    echo 'Version: 1.0.1'
})

// PLUGIN UPDATER FROM GITHUB

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/dev500designs/500-designs-for-Elementor',
	__FILE__,
	'500-designs-for-Elementor'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('MASTER');

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('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');


/////////////////////////////////////////////////////


define( 'FHDESIGNS_ELEMENTOR_WIDGETS', __FILE__ );
define( 'FHDESIGNS_ELEMENTOR_WIDGETS_VERSION', '1.0.0' );

/**
 * Include the Unelab_Elementor_Widgets class.
 */
require plugin_dir_path( FHDESIGNS_ELEMENTOR_WIDGETS ) . 'class-500designs-elementor-widgets.php';