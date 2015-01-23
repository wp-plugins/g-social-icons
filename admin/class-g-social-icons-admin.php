<?php
/**
 * G Social Icons.
 *
 * @package   G_Social_Icons_Admin
 * @author    Gerben Van Amstel <gerbenvanamstel@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.gerbenvanamstel.com
 * @copyright 2015 Gerben Van Amstel
 */

/**
 * @package G_Social_Icons_Admin
 * @author  Gerben Van Amstel <gerbenvanamstel@gmail.com>
 */
class G_Social_Icons_Admin {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		/*
		 * Call $plugin_slug from public plugin class.
		 *
		 */
		$plugin = G_Social_Icons::get_instance();
		$this->plugin_slug = $plugin->get_plugin_slug();

		// Add the options page and menu item.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );
        
        // Register the settings
        add_action( 'admin_init', array($this, 'register_settings') );

		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_slug . '.php' );
		add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		/*
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 *
		 */
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'G Social Icons', $this->plugin_slug ),
			__( 'G Social Icons', $this->plugin_slug ),
			'manage_options',
			$this->plugin_slug,
			array( $this, 'display_plugin_admin_page' )
		);

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {
		include_once( 'views/admin.php' );
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	public function add_action_links( $links ) {

		return array_merge(
			array(
				'settings' => '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_slug ) . '">' . __( 'Settings', $this->plugin_slug ) . '</a>'
			),
			$links
		);

	}
    
   /**
    * Register the admin settings
    *
    */
    public function register_settings() {
        register_setting( 'g-social-icons', 'facebook' );
        register_setting( 'g-social-icons', 'twitter' );
        register_setting( 'g-social-icons', 'googleplus' );
        register_setting( 'g-social-icons', 'youtube' );
        register_setting( 'g-social-icons', 'pinterest' );
        register_setting( 'g-social-icons', 'linkedin' );
        register_setting( 'g-social-icons', 'tumblr' );
        register_setting( 'g-social-icons', 'instagram' );
        register_setting( 'g-social-icons', 'flickr' );
        register_setting( 'g-social-icons', 'vine' );
        register_setting( 'g-social-icons', 'soundcloud' );
        register_setting( 'g-social-icons', 'github' );
        register_setting( 'g-social-icons', 'dribble' );
        register_setting( 'g-social-icons', 'behance' );
        register_setting( 'g-social-icons', 'rss' );
        register_setting( 'g-social-icons', 'alignment' );
        register_setting( 'g-social-icons', 'colour' );
    }

}
