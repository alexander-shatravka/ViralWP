<?php

/**
 * Plugin Name: WP Staging Pro
 * Plugin URI: https://wp-staging.com
 * Description: Create a staging clone site for testing & developing
 * Author: WP-Staging, René Hermenau
 * Author URI: https://wordpress.org/plugins/wp-staging
 * Version: 2.7.6 
 * Text Domain: wp-staging
 * Domain Path: /languages/
 *
 * @package WPSTG
 * @category Development, Migrating, Staging
 * @author René Hermenau
 */
// No Direct Access
if( !defined( "WPINC" ) ) {
   die;
}

// Slug
if( !defined( 'WPSTG_PLUGIN_SLUG' ) ) {
   define( 'WPSTG_PLUGIN_SLUG', 'wp-staging-pro' );
}

// Version
if( !defined( 'WPSTGPRO_VERSION' ) ) {
   define( 'WPSTGPRO_VERSION', '2.7.6' );
}

// Folder Path
if( !defined( 'WPSTG_PLUGIN_DIR' ) ) {
   define( 'WPSTG_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Folder Path
if( !defined( 'WPSTGPRO_PLUGIN_FILE' ) ) {
   define( 'WPSTGPRO_PLUGIN_FILE', __FILE__ );
}

// Must use version of the optimizer
if( !defined( 'WPSTGPRO_OPTIMIZER_MUVERSION' ) ) {
   define( 'WPSTGPRO_OPTIMIZER_MUVERSION', 1.1 );
}

if( !class_exists( 'Wpstg_Requirements_Check' ) ) {
   include( dirname( __FILE__ ) . '/apps/Core/Utils/requirements-check.php' );
}

$plugin_requirements = new Wpstg_Requirements_Check( array(
    'title' => 'WP STAGING',
    'php' => '5.3',
    'wp' => '3.0',
    'file' => __FILE__,
        ) );

/**
 * Fix nonce check
 * Bug: https://core.trac.wordpress.org/ticket/41617#ticket
 * @param int $seconds
 * @return int
 */
function wpstgpro_overwrite_nonce( $seconds ) {
   return 86400;
}

add_filter( 'nonce_life', 'wpstgpro_overwrite_nonce', 99999 );

/**
 * Path to main WP Staging class
 * Make sure to not redeclare class in case free version has been installed previosly
 */
if( !class_exists( 'WPStaging\WPStaging' ) ) {
   require_once plugin_dir_path( __FILE__ ) . "apps/Core/WPStaging.php";
}

if( $plugin_requirements->passes() ) {


   $wpStaging = \WPStaging\WPStaging::getInstance();

   /**
    * Load a few important WP globals into WPStaging class to make them available via dependancy injection
    */
   // Wordpress DB Object
   if( isset( $wpdb ) ) {
      $wpStaging->set( "wpdb", $wpdb );
   }

   // WordPress Filter Object
   if( isset( $wp_filter ) ) {
      $wpStaging->set( "wp_filter", function() use(&$wp_filter) {
         return $wp_filter;
      } );
   }

   /**
    * Inititalize WPStaging
    */
   $wpStaging->run();

   /**
    * Installation Hooks
    */
   if( !class_exists( 'WPStaging\Install' ) ) {
      require_once plugin_dir_path( __FILE__ ) . "/install.php";
   }
}