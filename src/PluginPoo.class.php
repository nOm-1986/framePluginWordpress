<?php

namespace PluginADN;
/**
 * PluginPoo
 * Clase de ejemplo que gestiona el plugin de Wordpress PluginPoo
 * @author José Fabián Beltrán Meza
 */

class PluginPoo
{
    public function activation()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'pluginpoo';

        $sql = 'CREATE TABLE IF NOT EXISTS '.$table.' (
            `id` int(9) NOT NULL AUTO_INCREMENT,
            `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `nombre` varchar(50) DEFAULT NULL,
            `description` text,
            PRIMARY KEY (`id`),
            KEY nombre (nombre)
        ) COLLATE '.$wpdb->collate;

        // usado para crear tablas y bases de datos
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    //Ojo este método no lo puedo testear, para testearlo tendría que cargar Wordpress.
    public function init()
    {
        // crear menús de administración
        add_action( 'admin_menu', [ $this, 'addAdminMenu' ] );  
    
        // scripts backend    
        // más adelante
        
    }

    //    Hook para registrar el menú principal
    public function addAdminMenu()
    {
        //     main menu
        add_menu_page('Plugin POO', 'Mi Plugin POO', 'manage_options', 'mi-plugin-poo', [ $this, 'pageDashboard' ], 'dashicons-visibility');

        //    sub menu
        add_submenu_page('mi-plugin-poo', 'SubMenu 1', 'SubMenu 1', 'manage_options', "submenu-1", [ $this, 'pageMenu1' ] );
    }
    
    //    Página que mostrará el dashboard del menú
    public function pageDashboard()
    {
        include _PLUGIN_POO_DIR.'admin/dashboard.php';
    }

    public function pageMenu1()
    {
        include _PLUGIN_POO_DIR.'admin/dashboardSubmenuUno.php';
    }

}