<?php
namespace Elementor;

class Mx_Section_One extends Widget_Base {

	public function get_name() {
		return 'image-title-text';
	}
	
	public function get_title() {
		return 'Image Title And Text';
	}
	
	public function get_icon() {
		return 'fa fa-font';
	}
	
	public function get_categories() {
		return [ 'custom-sections' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' 		=> __( 'Enter Section Title', 'plugin-name' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'input_type' 	=> 'text',
				'placeholder' 	=> __( 'Some text', 'plugin-name' ),
				'default' 		=> 'Hello World!'
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'item_description',
			[
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'plugin-domain' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();
	}
	
	protected function render() {

        $settings 		= $this->get_settings_for_display();

		$title 			= $settings['title'];

		$image 			= $settings['image'];

		$description 	= $settings['item_description'];

		echo '<section class="mx_section_one">';

			echo '<h1>' . $title . '</h1>';

			echo '<img src="' . $image['url'] . '" />';

			echo '<p>' . $description . '</p>';

		echo '</section>';
		 

	}
	
	protected function _content_template() {

    }
	
	
}