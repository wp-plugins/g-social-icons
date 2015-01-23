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

delete_option( 'facebook' );
delete_option( 'twitter' );
delete_option( 'googleplus' );
delete_option( 'youtube' );
delete_option( 'pinterest' );
delete_option( 'linkedin' );
delete_option( 'tumblr' );
delete_option( 'instagram' );
delete_option( 'flickr' );
delete_option( 'vine' );
delete_option( 'soundcloud' );
delete_option( 'github' );
delete_option( 'dribble' );
delete_option( 'behance' );
delete_option( 'rss' );
delete_option( 'alignment' );
delete_option( 'colour' );