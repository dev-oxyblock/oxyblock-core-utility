<?php
/*
Plugin Name:	Oxyblock Core - Utility
Plugin URI:		https://core.oxyblock.xyz
Description:	Modern CSS Framework based on Oxyblock UI
Version:		0.2.2
Author:			Oxyblock
Author URI:		https://oxyblock.com/
License:		GPL-3.0+
License URI:	http://www.gnu.org/licenses/gpl-3.0.txt

This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This plugin. If not, see {URI to Plugin License}.
*/

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

add_action( 'wp_enqueue_scripts', 'oxyblockCoreUtility_enqueue_files' );
function oxyblockCoreUtility_enqueue_files() {
	if ( ! class_exists( 'CT_Component' ) ) { // if Oxygen is not active
		wp_enqueue_style( 'ob-core-framework', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-framework.css' );
		wp_enqueue_style( 'ob-core-layout', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-layout.css' );
		wp_enqueue_style( 'ob-core-spacing', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-spacing.css' );
		wp_enqueue_style( 'ob-core-sizing', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-sizing.css' );
		wp_enqueue_style( 'ob-core-helpers', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-helpers.css' );
	}
}

// 1000000 priority so it is executed after all Oxygen's styles
add_action( 'wp_head', 'oxyblockCoreUtility_enqueue_css_after_oxygens', 1000000 );
function oxyblockCoreUtility_enqueue_css_after_oxygens() {
	// if Oxygen is not active, abort.
	if ( ! class_exists( 'CT_Component' ) ) {
		return;
	}

	$styles = new WP_Styles;
	$styles->add( 'ob-core-framework', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-framework.css' );
	$styles->add( 'ob-core-layout', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-layout.css' );
	$styles->add( 'ob-core-spacing', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-spacing.css' );
	$styles->add( 'ob-core-sizing', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-sizing.css' );
	$styles->add( 'ob-core-helpers', plugin_dir_url( __FILE__ ) . 'assets/css/ob-core-helpers.css' );
	$styles->enqueue( array ('ob-core-framework', 'ob-core-layout', 'ob-core-spacing', 'ob-core-sizing', 'ob-core-helpers' ) );
	$styles->do_items();
}