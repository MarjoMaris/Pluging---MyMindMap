<?php
require_once plugin_dir_path(__FILE__)."DAO.php";
class RelationDAO extends DAO {
    /**
     * Constructeur
    */
    function __construct() {
        parent::__construct();
    }
    /** 
     * Lecture d'une relation par son ID
     * @param int ID de relation
     * @return \Relation
    */
    public function find($id_relation)
    {
        $sql = "SELECT * 
                FROM wp_mm_relation
                WHERE id_relation=:id_relation";
        try {
            $params = array(":id_relation" => $id_relation);
            $sth=$this->executer($sql, $params);
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $relation=null;
        if ($row) {
            $relation = new Relation($row);
        }
        // Retourne l'objet métier
        return $relation;
    } // function find()
    /**
     * Lecture de tous les relations
     * @return array
    */
    public function findAll()
    {
        $sql = "SELECT * 
                FROM wp_mm_relation 
                WHERE id_relation";
        try {
            $sth=$this->executer($sql);
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $les_relation = array();
        foreach ($rows as $row) {
            $les_relation[] = new Relation($row);
        }
        // Retourne un tableau d'objets "relation"
        return $les_relation;
    } // function findAll()
    
} //Classe RelationDAO