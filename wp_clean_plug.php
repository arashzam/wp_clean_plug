<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/arashzam
 * @since             1.0.0
 * @package           Wp_clean_plug
 *
 * @wordpress-plugin
 * Plugin Name:       WP clean up
 * Plugin URI:        https://github.com/arashzam/wp_clean_plug
 * Description:       this is my short plugin.
 * Version:           1.0.2
 * Author:            arash
 * Author URI:        https://github.com/arashzam
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp_clean_plug
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_CLEAN_PLUG_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp_clean_plug-activator.php
 */
function activate_wp_clean_plug() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp_clean_plug-activator.php';
	Wp_clean_plug_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp_clean_plug-deactivator.php
 */
function deactivate_wp_clean_plug() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp_clean_plug-deactivator.php';
	Wp_clean_plug_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_clean_plug' );
register_deactivation_hook( __FILE__, 'deactivate_wp_clean_plug' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp_clean_plug.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_clean_plug() {

	$plugin = new Wp_clean_plug();
	$plugin->run();

}
run_wp_clean_plug();
