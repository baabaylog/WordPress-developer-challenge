<?php
/*
 * Plugin Name:       Pilots Favorite Airports
 * Plugin URI:        https://maxenius.com/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Moeez Ur Rehman
 * Author URI:        https://maxenius.com/
 * Text Domain:       maxenius
 */

if (!defined('WPINC')) die;

require_once(ABSPATH .'wp-content/plugins/pilots-favorite-airports/ajax_call.php');

function pfa_activate()
{
    add_option('pfa_activated', 'pilots-favorite-airports');
}
register_activation_hook(__FILE__, 'pfa_activate');
function load_pfa_plugin()
{
    if (is_admin() && get_option('pfa_activated') == 'pilots-favorite-airports') {
        delete_option('pfa_activated');
        global  $wpdb;
        $charsetCollate = $wpdb->get_charset_collate();
        $tableName = $wpdb->prefix . 'pfa_airport_markers';
        $sql = "CREATE TABLE IF NOT EXISTS $tableName (`id` BIGINT(20) NOT NULL AUTO_INCREMENT , `rec_ID` BIGINT(20) NULL , `airport` VARCHAR(30) NOT NULL , `city` VARCHAR(30) NULL , `country` VARCHAR(30) NULL , `iata/faa` VARCHAR(30) NULL , `icao` VARCHAR(30) NULL , `latitude` VARCHAR(50) NOT NULL , `longitude` VARCHAR(50) NOT NULL , `altitude` VARCHAR(50) NULL , `timezone` INT(30) NULL , PRIMARY KEY (`id`)) $charsetCollate; ";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
add_action('admin_init', 'load_pfa_plugin');

function pfa_enqueue_script()
{
    $api_key = 'AIzaSyBfLQXAfILk83taFfVlXeA-Ae6k7Xe-ooI';
    wp_enqueue_script('pfa-google-maps', "https://maps.googleapis.com/maps/api/js?key=$api_key", [], null, false);
    wp_enqueue_script('pfa-script', plugin_dir_url(__FILE__) . 'assets/script.js', ['jquery', 'pfa-google-maps'], null, true);
    wp_localize_script(
        'pfa-script',
        'pfa_ajax_obj',
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'pfa_plugin' ),
        )
    );
    wp_enqueue_style('pfa-style', plugin_dir_url(__FILE__) . 'assets/style.css',[], null, 'all');
}
add_action('wp_enqueue_scripts', 'pfa_enqueue_script');

function pfa_deactivate()
{
    global $wpdb;
    $tableName = $wpdb->prefix . 'pfa_airport_markers';
    $sql = "DROP TABLE IF EXISTS $tableName";
    $wpdb->query($sql);
}
register_deactivation_hook(__FILE__, 'pfa_deactivate');



function pfa_map($atts)
{
 ob_start();
 require_once(ABSPATH.'wp-content/plugins/pilots-favorite-airports/template/map-load.php');
 return ob_get_clean();
}
add_shortcode('pfa_map', 'pfa_map');
