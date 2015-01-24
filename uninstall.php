<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   G_Social_Icons
 * @author    Gerben Van Amstel <gerbenvanamstel@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.gerbenvanamstel.com
 * @copyright 2015 Gerben Van Amstel
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

unregister_setting( 'g-social-icons', 'facebook');
unregister_setting( 'g-social-icons', 'twitter' );
unregister_setting( 'g-social-icons', 'googleplus' );
unregister_setting( 'g-social-icons', 'youtube' );
unregister_setting( 'g-social-icons', 'pinterest' );
unregister_setting( 'g-social-icons', 'linkedin' );
unregister_setting( 'g-social-icons', 'tumblr' );
unregister_setting( 'g-social-icons', 'instagram' );
unregister_setting( 'g-social-icons', 'flickr' );
unregister_setting( 'g-social-icons', 'vine' );
unregister_setting( 'g-social-icons', 'soundcloud' );
unregister_setting( 'g-social-icons', 'github' );
unregister_setting( 'g-social-icons', 'dribble' );
unregister_setting( 'g-social-icons', 'behance' );
unregister_setting( 'g-social-icons', 'rss' );
unregister_setting( 'g-social-icons', 'alignment' );
unregister_setting( 'g-social-icons', 'colour' );
unregister_setting( 'g-social-icons', 'width_height' );
unregister_setting( 'g-social-icons', 'margin' );
unregister_setting( 'g-social-icons', 'border_radius' );