<?php
/**
* Initialisations dans chaque page
*
* @author 
*/
/**
 * Paramétrage pour certains serveurs qui n'affichent pas les erreurs PHP par défaut
 */
ini_set('display_errors', '1');
ini_set('html_errors', '1');
/**
 * Autoload
 * @param string $classe
 */
function my_autoloader() {
  // Donne chemin absolue
  //Pour MindMap
  require_once plugin_dir_path(__FILE__) . "classes/MindmapDAO.php";
  require_once plugin_dir_path(__FILE__) . 'classes/Mindmap.php';
  //Pour Bulles
  require_once plugin_dir_path(__FILE__) . "classes/BullesDAO.php";
  require_once plugin_dir_path(__FILE__) . 'classes/Bulles.php';
  
}
function load_style() 
{
  wp_register_style( 'main', plugin_dir_url( __FILE__) . 'style.css', array(), '1.0' );
    wp_enqueue_style('main');
}
add_action('admin_enqueue_scripts', 'load_style');
spl_autoload_register('my_autoloader');
/**
 * Vide le cache du navigateur
 */
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

session_start();

