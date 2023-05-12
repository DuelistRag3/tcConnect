<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.christian-dullin.de
 * @since      0.1.1
 *
 * @package    Tcconnect
 * @subpackage Tcconnect/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tcconnect
 * @subpackage Tcconnect/admin
 * @author     DuelistRage <admin@christian-dullin.de>
 */
class Tcconnect_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	*/
	private $option_name = 'tcconnect_setting'; 

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.1
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
	 * @since    0.1.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tcconnect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tcconnect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tcconnect-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.1.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tcconnect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tcconnect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tcconnect-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the setting parameters
	 *
	 * @since  	0.1.1
	 * @access 	public
	*/
	public function register_tcconnect_plugin_settings() {
		// Add a Database section
		add_settings_section(
			$this->option_name. '_database',
			__( 'Database', 'tcconnect' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);
		// Add a boolean field
		add_settings_field(
			$this->option_name . '_bool',
			__( 'Boolean setting', 'flowygo' ),
			array( $this, $this->option_name . '_bool_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_bool' )
		);
		// Add a numeric field
		add_settings_field(
			$this->option_name . '_number',
			__( 'Number setting', 'flowygo' ),
			array( $this, $this->option_name . '_number_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_number' )
		);
		// Register the boolean field
		register_setting( $this->plugin_name, $this->option_name . '_bool', array( $this, $this->option_name . '_sanitize_bool' ) );
		// Register the numeric field
		register_setting( $this->plugin_name, $this->option_name . '_number', 'integer' );
	} 

}
