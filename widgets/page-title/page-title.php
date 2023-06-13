<?php

/**
 * Título Página 500D class.
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

namespace fhdesignsElementorWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Titulo_Pagina_Usmcl widget class.
 *
 * @since 1.0.0
 */
class Page_title_500D extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		// // wp_register_style( 'your-style', plugins_url( '/assets/css/your-style.css', ELEMENTOR_AWESOMESAUCE ), array(), '1.0.0' );
		// // wp_register_script( 'your-script', plugins_url( '/assets/js/your-script.js', ELEMENTOR_AWESOMESAUCE ), array(), '1.0.0' );
	}

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'titulo-pagina-500desings';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Page Title 500D', 'fhdesigns-elementor-widgets' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-site-title';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( '500designs' );
	}
	
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 'your-style' );
	}

	/**
	 * Enqueue scripts.
	 */
	public function get_script_depends() {
		return array( 'your-script' );
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

        $this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Content', 'fhdesigns-elementor-widgets' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'title',
            [
                'label' => __( 'Título', 'fhdesigns-elementor-widgets' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => '500 Designs',
                'placeholder' => __( 'Ingrese el título de la página', 'fhdesigns-elementor-widgets' ),
            ]
        );
    
        $this->end_controls_section();
    }

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();

        echo  "<h1 class='title-500d'>".$settings['title']."</h1>";
        

    }

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {

	}
}
?>
