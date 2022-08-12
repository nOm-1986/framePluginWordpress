<?php
/**
 * Plugin Name:     Plugin hecho con POO y TDD
 * Plugin URI:      https://adnerp.com.co/contactanos/
 * Description:     Plugin desarrollado para integrar ADN ERP y wordpress, más específicamente Woocommerce.
 * Version:         1.0
 * Requires PHP:    7.2
 * Author:          ADN ERP S.A.S.
 * Author URI:      https://adnerp.com.co/
 * License:         GPLv2
*/

//    Definimos 2 constantes una para el directorio y la otra para la url
define('_PLUGIN_POO_DIR', plugin_dir_path( __FILE__ ));
define('_PLUGIN_POO_URL', plugin_dir_url( __FILE__ ));

//    is_admin(), nos permite determinar si la petición es realizada desde la interfaz administrativa de Wordpress.
//    WP_CLI determina si la herramienta de gestión de línea de comandos está activada (por lo que nos permite realizar tareas para insertar, actualizar y eliminar datos).
if( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require_once( _PLUGIN_POO_DIR . 'inc/PluginPoo.class.php' );
    
    $pluginPoo = new PluginPoo();

    //    Método para inicializar los procesos de creación de menús, scripts, etc...
    $pluginPoo->init();


    //    register_activation_hook() --> Nos permite realizar acciones cuando el usuario activa el Plugin
    //    activación de plugin
    register_activation_hook( __FILE__, [ $pluginPoo, 'activation' ] );

}