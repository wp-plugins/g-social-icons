<?php
/**
 * G Social Icons.
 *
 * @package   G_Social_Icons
 * @author    Gerben Van Amstel <gerbenvanamstel@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.gerbenvanamstel.com
 * @copyright 2015 Gerben Van Amstel
 */

/**
 * Plugin class. This class should ideally be used to work with the
 * public-facing side of the WordPress site.
 *
 * If you're interested in introducing administrative or dashboard
 * functionality, then refer to `class-g-social-icons-admin.php`
 *
 * @package G_Social_Icons
 * @author  Gerben Van Amstel <gerbenvanamstel@gmail.com>
 */
class G_Social_Icons {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	const VERSION = '1.0.0';

	/**
	 * Unique identifier for your plugin.
	 *
	 *
	 * The variable name is used as the text domain when internationalizing strings
	 * of text. Its value should match the Text Domain file header in the main
	 * plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'g-social-icons';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Activate plugin when new blog is added
		add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        
        // Add the shortcode [g-social-icons]
        add_shortcode( 'g-social-icons', array( $this, 'display_shortcode' ));

	}

	/**
	 * Return the plugin slug.
	 *
	 * @since    1.0.0
	 *
	 * @return    Plugin slug variable.
	 */
	public function get_plugin_slug() {
		return $this->plugin_slug;
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
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );

	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_slug . '-plugin-styles', plugins_url( 'assets/css/public.css', __FILE__ ), array(), self::VERSION );
	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_slug . '-plugin-script', plugins_url( 'assets/js/public.js', __FILE__ ), array( 'jquery' ), self::VERSION );
	}
    
    /**
    * What the defined shortcode [g-social-icons] displays
    *
    */
    public function display_shortcode() {
        $social_media_urls = array(
            get_option( 'facebook' ), 
            get_option( 'twitter' ), 
            get_option( 'googleplus' ), 
            get_option( 'youtube' ), 
            get_option( 'pinterest' ), 
            get_option( 'linkedin' ), 
            get_option( 'tumblr' ), 
            get_option( 'instagram' ), 
            get_option( 'flickr' ), 
            get_option( 'vine' ), 
            get_option( 'soundcloud' ), 
            get_option( 'github' ), 
            get_option( 'dribble' ), 
            get_option( 'behance' ), 
            get_option( 'rss' )
        );
        
        // Adding the Facebook icon to display
        if(!empty($social_media_urls[0])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[0]).'" target="_blank" title="'.get_bloginfo('name').' on Facebook"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/facebook.svg" alt="'.get_bloginfo('name').' on Facebook" style="'.$this->get_option_colour("#3b5998").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Twitter icon to display
        if(!empty($social_media_urls[1])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[1]).'" target="_blank" title="'.get_bloginfo('name').' on Twitter"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/twitter.svg" alt="'.get_bloginfo('name').' on Twitter" style="'.$this->get_option_colour("#55acee").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Google+ icon to display
        if(!empty($social_media_urls[2])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[2]).'" target="_blank" title="'.get_bloginfo('name').' on Google+"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/googleplus.svg" alt="'.get_bloginfo('name').' on Google+" style="'.$this->get_option_colour("#dd4b39").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the YouTube icon to display
        if(!empty($social_media_urls[3])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[3]).'" target="_blank" title="'.get_bloginfo('name').' on YouTube"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/youtube.svg" alt="'.get_bloginfo('name').' on YouTube" style="'.$this->get_option_colour("#e52d27").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Pinterest icon to display
        if(!empty($social_media_urls[4])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[4]).'" target="_blank" title="'.get_bloginfo('name').' on Pinterest"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/pinterest.svg" alt="'.get_bloginfo('name').' on Pinterest" style="'.$this->get_option_colour("#cc2127").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the LinkedIn icon to display
        if(!empty($social_media_urls[5])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[5]).'" target="_blank" title="'.get_bloginfo('name').' on LinkedIn"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/linkedin.svg" alt="'.get_bloginfo('name').' on LinkedIn" style="'.$this->get_option_colour("#0976b4").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Tumblr icon to display
        if(!empty($social_media_urls[6])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[6]).'" target="_blank" title="'.get_bloginfo('name').' on Tumblr"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/tumblr.svg" alt="'.get_bloginfo('name').' on Tumblr" style="'.$this->get_option_colour("#35465c").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Instagram icon to display
        if(!empty($social_media_urls[7])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[7]).'" target="_blank" title="'.get_bloginfo('name').' on Instagram"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/instagram.svg" alt="'.get_bloginfo('name').' on Instagram" style="'.$this->get_option_colour("#3f729b").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Flickr icon to display
        if(!empty($social_media_urls[8])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[8]).'" target="_blank" title="'.get_bloginfo('name').' on Flickr"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/flickr.svg" alt="'.get_bloginfo('name').' on Flickr" style="'.$this->get_option_colour("#0063dc").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Vine icon to display
        if(!empty($social_media_urls[9])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[9]).'" target="_blank" title="'.get_bloginfo('name').' on Vine"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/vine.svg" alt="'.get_bloginfo('name').' on Vine" style="'.$this->get_option_colour("#00b488").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Soundcloud icon to display
        if(!empty($social_media_urls[10])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[10]).'" target="_blank" title="'.get_bloginfo('name').' on Soundcloud"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/soundcloud.svg" alt="'.get_bloginfo('name').' on Soundcloud" style="'.$this->get_option_colour("#f30").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Github icon to display
        if(!empty($social_media_urls[11])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[11]).'" target="_blank" title="'.get_bloginfo('name').' on Github"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/github.svg" alt="'.get_bloginfo('name').' on Github" style="'.$this->get_option_colour("#333").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Dribble icon to display
        if(!empty($social_media_urls[12])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[12]).'" target="_blank" title="'.get_bloginfo('name').' on Dribble"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/dribble.svg" alt="'.get_bloginfo('name').' on Dribble" style="'.$this->get_option_colour("#ea4c89").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the Behance icon to display
        if(!empty($social_media_urls[13])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.$this->check_http($social_media_urls[13]).'" target="_blank" title="'.get_bloginfo('name').' on Behance"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/behance.svg" alt="'.get_bloginfo('name').' on Behance" style="'.$this->get_option_colour("#1769ff").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        // Adding the RSS icon to display
        if(!empty($social_media_urls[14])) { 
            $social_media_icons .= '<li style="'.$this->get_option_margin().'"><a href="'.get_site_url().'/rss/" target="_blank" title="'.get_bloginfo('name').' RSS Feed"><img src="'.plugin_dir_url( __FILE__ ).'assets/img/rss.svg" alt="'.get_bloginfo('name').' RSS Feed" style="'.$this->get_option_colour("#f26522").$this->get_option_width_height().$this->get_option_border_radius().'"></a></li>'; 
        }
        
        $display = '<div id="g-social-icons" style="'.$this->get_option_alignment().'"><ul>'.$social_media_icons.'</ul></div>';
        
        return $display;
    }
    
    /**
    * Check if the social media URL has http:// or https:// in it otherwise add it
    *
    */
    public function check_http($url) {
            $checkhttp = parse_url($url);
            if($checkhttp["scheme"]!=="http" && $checkhttp["scheme"]!=="https") {
                $url = 'http://'.$url;
            } 
            return $url;
        }
    
    /**
    * Check if the option align is left or right aligned and insert into the g-social-icons div
    *
    */
    public function get_option_alignment() {
            if (get_option( 'alignment' ) == 'left') {
                $align = 'float:left;';   
            } elseif (get_option( 'alignment' ) == 'right') {
                $align = 'float:right;';   
            } elseif (get_option( 'alignment' ) == 'center') {
                $align = 'margin:0 auto;text-align:center;';  
            }
        return $align;
        }
    
    /**
    * Check if the option colour is empty and insert it into img/svg style
    * @since    1.1.0
    */
    public function get_option_colour($originalColour) {
            if (get_option( 'colour' ) !== '') {
                $colour = 'fill:'.get_option( "colour" ).';';   
            } else {
                $colour = 'fill:'.$originalColour.';';  
            }
        return $colour;
        }
    
    /**
    * Get the option width_height and insert it into img/svg style
    *@since    1.1.0
    */
    public function get_option_width_height() {
        $size = 'width: '.get_option( 'width_height' ).'; height: '.get_option( 'width_height' ).';';   
        return $size;
        }
    
    /**
    * Get the option margin and insert it into li style
    *@since    1.1.0
    */
    public function get_option_margin() {
        $margin = 'margin-left: '.get_option( 'margin' ).';';   
        return $margin;
        }
    
    /**
    * Get the option type (border-radius) and insert it into img/svg style
    *@since    1.1.0
    */
    public function get_option_border_radius() {
        if (get_option( 'border_radius' ) == 'circle') {
                $radius = 'border-radius:50%;';   
            } elseif (get_option( 'border_radius' ) == 'rounded') {
                $radius = 'border-radius:7px;';   
            } else {
                $radius = '';  
            }
        return $radius;
        }
}
