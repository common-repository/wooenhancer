<?php
/*
* Plugin Name: WooEnhancer - Improve and customize WooCommerce
* Plugin URI: http://alborotado.com
* Description: Extends Woocommerce capabilities and lets you customize the design...
* Version: 2.2
* Author: Miguras
* Author URI: http://alborotado.com
* License: GPLv2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/


if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}
define("MIGWOOPATH", plugin_dir_url( __FILE__ ));

		//========================= Variables ===================================


		/*======================== FUNCTIONS ==============================*/

		if ( file_exists( dirname( __FILE__ ) . '/inc/functions.php' ) ) {
			require_once( dirname( __FILE__ ) . '/inc/functions.php' );
		}




		// ========================== REDUX FRAMEWORK =========================================
		if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/admin/redux-framework/framework.php' ) ) {
			require_once( dirname( __FILE__ ) . '/admin/redux-framework/framework.php' );
		}
		if ( file_exists( dirname( __FILE__ ) . '/admin/redux-framework/info.php' ) ) {
			require_once( dirname( __FILE__ ) . '/admin/redux-framework/info.php' );
		}
		if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/admin/wooenhancer-options.php' ) ) {
			require_once( dirname( __FILE__ ) . '/admin/wooenhancer-options.php' );
		}

		/*====================== TGM =========================*/
		if ( file_exists( dirname( __FILE__ ) . '/inc/plugins/plugin-activation.php' ) ) {
			require_once( dirname( __FILE__ ) . '/inc/plugins/plugin-activation.php' );
		}


		/*=========================== METABOXES ===================*/
		if ( file_exists( dirname( __FILE__ ) . '/metaboxes/plugin-metaboxes.php' ) ) {
			require_once( dirname( __FILE__ ) . '/metaboxes/plugin-metaboxes.php' );
		}



		/*=========================== DYNAMIC CSS ===================*/
		if ( file_exists( dirname( __FILE__ ) . '/assets/css/dynamic-styles.php' ) ) {
			require_once( dirname( __FILE__ ) . '/assets/css/dynamic-styles.php' );
		}

		if(!is_admin() && function_exists('wp_register_script')){
					add_action('wp_head', 'migwoo_enhancer_dynamic_styles');
		};

		//===================== STYLES AND SCRIPTS ===========================
		add_action( 'wp_enqueue_scripts', 'mig_wooenhancer_front_styles' );
		function mig_wooenhancer_front_styles(){
			wp_enqueue_script( 'jquery');
			wp_enqueue_style( 'basic-wooenhancer', plugin_dir_url( __FILE__ ) . 'assets/css/front-styles.css', rand(0, 100));
		};

		function wooenhancer_admin_script(){
			wp_enqueue_script( 'wooenhancer-admin', plugin_dir_url( __FILE__ ) . 'assets/js/wooenhancer-admin.js');
		}


			add_action( 'admin_enqueue_scripts', 'wooenhancer_admin_script' );



			/*=============== Enqueue Scripts and Styles (old pro version released)=============================*/


				function wooenhancer_pro_front_styles(){
					global $woocommerce;
					global $migwoo_enhancer;
					$quickview = $migwoo_enhancer['shop-activate-quickview'];
					$suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

					wp_enqueue_script('jquery');
					wp_enqueue_script( 'wooenhancer-pro-front', plugins_url('/assets/js/wooenhancer-pro-front.js', __FILE__), '', rand(0, 50));
					wp_enqueue_style( 'wooenhancer-pro-front', plugins_url('/assets/css/wooenhancer-pro-front.css', __FILE__), '', rand(0, 50));

					if(is_shop() && $quickview == 'yes'){
						wp_enqueue_script( 'prettyPhoto', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto' . $suffix . '.js', array( 'jquery' ), '3.1.5', true );
			    		wp_enqueue_script( 'prettyPhoto-init', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.init' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
			    		wp_enqueue_style( 'woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css' );
					}
				}


			add_action( 'wp_enqueue_scripts', 'wooenhancer_pro_front_styles' );

?>
