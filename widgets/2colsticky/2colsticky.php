<?php

namespace fhdesignsElementorWidgets\Widgets;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Typography;
use ElementorPro\Base\Base_Widget;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Colsticky500D extends \Elementor\Widget_Base {

	/**
	 * Get element name.
	 *
	 * Retrieve the element name.
	 *
	 * @return string The name.
	 * @since 2.7.0
	 * @access public
	 *
	 */

  
    
    public function __construct($data = [], $args = null) {
       parent::__construct($data, $args);
        wp_enqueue_script( 'bodymovin3', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.2/lottie.min.js');
        wp_register_script('gsap-script', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js');
        wp_register_script('sm1-script', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js','','1.1', false);
        wp_register_script('sm2-script', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.js','','1.1', false);
        wp_register_script('sm3-script', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js','','1.1', false);
    }

    public function get_script_depends() {
      return [ 'bodymovin3','gsap-script', 'sm1-script', 'sm2-script', 'sm3-script'];
    }

    
	public function get_name() {
		return 'closticky500';
	}
    
	public function get_categories() {
		return array( '500designs' );
	}
	

	public function get_title() {
		return esc_html__( '2 Col Sticky', 'fhdesigns-elementor-widgets' );
	}

/*
	public function get_style_depends() {
		return [ 'e-lottie' ];
	}
*/
	public function get_icon() {
		return 'eicon-lottie';
	}

	protected function register_controls() {
        $this->start_controls_section(
            'firs_control',
            [
                'label' => esc_html__( 'General', 'textdomain' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        
		$this->add_control(
			'col-display',
			[
				'label' => esc_html__( 'Column display', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => 'Display position for de layout',
				'label_on' => esc_html__( 'Left Display', 'textdomain' ),
				'label_off' => esc_html__( 'Right Display', 'textdomain' ),
				'return_value' => 'right',
				'default' => 'right',
			]
		);
        
		$this->add_control(
			'col-mov-display',
			[
				'label' => esc_html__( 'Mobile Column display', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => 'Display position for de layout on mobile (less than 767px)',
				'label_on' => esc_html__( 'reverse', 'textdomain' ),
				'label_off' => esc_html__( 'normal', 'textdomain' ),
				'return_value' => 'reverse',
				'default' => 'normal',
			]
		);
        
        
		$this->add_control(
			'media',
			[
				'label' => esc_html__( 'Select media type', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
                'description' => 'Select the number of columns for the layout',
				'default' => 'lottie',
				'options' => [
					'lottie' => esc_html__( 'Lottie Animation', 'fhdesigns-elementor-widgets' ),
                    'image'  => esc_html__( 'Image/GIF', 'fhdesigns-elementor-widgets' ),
                    'video'  => esc_html__( 'Video', 'fhdesigns-elementor-widgets' ),
				],
				'frontend_available' => true,
			]
		);
        
		$this->add_control(
			'stickys',
			[
				'label' => esc_html__( 'Sticky Section', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
                'description' => 'Select if you want a sticke section or static section',
				'options' => [
					'static' => esc_html__( 'Static', 'fhdesigns-elementor-widgets' ),
                    'sticky'  => esc_html__( 'Sticky', 'fhdesigns-elementor-widgets' ),
				],
                'default' => 'static',
                'frontend_available' => true,
			]
		); 
            
		$this->add_control(
			'speed',
			[
				'label' => esc_html__( 'Content Speed', 'textdomain' ),
                'description' => 'select how long the transitions of the content last as you scroll, Min = 1 & Max = 10',
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10,
				'default' => 5,
                'condition' => [
					'stickys' => 'sticky',
				],
			]
		);
        
		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'fhdesigns-elementor-widgets' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'fhdesigns-elementor-widgets' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'fhdesigns-elementor-widgets' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => 'center',
			]
		);
        
        
		$this->add_control(
			'vertical-align',
			[
				'label' => esc_html__( 'Vertical Align', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'lottie',
				'options' => [
					'top' => esc_html__( 'Top', 'fhdesigns-elementor-widgets' ),
                    'center'  => esc_html__( 'Center', 'fhdesigns-elementor-widgets' ),
                    'bottom'  => esc_html__( 'Bottom', 'fhdesigns-elementor-widgets' ),
				],
                'default' => 'center',
				'frontend_available' => true,
			]
		);
        
        
        $this->add_control(
			'vertical-align',
			[
				'label' => esc_html__( 'Vertical Align', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'lottie',
				'options' => [
					'top' => esc_html__( 'Top', 'fhdesigns-elementor-widgets' ),
                    'center'  => esc_html__( 'Center', 'fhdesigns-elementor-widgets' ),
                    'bottom'  => esc_html__( 'Bottom', 'fhdesigns-elementor-widgets' ),
				],
                'default' => 'center',
				'frontend_available' => true,
                'condition' => [
					'stickys' => 'static',
				],
			]
		);
        
        
                
		// lottie.
		$this->end_controls_section();
        
///////////////////// Second control (lootie) /////////////////////////////////
        
		$this->start_controls_section( 'lottie', [
			'label' => esc_html__( 'Lottie Controls', 'fhdesigns-elementor-widgets' ),
            'condition' => [
                'media' => 'lottie',  
            ],
		] );

		$this->add_control(
			'source',
			[
				'label' => esc_html__( 'Source', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'media_file',
				'options' => [
					'media_file' => esc_html__( 'Media File', 'fhdesigns-elementor-widgets' ),
					'external_url' => esc_html__( 'External URL', 'fhdesigns-elementor-widgets' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'source_external_url',
			[
				'label' => esc_html__( 'External URL', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::URL,
				'condition' => [
					'source' => 'external_url',
				],
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your URL', 'fhdesigns-elementor-widgets' ),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'source_json',
			[
				'label' => esc_html__( 'Upload JSON File', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::MEDIA,
				'media_type' => 'application/json',
				'frontend_available' => true,
				'condition' => [
					'source' => 'media_file',
				],
			]
		);

		$this->add_control(
			'caption_source',
			[
				'label' => esc_html__( 'Caption', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'fhdesigns-elementor-widgets' ),
					'title' => esc_html__( 'Title', 'fhdesigns-elementor-widgets' ),
					'caption' => esc_html__( 'Caption', 'fhdesigns-elementor-widgets' ),
					'custom' => esc_html__( 'Custom', 'fhdesigns-elementor-widgets' ),
				],
				'condition' => [
					'source!' => 'external_url',
					'source_json[url]!' => '',
				],
				'frontend_available' => true,
			]
		);

        
		$this->add_control(
			'trigger-lottie',
			[
				'label' => esc_html__( 'Trigger', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'viewport',
				'options' => [
					'viewport' => esc_html__( 'Viewport', 'fhdesigns-elementor-widgets' ),
                    'onclick'  => esc_html__( 'On Click', 'fhdesigns-elementor-widgets' ),
                    'onhover'  => esc_html__( 'On Hover', 'fhdesigns-elementor-widgets' ),
                    'scroll'  => esc_html__( 'Scroll', 'fhdesigns-elementor-widgets' ),
				],
				'frontend_available' => true,
			]
		);
        
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
				    'trigger-lottie!' => 'scroll',
                ],
			]
		);
        
		$this->add_control(
			'play-loop',
			[
				'label' => esc_html__( 'Play on trigger', 'fhdesigns-elementor-widgets' ),
                'description' => 'Toggle if you want to trigger the animation every time you perform the action specified in your trigger',
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'textdomain' ),
				'label_off' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'no',
                'condition' => [
					'trigger-lottie!' => 'scroll',
				],
			]
		);
        
		$this->add_control(
			'infinite-loop',
			[
				'label' => esc_html__( 'Loop', 'fhdesigns-elementor-widgets' ),
                'description' => 'The animation will repeat infinitely in a loop.',
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'textdomain' ),
				'label_off' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'no',
                'condition' => [
					'trigger-lottie!' => 'scroll',
				],
			]
		);
        
        
        $this->add_control(
			'play_speed',
			[
				'label' => esc_html__( 'Play Speed', 'fhdesigns-elementor-widgets' ) . ' (x)',
				'type' => Controls_Manager::SLIDER,
				'render_type' => 'none',
                'condition' => [
					'trigger-lottie!' => 'scroll',
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 5,
						'step' => 0.1,
					],
				],
				'size_units' => [ 'px' ],
				'dynamic' => [
					'active' => true,
				],
			]
		);
        
		$this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
		$this->add_control(
			'caption',
			[
				'label' => esc_html__( 'Custom Caption', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::TEXT,
				'render_type' => 'none',
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'caption_source',
							'value' => 'custom',
						],
						[
							'name' => 'source',
							'value' => 'external_url',
						],
					],
				],
				'dynamic' => [
					'active' => true,
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'link_to',
			[
				'label' => esc_html__( 'Link', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
				'render_type' => 'none',
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'fhdesigns-elementor-widgets' ),
					'custom' => esc_html__( 'Custom URL', 'fhdesigns-elementor-widgets' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'custom_link',
			[
				'label' => esc_html__( 'Link', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::URL,
				'render_type' => 'none',
				'placeholder' => esc_html__( 'Enter your URL', 'fhdesigns-elementor-widgets' ),
				'condition' => [
					'link_to' => 'custom',
				],
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '',
				],
				'show_label' => false,
				'frontend_available' => true,
			]
		);
             
		// lottie.
		$this->end_controls_section();
        
/////////////////////// third control (img/gif control) /////////////////////////////////     
        
		$this->start_controls_section( 'img', [
			'label' => esc_html__( 'Img / Gif', 'fhdesigns-elementor-widgets' ),
            'condition' => [
                'media' => 'image',  
            ],
		] );
        
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' =>  plugin_dir_url( __FILE__ ).'img/default.png',
				],
			]
		);

        /*
		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
				'separator' => 'none',
			]
		);
*/
		$this->add_responsive_control(
			'align_img',
			[
				'label' => esc_html__( 'Alignment', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'fhdesigns-elementor-widgets' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'fhdesigns-elementor-widgets' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'fhdesigns-elementor-widgets' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .img-container' => 'justify-content: {{VALUE}};',
				],
			]
		);
/*
		$this->add_control(
			'caption_source_img',
			[
				'label' => esc_html__( 'Caption', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'elementor' ),
					'attachment' => esc_html__( 'Attachment Caption', 'fhdesigns-elementor-widgets' ),
					'custom' => esc_html__( 'Custom Caption', 'fhdesigns-elementor-widgets' ),
				],
				'default' => 'none',
			]
		);

		$this->add_control(
			'caption_img',
			[
				'label' => esc_html__( 'Custom Caption', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Enter your image caption', 'fhdesigns-elementor-widgets' ),
				'condition' => [
					'caption_source' => 'custom',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);
*/
        $this->add_control(
            'alt_img',
            [
                'name' => 'list_title',
                'description' => 'if the image has no Alt previously declare you can add it here',
                'label' => __( 'Alt', 'fhdesigns-elementor-widgets' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => '',
                'placeholder' => __( 'Add Alt title here', 'fhdesigns-elementor-widgets' ),
            ],
        );
        
        
		$this->add_control(
			'link_to_img',
			[
				'label' => esc_html__( 'Link', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'fhdesigns-elementor-widgets' ),
					'file' => esc_html__( 'Media File', 'fhdesigns-elementor-widgets' ),
					'custom' => esc_html__( 'Custom URL', 'fhdesigns-elementor-widgets' ),
				],
			]
		);

		$this->add_control(
			'link_img',
			[
				'label' => esc_html__( 'Link', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'fhdesigns-elementor-widgets' ),
				'condition' => [
					'link_to_img' => 'custom',
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'open_lightbox',
			[
				'label' => esc_html__( 'Lightbox', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'fhdesigns-elementor-widgets' ),
					'yes' => esc_html__( 'Yes', 'fhdesigns-elementor-widgets' ),
					'no' => esc_html__( 'No', 'fhdesigns-elementor-widgets' ),
				],
				'condition' => [
					'link_to_img' => 'file',
				],
			]
		);

		$this->add_control(
			'view_img',
			[
				'label' => esc_html__( 'View', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
        
        
		$this->end_controls_section();
       
        
/////////////////////// Fourth control (Content info) /////////////////////////////////
        
   
		$this->start_controls_section( 'video', [
			'label' => esc_html__( 'Video Controls', 'fhdesigns-elementor-widgets' ),
            'condition' => [
                'media' => 'video',  
            ],
		] );
        
   		$this->add_control(
			'video_cource',
			[
				'label' => esc_html__( 'Source', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'youtube' => 'Youtube',
					'vimeo' => 'Vimeo',
					'self_hosted' => 'Self Hosted',
				],
				'default' => 'youtube',
			]
		);
        
        
        
		$this->add_control(
			'youtube_source_url',
			[
				'label' => esc_html__( 'Youtube Link', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::URL,
				'condition' => [
					'video_cource' => 'youtube',
				],
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your URL', 'fhdesigns-elementor-widgets' ),
                'default' => [
					'url' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
					'is_external' => false,
					'nofollow' => false,
					// 'custom_attributes' => '',
				],
				'frontend_available' => true,
                
			]
		);
		$this->add_control(
			'vimeo_source_url',
			[
				'label' => esc_html__( 'Vimeo Link', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::URL,
				'condition' => [
					'video_cource' => 'vimeo',
				],
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your URL', 'fhdesigns-elementor-widgets' ),
				'frontend_available' => true,
                'default' => [
					'url' => 'https://player.vimeo.com/video/235215203',
					'is_external' => false,
					'nofollow' => false,
					// 'custom_attributes' => '',
				],
			]
		);
        
        $this->add_control(
			'selfhosted_video',
			[
				'label' => esc_html__( 'Upload Video', 'fhdesigns-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_type' => 'video',
				'frontend_available' => true,
				'condition' => [
					'video_cource' => 'self_hosted',
				],
			]
		);
        
		$this->add_control(
			'start_time',
			[
				'label' => esc_html__( 'Start time', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
                'description' => 'Specify a start time (in seconds)',
				'min' => 0,
				'max' => 1000000,
				'step' => 1,
				'default' => '',
			]
		);

		$this->add_control(
			'end_time',
			[
				'label' => esc_html__( 'End time', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
                'description' => 'Specify a end time (in seconds)',
				'min' => 0,
				'max' => 1000000,
				'step' => 1,
				'default' => '',
                'condition' => [
					'video_cource' => ['self_hosted', 'youtube'],
				],
			]
		);
        
        $this->add_control(
			'hr_vid_time',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        
		$this->add_control(
			'video_play_onview',
			[
				'label' => esc_html__( 'Autoplay on viewport', 'textdomain' ),
                'description' => 'When "Autoplay on viewport" is enable the video will be muted by default this is for ',
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'textdomain' ),
				'no' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'video_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => 'For best html practice if Mute control is disable then the autoplay will not work',
				'1' => esc_html__( 'Yes', 'textdomain' ),
				'0' => esc_html__( 'No', 'textdomain' ),
				'return_value' => '1',
				'default' => '0',
                'condition' => [
                  'video_play_onview!' => 'yes',
                ],
			]
		);
        
		$this->add_control(
			'video_loop',
			[
				'label' => esc_html__( 'Loop', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'1' => esc_html__( 'Yes', 'textdomain' ),
				'0' => esc_html__( 'No', 'textdomain' ),
				'return_value' => '1',
				'default' => '0',
			]
		);

		$this->add_control(
			'video_mute',
			[
				'label' => esc_html__( 'Muted', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'1' => esc_html__( 'Yes', 'textdomain' ),
				'0' => esc_html__( 'No', 'textdomain' ),
				'return_value' => '1',
				'default' => 'yes',
			]
		);
        
		$this->add_control(
			'video_control',
			[
				'label' => esc_html__( 'Player Control', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'1' => esc_html__( 'Yes', 'textdomain' ),
				'0' => esc_html__( 'No', 'textdomain' ),
				'return_value' => '1',
				'default' => '1',
			]
		);
        
		$this->add_control(
			'video_branding',
			[
				'label' => esc_html__( 'Modest Branding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'textdomain' ),
				'label_off' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'no',
                'condition' => [
                    'selfhosted_video' => ['youtube', 'video'],
                ]
			]
		);
        
		$this->add_control(
			'video_lazyload',
			[
				'label' => esc_html__( 'Lazy Load', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'textdomain' ),
				'label_off' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'no',
                'condition' => [
                    'selfhosted_video' => 'self_hosted',
                ]
			]
		);

        $this->add_control(
			'hr_vid_feat',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'video_featureimage',
			[
				'label' => esc_html__( 'Featrure image', 'textdomain' ),
				'description' => esc_html__( 'For best practice, the featured image will be hidden if the video is on autoplay.' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'textdomain' ),
				'no' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
  
		$this->add_control(
			'feature_video_image',
			[
				'label' => esc_html__( 'Choose Poster', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'condition' => [
                    'video_featureimage' => ['yes']
                ],
                'default' => [
					'url' =>  plugin_dir_url( __FILE__ ).'img/default.png',
				],
			]
		);


		$this->add_control(
			'play_icon_switch',
			[
				'label' => esc_html__( 'Play icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'textdomain' ),
				'no' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
  
		$this->add_control(
			'feature_video_play_image',
			[
				'label' => esc_html__( 'Choose play icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' =>  plugin_dir_url( __FILE__ ).'img/play-video-widget.svg',
				],
                'condition' => [
                    'play_icon_switch' => ['yes']
                ],
			]
		);

		$this->add_control(
			'pause_icon_switch',
			[
				'label' => esc_html__( 'Pause icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'yes' => esc_html__( 'Yes', 'textdomain' ),
				'no' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => '',
                'condition' => [
                    'video_cource' => 'self_hosted',
                ],
			]
		);
        
		$this->add_control(
			'feature_video_pause_image',
			[
				'label' => esc_html__( 'Choose pause icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' =>  plugin_dir_url( __FILE__ ).'img/pause-video-widget.svg',
				],
                'condition' => [
                    'pause_icon_switch' => 'yes',
                ],
			]
		);
        
        $this->end_controls_section();
        
        
        
        
/////////////////////// Fith control (Content info) /////////////////////////////////
        
   
		$this->start_controls_section( 'content', [
			'label' => esc_html__( 'Content Info', 'fhdesigns-elementor-widgets' )
		] );
        
   		$this->add_control(
			'title_html_tag',
			[
				'label' => esc_html__( 'Title HTML Tag', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);
        
        
		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'list_title',
                        'label' => __( 'Título', 'fhdesigns-elementor-widgets' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'default' => '500 Designs',
                        'placeholder' => __( 'Add  title', 'fhdesigns-elementor-widgets' ),
                    ],  
                    [
						'name' => 'list_content',
						'label' => esc_html__( 'Content', 'fhdesigns-elementor-widgets' ),
                        'description' => 'You can add you own shortcodes to each WYSIWYG',
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos unde accusamus eligendi, odio commodi debitis vero mollitia autem molestias labore sunt molestiae exercitationem delectus reprehenderit! Consectetur corporis iusto, omnis molestiae.' , 'fhdesigns-elementor-widgets' ),
					],
                    [
                        'name' => 'btn_contnet_title',
                        'label' => esc_html__( 'Button title', 'fhdesigns-elementor-widgets' ),
                        'description' => esc_html__('If the button tittle is empty the button wont show up'),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'placeholder' => __( 'Place button title here', 'fhdesigns-elementor-widgets' ),
                    ],
                    [
                        'name' => 'link',
                        'label' => __( 'Button link', 'fhdesigns-elementor-widgets' ),
                        'type' => Controls_Manager::URL,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'placeholder' => __( 'https://your-link.com', 'fhdesigns-elementor-widgets' ),
                     ],
				],
				'default' => [
					[
						'list_title' => esc_html__( '500 Design', 'textdomain' ),
						'list_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos unde accusamus eligendi, odio commodi debitis vero mollitia autem molestias labore sunt molestiae exercitationem delectus reprehenderit! Consectetur corporis iusto, omnis molestiae.', 'textdomain' ),
						'link' => 'https://500designs.com/',
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
        
        $this->end_controls_section();
        
        
        
        
        
        
//////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// Stles tab //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
   
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'General Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'column_gap',
			[
				'label' => esc_html__( 'Columns Gap', 'fhdesigns-elementor-widgets' ),
				'type' => Controls_Manager::SLIDER,
				'render_type' => 'none',
				'dynamic' => [
					'active' => true,
				],
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .col-sep-inner-in' => 'gap: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);
        
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Content container padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .csp-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);   
        
		$this->add_responsive_control(
			'media_padding',
			[
				'label' => esc_html__( 'Media container padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .csp-media' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'inner_contet_padding',
			[
				'label' => esc_html__( 'Items padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .content-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
		$this->add_responsive_control(
			'item_radius',
			[
				'label' => esc_html__( 'item radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .content-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_rad',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
		$this->add_responsive_control(
			'item_bgcolor',
			[
				'label' => esc_html__( 'Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content-container' => 'background-color: {{VALUE}}',
				],
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'iten_shadow',
				'selector' => '{{WRAPPER}} .content-container',
			]
		);
        
        $this->end_controls_section();
        
/////////////////////// General styles /////////////////////////////////
        
		$this->start_controls_section( 'style', [
			'label' => esc_html__( 'Title Styles', 'fhdesigns-elementor-widgets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		] );
        
        

        
		$this->add_responsive_control(
			'text_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .col-title' => 'color: {{VALUE}}',
				],
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .col-title',
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .col-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .col-title',
			]
		);
        
        
        $this->end_controls_section();
                
/////////////////////// Title styles /////////////////////////////////
        
		$this->start_controls_section( 'style', [
			'label' => esc_html__( 'Title Styles', 'fhdesigns-elementor-widgets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		] );
        
		$this->add_responsive_control(
			'text_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .col-title' => 'color: {{VALUE}}',
				],
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .col-title',
			]
		);
        
		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .col-title',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Title item margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .col-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        
        $this->end_controls_section();
        
        
/////////////////////// Content styles /////////////////////////////////
        
		$this->start_controls_section( 'style_content', [
			'label' => esc_html__( 'Content Styles', 'fhdesigns-elementor-widgets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		] );
		$this->add_responsive_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .col-content' => 'color: {{VALUE}}',
				],
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
                'label' => esc_html__( 'Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .col-content',
			]
		);
        
		$this->add_responsive_control(
			'content_margin',
			[
				'label' => esc_html__( 'Content item margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .col-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();
        
        
/////////////////////// Button styles /////////////////////////////////
        
		$this->start_controls_section( 'style_btn', [
			'label' => esc_html__( 'Content Button Styles', 'fhdesigns-elementor-widgets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		] );
                
        
		$this->add_responsive_control(
			'btn_margin',
			[
				'label' => esc_html__( 'Button item margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        
		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Button item padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr_padd',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
		$this->add_responsive_control(
			'btn_radius',
			[
				'label' => esc_html__( 'Button item radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
		$this->add_responsive_control(
			'btn_bg',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button-text' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_responsive_control(
			'btn_color',
			[
				'label' => esc_html__( 'Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'background-color: {{VALUE}}',
				],
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
                'label' => esc_html__( 'Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .elementor-button-text',
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_shadow',
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);
        
        $this->end_controls_section();
        
        
        
        /////////////////////// Image / GIF styles /////////////////////////////////
        
		$this->start_controls_section( 'style_img', [
			'label' => esc_html__( 'Image / GIF Style', 'fhdesigns-elementor-widgets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'media' => 'image',  
            ],
		] );
            
		$this->add_responsive_control(
			'img_padding',
			[
				'label' => esc_html__( 'Image padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .img-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' => esc_html__( 'Max Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'label' => esc_html__( 'Height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => 'px',
				],
				'mobile_default' => [
					'unit' => 'px',
				],
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'object-fit',
			[
				'label' => esc_html__( 'Object Fit', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options' => [
					'' => esc_html__( 'Default', 'elementor' ),
					'fill' => esc_html__( 'Fill', 'elementor' ),
					'cover' => esc_html__( 'Cover', 'elementor' ),
					'contain' => esc_html__( 'Contain', 'elementor' ),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'separator_panel_style',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);      
        
		$this->start_controls_tabs( 'image_effects' );

		$this->start_controls_tab( 'normal',
			[
				'label' => esc_html__( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'opacity',
			[
				'label' => esc_html__( 'Opacity', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} img',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => esc_html__( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'opacity_hover',
			[
				'label' => esc_html__( 'Opacity', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img:hover' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}}:hover img',
			]
		);
        

		$this->add_control(
			'background_hover_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} img',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} img',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_caption',
			[
				'label' => esc_html__( 'Caption', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'caption_source!' => 'none',
				],
			]
		);

		$this->add_responsive_control(
			'caption_align',
			[
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .widget-image-caption' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .widget-image-caption' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);

		$this->add_control(
			'caption_background_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget-image-caption' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'caption_typography',
				'selector' => '{{WRAPPER}} .widget-image-caption',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'caption_text_shadow',
				'selector' => '{{WRAPPER}} .widget-image-caption',
			]
		);

		$this->add_responsive_control(
			'caption_space',
			[
				'label' => esc_html__( 'Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .widget-image-caption' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
        
        
        
        /////////////////////// Video styles /////////////////////////////////
        
		$this->start_controls_section( 'style_video', [
			'label' => esc_html__( 'VideoF Style', 'fhdesigns-elementor-widgets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'media' => 'video',  
            ],
		] );
            
		$this->add_responsive_control(
			'video_padding',
			[
				'label' => esc_html__( 'Video padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .video-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'video_border',
				'selector' => '{{WRAPPER}} video',
				'separator' => 'before',
			]
		);
        
        $this->add_responsive_control(
			'video_border_radius',
			[
				'label' => esc_html__( 'Video Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} video' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_control(
			'hr_video_featureimg',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
                'label' => esc_html__( 'Featur image', 'textdomain' ),
                'condition' => [
				    'trigger-lottie!' => 'scroll',
                ],
			]
		);
        
        $this->add_responsive_control(
			'video_featimg_width',
			[
				'label' => esc_html__( 'Feature image width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .featimg_video' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'video_featimg_space',
			[
				'label' => esc_html__( 'Feature image max width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .featimg_video' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'video_featimg_height',
			[
				'label' => esc_html__( 'Feature image height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => 'px',
				],
				'mobile_default' => [
					'unit' => 'px',
				],
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .featimg_video' => 'height: {{SIZE}}{{UNIT}} !important;',
				], 
			]
		);

		$this->add_responsive_control(
			'object-fit_video_iimg',
			[
				'label' => esc_html__( 'Object Fit', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'video_featimg_height[size]!' => '',
				],
				'options' => [
					'' => esc_html__( 'Default', 'elementor' ),
					'fill' => esc_html__( 'Fill', 'elementor' ),
					'cover' => esc_html__( 'Cover', 'elementor' ),
					'contain' => esc_html__( 'Contain', 'elementor' ),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .featimg_video' => 'object-fit: {{VALUE}} !important;',
				],
			]
		);
        
        $this->add_responsive_control(
			'image_border_radius_feat_img',
			[
				'label' => esc_html__( 'Feature image Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .featimg_video' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'feat_image_border',
				'selector' => '{{WRAPPER}} .featimg_video',
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'feat_image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} video',
			]
		);
           
        
		$this->start_controls_tabs( 'effects_feat_img',
            [
                'label' => esc_html__( 'Feature image', 'textdomain' ),
            ] );

		$this->start_controls_tab( 'normal_feat_img',
			[
				'label' => esc_html__( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'opacity_feat_img',
			[
				'label' => esc_html__( 'Feature image Opacity', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'feateimg_css_filters',
				'selector' => '{{WRAPPER}} .featimg_video',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover_feat_img',
			[
				'label' => esc_html__( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'opacity_hover_feat_img',
			[
				'label' => esc_html__( 'Feature image Opacity', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img:hover' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}}:hover img',
			]
		);
        

		$this->add_control(
			'background_hover_transition_feat_img',
			[
				'label' => esc_html__( 'Feature image Transition Duration', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_animation_feat_img',
			[
				'label' => esc_html__( 'Hover Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
        
        $this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'hover_feateimg_css_filters',
				'selector' => '{{WRAPPER}}:hover .featimg_video',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
        
        
        $this->add_control(
			'video_separator_panel_style',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);   
        
        $this->add_responsive_control(
			'playimg_width',
			[
				'label' => esc_html__( 'Play image width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .play_video' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);
        
        $this->add_responsive_control(
			'play_radius',
			[
				'label' => esc_html__( 'Play image radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .play_video' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'play_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .play_video',
			]
		);
        
        $this->add_control(
			'video_separator_panel2_style',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);   
        
        
        $this->add_responsive_control(
			'pauseimg_width',
			[
				'label' => esc_html__( 'Pause image width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pause' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

        $this->add_responsive_control(
			'pause_radius',
			[
				'label' => esc_html__( 'Pause image radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pause' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pause_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .pause',
			]
		);
        
        
		$this->end_controls_section();
        
        
    }        
        
        
    
    
	protected function render() {
        
        $settings = $this->get_settings_for_display();

        ////////////////////
        // Columns Position
        ////////////////////
        if($settings['col-display'] == 'right'){
            $row_pos = 'col-right';
        }else{
            $row_pos = 'col-left';
        }
        
        ////////////////////
        // Colum Sticky
        ////////////////////
        if($settings['stickys'] == 'static'){
            $col_disp = 'col-static';
            $js_section = 'section';
        }elseif($settings['stickys'] == 'sticky'){
            $col_disp = 'col-sticky';
            $js_section = 'js-section';
        }
                   
        if($settings['link_to'] != 'none'){
            if(isset($settings['custom_link'])){
                if( $settings['custom_link']["is_external"] == 'on'){
                    $targetlott = 'target="_blank"';
                }else{
                    $targetlott = '';
                }
                if( $settings['custom_link']["nofollow"] == 'on'){
                    $nofollowlott = 'rel="nofollow"';
                }else{
                    $nofollowlott = '';
                }
            }
        }else{
            $nofollowlott = '';
            $targetlott = '';
        }

        if($settings['col-mov-display'] === 'reverse'){
            $flex_reverse_direction = 'flex-reverse-direction';
        }else{
            $flex_reverse_direction = '';
        }
        
        
        
        $rand = rand(1,999);
        
        ///////////////////
        // Video vars
        ///////////////////  
        
        ///////////////////
        // Lottie vars
        ///////////////////        
        if( $settings['source'] == 'media_file' ){
            if( $settings['source_json']["url"] == ''){
                $lottdir = plugin_dir_url( __FILE__ ).'animations/default.json';
            }else{
                $lottdir =  $settings['source_json']["url"];
            //$lottdir = '$settings['source_json']';
            }
        }elseif( $settings['source'] == 'external_url' ){
            if( $settings['source_external_url']['url'] == ''){
                $lottdir = plugin_dir_url( __FILE__ ).'animations/default.json';
            }else{
                $lottdir =  $settings['source_external_url']['url'];
            }
        }

        
        ?>

        <!--<div class="col-sep <?php echo $row_pos .' '. $col_disp; ?>" style="height: <?php echo $counter_tot.'vh';?>">-->
        <div class="col-sep <?php echo $row_pos .' '. $col_disp. ' ' . $flex_reverse_direction . ' ' . $col_disp.$rand; ?> id-<?php echo $rand;?>" ?>
            <div class="col-sep-inner csp-content content-<?php echo $col_disp; ?>  ">
                <div class="col-sep-inner-in <?php echo $row_pos. ' vert-align-' .$settings['vertical-align'].' content-inner'. $col_disp; ?>">
                    <?php 
                   	if ( $settings['list'] ) {
                        $counter = 0;
                        foreach (  $settings['list'] as $item ) {
                            $counter++;
                            if( $item['link']["is_external"] == 'on'){
                                $target = 'target="_blank"';
                            }else{
                                $target = '';
                            }
                            if( $item['link']["nofollow"] == 'on'){
                                $nofollow = 'rel="nofollow"';
                            }else{
                                $nofollow = '';
                            }
                            echo '<div class="content-container '.$js_section.$counter.'" id="'.esc_attr( $item['_id'] ).'">
                                    <'.$settings['title_html_tag'].' class="col-title">'.$item['list_title'].'</'.$settings['title_html_tag'].'>
                                    <div class="col-content">'.$item['list_content'].'</div>';
                                    if($item['btn_contnet_title'] !== ''){
                                        echo '<a '.$nofollow. ' href="'.$item['link']['url'].'" ' .$target. ' class="elementor-button" role="button">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-text">'.$item['btn_contnet_title'].'</span>
                                            </span>
                                        </a>';
                                    }
                                echo'</div>';
                        }
                    }
                   ?>
                </div>
            </div>
            <div class="col-sep-inner csp-media lott-img-<?php echo $col_disp; ?>">
                <?php 
                    if($settings['media'] == 'lottie'){
                        if($settings['link_to'] != 'none'){
                            echo '<a '.$nofollowlott. ' href="'.$settings['custom_link']['url'].'" ' .$targetlott. ' class="lottie-link">';
                            include 'includes/lottie.php';
                            echo '</a>';
                        }else{
                            include 'includes/lottie.php';
                        }
                        
                    }elseif($settings['media'] == 'video'){
                        include 'includes/video.php';    
                    }else{
                        include 'includes/img.php'; 
                    }
                ?>
            </div>
        </div>
        <?php
	}

	protected function content_template() {

	}
}
