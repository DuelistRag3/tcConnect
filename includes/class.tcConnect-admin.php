<?php

class tcConnect_Admin {

    private static $initiated = false;

    public static function init() {
        if ( ! self::$initiated ) {
			self::init_hooks();
		}
    }

    private static function init_hooks() {
		add_action( 'admin_menu', array( 'tcConnect_Admin', 'init_menu' ) );

        self::$initiated = true;
    }

    public static function init_menu() {
        add_menu_page( 
            'TrinityCore Connect',
            'TC Connect',
            'manage_options',
            'tcConnect',
            array( 'tcConnect_Admin', 'render_options_page' )
        );
    }

    public static function render_options_page() {
        echo "<h1>I am TrinityCore Connect</h1>";
    }
}

?>