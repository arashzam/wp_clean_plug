<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/arashzam
 * @since      1.0.0
 *
 * @package    Wp_clean_plug
 * @subpackage Wp_clean_plug/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_clean_plug
 * @subpackage Wp_clean_plug/admin
 * @author     arash <arashzamzami2012@yahoo.com>
 */
class Wp_clean_plug_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_clean_plug_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_clean_plug_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp_clean_plug-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_clean_plug_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_clean_plug_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp_clean_plug-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_plugin_admin_menu() {

	/*
	* Add a settings page for this plugin to the Settings menu.
	*
	* NOTE: Alternative menu locations are available via WordPress administration menu functions.
	*
	* Administration Menus: http://codex.wordpress.org/Administration_Menus
	*
	*/
	add_options_page( "WP_Cleanup and Base Options Functions Setup", 'WP_Cleanup', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
	}



	public function add_action_links( $links ) {
/*
* Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
*/
$settings_link = array(
'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>');
return array_merge( $settings_link, $links );

}


public function display_plugin_setup_page() {

include_once( 'partials/wp_clean_plug-admin-display.php');
}

public function options_update() {
register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
}

public function validate($input) {
// All checkboxes inputs
$valid = array();

//Cleanup
$valid['cleanup'] = (isset($input['cleanup']) && !empty($input['cleanup'])) ? 1 : 0;
$valid['comments_css_cleanup'] = (isset($input['comments_css_cleanup']) && !empty($input['comments_css_cleanup'])) ? 1: 0;
$valid['gallery_css_cleanup'] = (isset($input['gallery_css_cleanup']) && !empty($input['gallery_css_cleanup'])) ? 1 : 0;
$valid['body_class_slug'] = (isset($input['body_class_slug']) && !empty($input['body_class_slug'])) ? 1 : 0;
$valid['jquery_cdn'] = (isset($input['jquery_cdn']) && !empty($input['jquery_cdn'])) ? 1 : 0;
$valid['cdn_provider'] = esc_url($input['cdn_provider']);

return $valid;
}


}
