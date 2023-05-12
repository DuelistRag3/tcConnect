<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.christian-dullin.de
 * @since      0.1.0
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
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	0.1.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	*/
	private $option_name = 'tcconnect_setting'; 

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
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
	 * @since    0.1.0
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
	 * @since    0.1.0
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
	 * Include the settings page
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	function tcconnect_init() {
		if( ! current_user_can( 'manage_options' )) {
			return;
		}

		include TCCONNECT_PATH . 'admin/partials/tcconnect-admin-display.php';
	}

	/**
	 * Creates our admin menu entry
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function tcconnect_init_menu() {
		//add_menu_page( $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $callback:callable, $icon_url:string, $position:integer|float|null )
		add_menu_page( 'TrinityCore Connect', 'TC Connect', 'manage_options', $this->plugin_name, array( $this, 'tcconnect_init'), 'dashicons-chart-area', 26 );
	}

	/**
	 * Register the setting parameters
	 *
	 * @since  	0.1.0
	 * @access 	public
	 */
	public function register_tcconnect_plugin_settings() {
		// Add a Database section
		add_settings_section(
			$this->option_name. '_database',
			__( 'Database', 'tcconnect' ),
			array( $this, $this->option_name . '_database_cb' ),
			$this->plugin_name
		);
		// Add the database fields
		add_settings_field(
			$this->option_name . '_db_host',
			'Database Host',
			array( $this, $this->option_name . '_db_host_cb' ),
			$this->plugin_name,
			$this->option_name . '_database',
			array( 'label_for' => $this->option_name . '_db_host' )
		);
		add_settings_field(
			$this->option_name . '_db_port',
			'Database Port',
			array( $this, $this->option_name . '_db_port_cb' ),
			$this->plugin_name,
			$this->option_name . '_database',
			array( 'label_for' => $this->option_name . '_db_port' )
		);
		add_settings_field(
			$this->option_name . '_db_name',
			'Database Name',
			array( $this, $this->option_name . '_db_name_cb' ),
			$this->plugin_name,
			$this->option_name . '_database',
			array( 'label_for' => $this->option_name . '_db_name' )
		);
		add_settings_field(
			$this->option_name . '_db_user',
			'Database User',
			array( $this, $this->option_name . '_db_user_cb' ),
			$this->plugin_name,
			$this->option_name . '_database',
			array( 'label_for' => $this->option_name . '_db_user' )
		);
		add_settings_field(
			$this->option_name . '_db_pass',
			'Database Password',
			array( $this, $this->option_name . '_db_pass_cb' ),
			$this->plugin_name,
			$this->option_name . '_database',
			array( 'label_for' => $this->option_name . '_db_pass' )
		);
		// Register the database fields
		register_setting( $this->plugin_name, $this->option_name . '_db_host', array( $this, $this->option_name . '_sanitize_db_host' ) );
		register_setting( $this->plugin_name, $this->option_name . '_db_port', array( $this, $this->option_name . '_sanitize_db_port' ) );
		register_setting( $this->plugin_name, $this->option_name . '_db_name', array( $this, $this->option_name . '_sanitize_db_name' ) );
		register_setting( $this->plugin_name, $this->option_name . '_db_user', array( $this, $this->option_name . '_sanitize_db_user' ) );
		register_setting( $this->plugin_name, $this->option_name . '_db_pass', array( $this, $this->option_name . '_sanitize_db_pass' ) );
	} 

	public function tcconnect_setting_database_cb() {
		echo '<p>' . __( 'Insert TrinityCore Database infos.', 'tcconnect' ) . '</p>';
	}

	public function tcconnect_setting_db_host_cb() {
		$val = get_option( $this->option_name, '127.0.0.1' );
		echo '<input type="text" name="' . $this->option_name . '_db_host' . '" id="' . $this->option_name . '_db_host' . '" value="' . $val . '"> ';
	}

	public function tcconnect_setting_db_port_cb() {
		$val = get_option( $this->option_name, '3306' );
		echo '<input type="number" name="' . $this->option_name . '_db_port' . '" id="' . $this->option_name . '_db_port' . '" value="' . $val . '"> ';
	}

	public function tcconnect_setting_db_name_cb() {
		$val = get_option( $this->option_name, 'trinity' );
		echo '<input type="text" name="' . $this->option_name . '_db_name' . '" id="' . $this->option_name . '_db_name' . '" value="' . $val . '"> ';
	}

	public function tcconnect_setting_db_user_cb() {
		$val = get_option( $this->option_name, 'trinity' );
		echo '<input type="text" name="' . $this->option_name . '_db_user' . '" id="' . $this->option_name . '_db_user' . '" value="' . $val . '"> ';
	}

	public function tcconnect_setting_db_pass_cb() {
		$val = get_option( $this->option_name, '' );
		echo '<input type="password" name="' . $this->option_name . '_db_pass' . '" id="' . $this->option_name . '_db_pass' . '" value="' . $val . '"> ';
	}

}
