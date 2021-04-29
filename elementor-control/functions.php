<?php

// https://developers.elementor.com/elementor-controls/

class MX_Elementor_Widgets_Class {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {

		// section one
		require_once('section_one.php');

		// section two
		require_once('section_two.php');

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {

		// register section one
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Mx_Section_One() );

		// register section two
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Mx_Section_Two() );

	}

}

add_action( 'init', 'mx_elementor_init' );

function mx_elementor_init() {
	MX_Elementor_Widgets_Class::get_instance();
}

// create a new category
function mx_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'custom-sections',
		[
			'title' => __( 'Custom Sections', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'mx_add_elementor_widget_categories' );