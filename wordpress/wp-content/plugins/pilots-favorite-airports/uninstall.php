<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit;

global $wpdb;
$tableName = $wpdb->prefix . 'pfa_airport_markers';
$sql = "DROP TABLE IF EXISTS $tableName";
$wpdb->query($sql);