<?php
// si este fichero no es ejecutado por Wordpress, exit()
if (!defined('WP_UNINSTALL_PLUGIN')) { die; }

// borrar opciones si fuera necesario
//$option_name = 'nombre';
//delete_option($option_name); // borrar opcion wordpress
//delete_site_option($option_name); // borrar opciones para multisites de wordpress

// drop a custom database table
global $wpdb;
$table = $wpdb->prefix . 'pluginpoo';
$sql = 'DROP TABLE IF EXISTS '.$table;
$wpdb->query($sql);