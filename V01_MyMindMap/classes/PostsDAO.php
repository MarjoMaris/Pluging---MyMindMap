<?php
require_once plugin_dir_path(__FILE__)."DAO.php";
class PostsDAO extends DAO {
    /**
     * Constructeur
    */
    function __construct() {
        parent::__construct();
    }
    /** 
     * Lecture d'une ligne par son ID
     * @param int ID du posts
     * @return \Posts
    */
    public function find($id_posts)
    {
        $sql = "SELECT *
                FROM wp_posts
                WHERE ID=:ID";
        try {
            $params = array(":ID" => $id_posts);
            $sth=$this->executer($sql, $params);
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $posts=null;
        if ($row) {
            $posts = new Posts($row);
        }
        // Retourne l'objet métier
        return $posts;
    } // function find()

    /**
     * Lecture de tous les posts
     * @return array
    */
    public function findAll()
    {
        $sql = "SELECT * FROM wp_posts";
        try {
            $sth=$this->executer($sql);
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $les_posts = array();
        foreach ($rows as $row) {
            $les_posts[] = new Posts($row);
        }
        // Retourne un tableau d'objets "posts"
        return $les_posts;
    } // function findAll()

    /**
     * Ajout d'une page
     * @param \posts
     * @return int Nombre de mises à jour
    */

} //class PostsDAO