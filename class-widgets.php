<?php
/**
 * Widgets class.
 * 
 * @category   Class
 * @package    fh500ElementorWidgets
 * @subpackage WordPress
 * @author     Devteam <dev@500designs.com>
 * @copyright  2023 500Designs
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.500designs.com/,
 *             500 Designs)
 * @since      1.0.0
 * php version 7.3.9
 */

namespace fhdesignsElementorWidgets;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.0.0
 */
class Widgets {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * widget_styles
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
    
	public function widget_styles() {
        
		wp_register_style( '500D-global-css', plugins_url( '/assets/css/global.css', FHDESIGNS_ELEMENTOR_WIDGETS ), array(), FHDESIGNS_ELEMENTOR_WIDGETS_VERSION );
        wp_register_style( 'Font-Awesome', plugins_url( '/assets/libs/fontawesome/css/all.min.css', FHDESIGNS_ELEMENTOR_WIDGETS ), array(), FHDESIGNS_ELEMENTOR_WIDGETS_VERSION );

        
		wp_enqueue_style( '500D-global-css');
	}
    

    
    
    //add_action('wp_print_styles', 'widget_styles');
    
	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts() {
        


		wp_register_script( 'Main-js', plugins_url( '/assets/js/main.js', FHDESIGNS_ELEMENTOR_WIDGETS ), [ 'jquery' ], FHDESIGNS_ELEMENTOR_WIDGETS_VERSION, true );
        //wp_register_script( 'bodymovin2', plugins_url( 'widgets/assets/js/bodymovin.js', FHDESIGNS_ELEMENTOR_WIDGETS ), [ 'jquery' ], FHDESIGNS_ELEMENTOR_WIDGETS_VERSION, true );
        //wp_enqueue_script( 'bodymovin2', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.2/lottie.min.js');
        
        wp_enqueue_script("jquery");
        //wp_enqueue_script( 'Boostrap-js');
        //wp_enqueue_script( 'Owlcarousel-js');
        wp_enqueue_script( 'Main-js');
        //wp_enqueue_script( 'bodymovin2');
        
	}



	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files() {

        require_once 'widgets/page-title/page-title.php';
        require_once 'widgets/2colsticky/2colsticky.php';
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {
		// It's now safe to include Widgets files.
		$this->include_widgets_files();
        
		// Register the plugin widget classes.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Page_title_500D() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Colsticky500D() );
		
	}

    public function register_categories( $elements_manager ) {

        $elements_manager->add_category(
            '500designs',
            [
                'title' => __( '500 Designs', 'fhdesigns-elementor-widgets' ),
                'icon' => 'fa fa-plug',
            ]
        );
    
    }
    
	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		// Register widget Styles
		add_action( 'elementor/frontend/after_register_styles', array( $this, 'widget_styles' ) );
        
		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
        
        // Se agrega y registra la categoría de 500 Designs dentro de las categorías de Elementor
        add_action( 'elementor/elements/categories_registered', array( $this, 'register_categories' ) );
        
		// Register the widgets.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}
}

// Instantiate the Widgets class.
Widgets::instance();

