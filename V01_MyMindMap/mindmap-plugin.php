<?php
/**
 * @package MindMapPlugin
 */
/*
 Plugin Name: MyMindMap
 Plugin URI: http://mindmapplugin.fr
  Description: C'est mon premier plugin.
  Version: 1.0.0
  Author: MARIS Marjorie
  Author URI: http://mindmapplugin.fr
  License: GPLv2 or later
  Text Domain : mindmap-plugin
 */
// Connection à la BDD
require_once "Init.php";
// Création automatique des TABLES 
include_once dirname( __FILE__ ) . '/function/mindmap-plugin.php';;
//Création structure Tables
register_activation_hook( __FILE__, array( 'InstallPluginTable', 'jal_install_mindmap' ));
register_activation_hook( __FILE__, array( 'InstallPluginTable', 'jal_install_bulle' ));
//Création données Tables
register_activation_hook( __FILE__, array( 'InstallPluginTable', 'jal_install_data_mindmap' ));
register_activation_hook( __FILE__, array( 'InstallPluginTable', 'jal_install_data_bulle' ));
//Création Menu
add_action('admin_menu', 'Menu_MindMap');
function Menu_MindMap() 
{
   //Menu parent
   add_menu_page(
                  'Acceuil Mindmap Page', //Nom page
                  'Menu MyMindmap', //Nom menu
                  'manage_options', //Capacité
                  'Menu_MindMap', //Nom du slug -> identifié menu parent
                  'Menu_MindMap_init', //Nom de la function pour appellé par la suite
                  'dashicons-rest-api', //Icon
                  30 //Position 
    );
    //Menu enfant Création MindMap          
    add_submenu_page( 
                        'Menu_MindMap', // Nom du slug menu parent
                        'Création MindMap Page', // Nom de la page
                        'Création MindMap', // Nom pour le menu 
                        'manage_options', //Capacité
                        'Creation_MindMap', //Nom du slug -> identifié menu enfant
                        'Menu_MindMap_Crea_init', //Nom de la function pour appellé par la suite
                        1//Position 
    );

    //Menu enfant Modification MindMap          
    add_submenu_page( 
                        'Menu_MindMap', // Nom du slug menu parent
                        'Modification MindMap Page', // Nom de la page
                        'Modification MindMap', // Nom pour le menu 
                        'manage_options', //Capacité
                        'Modification_MindMap', //Nom du slug -> identifié menu enfant
                        'Menu_MindMap_Modif_init', //Nom de la function pour appellé par la suite
                        2//Position 
    );

    //Menu enfant Suppression MindMap          
    add_submenu_page( 
                        'Menu_MindMap', // Nom du slug menu parent
                        'Suppression MindMap Page', // Nom de la page
                        'Suppression MindMap', // Nom pour le menu 
                        'manage_options', //Capacité
                        'Suppression_MindMap', //Nom du slug -> identifié menu enfant
                        'Menu_MindMap_Sup_init', //Nom de la function pour appellé par la suite
                        3//Position 
    );
    
    //Menu enfant Bulle MindMap         
    add_submenu_page( 
                        'Menu_MindMap', // Nom du slug menu parent
                        'Bulle MindMap Page', // Nom de la page
                        'Bulle MindMap', // Nom pour le menu 
                        'manage_options', //Capacité
                        'Bulle_MindMap', //Nom du slug -> identifié menu enfant
                        'Menu_MindMap_Bulle_init', //Nom de la function pour appellé par la suite
                        4//Position 
    );  

        
    //Menu enfant Creation Bulle MindMap         
    add_submenu_page( 
                        'Menu_MindMap', // Nom du slug menu parent
                        'Création Bulle MindMap Page', // Nom de la page
                        'Création Bulle MindMap', // Nom pour le menu 
                        'manage_options', //Capacité
                        'Creation_Bulle_MindMap', //Nom du slug -> identifié menu enfant
                        'Menu_MindMap_Creation_Bulle_init', //Nom de la function pour appellé par la suite
                        5//Position 
    );  

    //Menu enfant Modification Bulle MindMap         
    add_submenu_page( 
                        'Menu_MindMap', // Nom du slug menu parent
                        'Modification Bulle MindMap Page', // Nom de la page
                        'Modification Bulle MindMap', // Nom pour le menu 
                        'manage_options', //Capacité
                        'Modification_Bulle_MindMap', //Nom du slug -> identifié menu enfant
                        'Menu_MindMap_Modification_Bulle_init', //Nom de la function pour appellé par la suite
                        6//Position 
    );  

    //Menu enfant Suppression Bulle MindMap         
    add_submenu_page( 
                        'Menu_MindMap', // Nom du slug menu parent
                        'Suppression Bulle MindMap Page', // Nom de la page
                        'Suppression Bulle MindMap', // Nom pour le menu 
                        'manage_options', //Capacité
                        'Suppression_Bulle_MindMap', //Nom du slug -> identifié menu enfant
                        'Menu_MindMap_Suppression_Bulle_init', //Nom de la function pour appellé par la suite
                        7//Position 
    );  

    //Menu enfant Phase 1 Deploiment Bulle MindMap         
    add_submenu_page( 
                        'Menu_MindMap', // Nom du slug menu parent
                        'Deploiment1 Bulle MindMap Page', // Nom de la page
                        'Deploiment1 Bulle MindMap', // Nom pour le menu 
                        'manage_options', //Capacité
                        'Deploiment1_Bulle_MindMap', //Nom du slug -> identifié menu enfant
                        'Menu_MindMap_Deploiment1_Bulle_init', //Nom de la function pour appellé par la suite
                        8//Position 
    );  

    //Menu enfant Contact MindMap         
    add_submenu_page( 
                        'Menu_MindMap', // Nom du slug menu parent
                        'Contact MindMap Page', // Nom de la page
                        'Contact MindMap', // Nom pour le menu 
                        'manage_options', //Capacité
                        'Contact_MindMap', //Nom du slug -> identifié menu enfant
                        'Menu_MindMap_Contact_init', //Nom de la function pour appellé par la suite
                        30//Position 
    );   
}
//Liens des pages
//Accueil
function Menu_MindMap_init()
{
    include "Acceuil.php";
}

//Création MindMap
function Menu_MindMap_Crea_init()
{
    include "Creation_mind_map.php";
}

//Modification MindMap
function Menu_MindMap_Modif_init()
{
    include "Modifier_mind_map.php";
}
//Suppression MindMap
function Menu_MindMap_Sup_init(){
    include "Supprimer_mind_map.php";
}

//Bulle MindMap
function Menu_MindMap_Bulle_init()
{
    include "Tableau_bulle.php";
}

//Création Bulle MindMap
function Menu_MindMap_Creation_Bulle_init()
{
    include "Creation_bulle.php";
}

//Modification Bulle MindMap 
function Menu_MindMap_Modification_Bulle_init()
{
    include "Modifier_bulle.php";
}

//Suppression Bulle MindMap 
function Menu_MindMap_Suppression_Bulle_init()
{
    include "Supprimer_bulle.php";
}

//Suppression Bulle MindMap 
function Menu_MindMap_Deploiment1_Bulle_init()
{
    include "Deploiment.php";
}


//Contact MindMap
function Menu_MindMap_Contact_init()
{
    include "Aide&Contact.php";
}