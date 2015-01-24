<?php
/**
 * G Social Icons.
 *
 * @package   G_Social_Icons
 * @author    Gerben Van Amstel <gerbenvanamstel@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.gerbenvanamstel.com
 * @copyright 2015 Gerben Van Amstel
 *
 * @wordpress-plugin
 * Plugin Name:         G Social Icons
 * Plugin URI:          http://www.gerbenvanamstel.com
 * Description:         Easily display social media icons
 * Version:             1.1.0
 * Author:              Gerben Van Amstel
 * Author URI:          http://www.gerbenvanamstel.com
 * Text Domain:         g-social-icons
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:         /languages
 * GitHub Plugin URI:   https://github.com/amazingdetective/g-social-icons
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/


require_once( plugin_dir_path( __FILE__ ) . 'public/class-g-social-icons.php' );

add_action( 'plugins_loaded', array( 'G_Social_Icons', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-g-social-icons-admin.php' );
	add_action( 'plugins_loaded', array( 'G_Social_Icons_Admin', 'get_instance' ) );

}
