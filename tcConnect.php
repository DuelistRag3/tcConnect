<?php
/**
 * @package tcConnect
 */
/*
/*
Plugin Name: TrinityCore Connect
Version: 0.1.1
Description: Used to Syncronize Wordpress CMS with World of Warcraft TrinityCore Database. New Users will automaticaly added into your TrinityCore Database (Currently only TrinityCore is supported)
Author: DuelistRage
Author URI: https://www.christian-dullin.de/
License: GPLv2 or later
Text Domain: tcConnect
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2023-2023 DuelistRage.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

/**
 * Define named constants
 */
define( 'TCCONNECT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Register requiered hooks
 */
register_activation_hook( __FILE__, array('tcConnect' ,'plugin_activate') );

register_deactivation_hook( __FILE__, array('tcConnect' ,'plugin_deactivate') );

require_once( TCCONNECT_PLUGIN_DIR . '/includes/class.tcConnect.php' );

add_action( 'init', array('tcConnect', 'init') );

if ( is_admin(  ) ) {
    require_once( TCCONNECT_PLUGIN_DIR . '/includes/class.tcConnect-admin.php' );
	add_action( 'init', array('tcConnect_Admin', 'init') );
}

?>