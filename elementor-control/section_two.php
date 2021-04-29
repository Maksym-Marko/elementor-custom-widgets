<?php
namespace Elementor;

class Mx_Section_Two extends Widget_Base {

	public function get_name() {
		return 'mx_select_color';
	}
	
	public function get_title() {
		return 'Select Color';
	}
	
	public function get_icon() {
		return 'fa fa-brush';
	}
	
	public function get_categories() {
		return [ 'custom-sections' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' 	=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'background_style',
			[
				'label' 	=> __( 'Select BG Style', 'plugin-domain' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'blue',
				'options' 	=> [
					'blue'  	=> __( 'Blue', 'plugin-domain' ),
					'green' 	=> __( 'Green', 'plugin-domain' ),
					'yellow' 	=> __( 'Yellow', 'plugin-domain' ),
					'orange' 	=> __( 'Orange', 'plugin-domain' )
				],
			]
		);

		$this->end_controls_section();
	}
	
	protected function render() {

		// display on the front-end
        $settings 		= $this->get_settings_for_display();

		$color 			= $settings['background_style'];

		echo '<section class="mx_section_two" style="background: ' . $color . '">';

			echo 'Color: ' . $color;

		echo '</section>';
		 

	}
	
	protected function _content_template() { ?>

		<!-- displays when the elementor settings are saved -->
		<section class="mx_section_two" style="background: {{ settings.background_style }}">
			<p><b>Color:</b> {{ settings.background_style }}</p>
		</section>

    <?php }
	
	
}