<?php
///////////////////
// Création BDD //
/////////////////
/**
 * undocumented class
 */
class InstallPluginTable
{
  
  ///////////////////
  //Table : RELATION  
  static function jal_install_relation () {
    global $wpdb;
    //Appelation de la table
    $charset_collate = $wpdb-> get_charset_collate ();
    $mm_relation = $wpdb->prefix. "mm_relation";
    $mm_relation_sql = "CREATE TABLE IF NOT EXISTS $mm_relation (
         id_relation mediumint (11) NOT NULL AUTO_INCREMENT,
        type_relation varchar(10) NOT NULL,
        identite_bulle varchar(10) NOT NULL,
        PRIMARY KEY  (id_relation)
    ) $charset_collate; ";
    require_once (ABSPATH. 'wp-admin/includes/upgrade.php');
    dbDelta ($mm_relation_sql); 
  }
  ///////////////////
  //Table : MINDMAP
  static function jal_install_mindmap () {
    global $wpdb;
    //Appelation de la table
    $charset_collate = $wpdb-> get_charset_collate ();
    $mm_mind_map = $wpdb->prefix. "mm_mind_map";
    $mm_mind_map_sql = "CREATE TABLE IF NOT EXISTS $mm_mind_map (
        id_mind_map mediumint (11) NOT NULL AUTO_INCREMENT,
        nom_mind_map varchar(75) NOT NULL,
        PRIMARY KEY  (id_mind_map)
    ) $charset_collate; ";
    require_once (ABSPATH. 'wp-admin/includes/upgrade.php');
    dbDelta ($mm_mind_map_sql);
    }
  ////////////////
  //Table : BULLE
  static function jal_install_bulle () {
    global $wpdb;
    //Appelation de la table
    $charset_collate = $wpdb-> get_charset_collate ();
    $mm_bulle = $wpdb->prefix. "mm_bulle";
    $mm_bulle_sql = "CREATE TABLE IF NOT EXISTS $mm_bulle (
        id_bulle mediumint (11) NOT NULL AUTO_INCREMENT,
            name_bulle varchar(75) NOT NULL,
            num_bulle tinytext NOT NULL,
            color_bulle varchar(255) NOT NULL,
            id_relation mediumint (11) NOT NULL,
            numero_relation tinytext NOT NULL,
            id_mind_map mediumint (11) NOT NULL,
            PRIMARY KEY  (id_bulle)
    ) $charset_collate; ";
    require_once (ABSPATH. 'wp-admin/includes/upgrade.php');
    dbDelta ($mm_bulle_sql); 
 }

  /////////////////////////
  // Données des tables //
  ///////////////////////
  
  //////////////////
  //Table : RELATION
  static function jal_install_data_relation () {
    global $wpdb;
    $wpdb->insert($wpdb->prefix.'mm_relation',
      array(
          'id_relation' => 1,
          'type_relation' => '1.1',
          'identite_bulle' => '1.1'
        ),
      array(
          '%d',
          '%s',
          '%s'
      )
    );

    global $wpdb;
    $wpdb->insert($wpdb->prefix.'mm_relation',
      array(
          'id_relation' => 2,
          'type_relation' => '1.2',
          'identite_bulle' => '1.2'
        ),
      array(
          '%d',
          '%s',
          '%s'
      )
    );

    global $wpdb;
    $wpdb->insert($wpdb->prefix.'mm_relation',
      array(
          'id_relation' => 3,
          'type_relation' => '1.3',
          'identite_bulle' => '1.3'
        ),
      array(
          '%d',
          '%s',
          '%s'
      )
    );
  
  
    global $wpdb;
    $wpdb->insert($wpdb->prefix.'mm_relation',
      array(
          'id_relation' => 4,
          'type_relation' => '1.4',
          'identite_bulle' => '1.4'
        ),
      array(
          '%d',
          '%s',
          '%s'
      )
    );

    global $wpdb;
    $wpdb->insert($wpdb->prefix.'mm_relation',
      array(
          'id_relation' => 5,
          'type_relation' => '1.5',
          'identite_bulle' => '1.5'
        ),
      array(
          '%d',
          '%s',
          '%s'
      )
    );
  }
  
  //////////////////
  //Table : MINDMAP
  static function jal_install_data_mindmap () {
    global $wpdb;
    $wpdb->insert($wpdb->prefix.'mm_mind_map',
        array(
            'id_mind_map' => 1,
            'nom_mind_map' => 'Test MindMap n°01'
        ),
        array(
            '%d',
            '%s',
            '%d'
        )
    );
 
    global $wpdb;
    $wpdb->insert($wpdb->prefix.'mm_mind_map',
        array(
            'id_mind_map' => 2,
            'nom_mind_map' => 'Test MindMap n°02'
        ),
        array(
            '%d',
            '%s',
            '%d'
        )
    );
  }

  ///////////////
  //Table : BULLE
  static function jal_install_data_bulle () {
    global $wpdb;
    $wpdb->insert($wpdb->prefix.'mm_bulle',
        array(
            'id_bulle' => 1,
            'name_bulle' => 'Test Bulle n°1.1',
            'num_bulle' => '1.1',
            'color_bulle' => '#B9656F',
            'id_relation' => 1,
            'numero_relation' => '1.1',
            'id_mind_map' => 1
        ),
        array(
            '%d',
            '%s',
            '%s',
            '%s',
            '%d',
            '%s',
            '%d'
        )
    );

    global $wpdb;
    $wpdb->insert($wpdb->prefix.'mm_bulle',
        array(
            'id_bulle' => 2,
            'name_bulle' => 'Test Bulle n°1.2',
            'num_bulle' => '1.2',
            'color_bulle' => '#B9656F',
            'id_relation' => 2,
            'numero_relation' => '1.2',
            'id_mind_map' => 1
        ),
        array(
            '%d',
            '%s',
            '%s',
            '%s',
            '%d',
            '%s',
            '%d'
        )
    );

    global $wpdb;
    $wpdb->insert($wpdb->prefix.'mm_bulle',
        array(
            'id_bulle' => 3,
            'name_bulle' => 'Test Bulle n°1.3',
            'num_bulle' => '1.3',
            'color_bulle' => '#B9656F',
            'id_relation' => 3,
            'numero_relation' => '1.3',
            'id_mind_map' => 1
        ),
        array(
            '%d',
            '%s',
            '%s',
            '%s',
            '%d',
            '%s',
            '%d'
        )
    );
  }
}

