<?php   

# https://github.com/tommcfarlin/page-template-example/

if ( ! defined( 'PAGE_TEMPLATE_PLUGIN' ) ) {
	define( 'PAGE_TEMPLATE_PLUGIN', '0.1' );
} // end if

/* 
	Plugin Name: Photo Portfolio
	Plugin URI: http://www.leegoddard.net 
	Description: Plugin for displaying photos
	Author: Lee Goddard
	Version: 1.0 
	Author URI: http://www.LeeGoddard.net 
	@package Photo Portfolio
	@version 0.1
	@since 	0.1
 */
class Page_Template_Plugin {

	/** A reference to an instance of this class. **/
	private static $instance;

	/**
	Singleton constructor
	  
	@return OBJECT	A reference to an instance of this class.
	 */
	public static function getInstance() {

		if (null == self::$instance ) {
			self::$instance = new Page_Template_Plugin();
		}

		return self::$instance;
	}

	/**
	Constructor
	*/
	private function __construct() {
		// Localisation
		# add_action( 'init', array( $this, 'plugin_textdomain' ) );

		$this->called_shortcode = false; // If shortcode used, add JS
		add_action('wp_head', array($this, 'head_hook'));
		add_action('wp_footer', array($this, 'footer_hook'));

		# Help and info:
		add_action('admin_menu', array( $this, 'photoport_admin_actions'));
		add_shortcode( 'photoportfolio', array( $this, 'photoportfolio_shortcode' ));
	}
	
	public function head_hook(){
			echo "<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>";
			echo "<script>window.jQuery || document.write('<script src=\"_/js/vendor/jquery-1.10.2.min.js\"><\/script>')</script>";
			echo "<link rel='stylesheet' href='"
				. plugins_url() . "/photoportfolio/photoportfolio.css'>";
	}
	
	public function footer_hook(){
		if ($this->called_shortcode){
			echo "<script src='" . plugins_url() . "/photoportfolio/photoportfolio.js'></script>";
		}
	}
	
	public function photoport_admin_actions() {  
		add_options_page("Photo Portfolio", "Photo Portfolio", 'manage_options', "photoportfolio_admin.php", array($this, "photoport_admin"));        
	}  
	
	/** This adds the call for the portfolio **/
	public function photoportfolio_shortcode( $atts ){
		$rv = "<span class='portfolio' ";
		$errors = "";
		
		if (isset($atts[uri])){
			$rv .= " data-uri='".$atts[uri]."' ";
		} else {
			$errors .= "<p class='error'>".__("Missing")." URI.</p>";
		}
		if (isset($atts[title])){
			$rv .= " data-title='".$atts[title]."' ";
		}
		$rv .= ">";
		if (isset($atts[text])){
			$rv .= $atts[text];
		}
		
		$rv .= '</span>' . $errors;
		$this->called_shortcode = 1;
		return $rv;
	}

	public function photoport_admin() {  
	    include('photoportfolio_admin.php');  
	}

	/**
	Loads the plugin text domain for translation
	*/
	#public function plugin_textdomain() {
	#	load_plugin_textdomain( 'pte', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
	#}
}

$GLOBALS['photoport'] = Page_Template_Plugin::getInstance();

?>
