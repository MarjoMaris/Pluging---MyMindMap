<?php
require_once plugin_dir_path(__FILE__)."DAO.php";
class MindmapDAO extends DAO {
    /**
     * Constructeur
    */
    function __construct() {
        parent::__construct();
    }
    /** 
     * Lecture d'un mindmap par son ID
     * @param int ID de le mindmap
     * @return \Mindmap
    */
    public function find($id_mind_map)
    {
        $sql = "SELECT * FROM wp_mm_mind_map WHERE id_mind_map= :id_mind_map";
        try {
            $params = array(":id_mind_map" => $id_mind_map);
            $sth=$this->executer($sql, $params);
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $mindmap=null;
        if ($row) {
            $mindmap = new Mindmap($row);
        }
        // Retourne l'objet métier
        return $mindmap;
    } // function find()
    /**
     * Lecture de tous les mindmaps
     * @return array
    */
    public function findAll()
    {
        $sql = "SELECT * FROM wp_mm_mind_map";
        try {
            $sth=$this->executer($sql);
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $les_mindmap = array();
        foreach ($rows as $row) {
            $les_mindmap[] = new Mindmap($row);
        }
        // Retourne un tableau d'objets "mindmaps"
        return $les_mindmap;
    } // function findAll()
    /**
     * Ajout d'un mindmap
     * @param \mindmap
     * @return int Nombre de mises à jour
    */
    public function insert(mindmap $mindmap){
        $sql =  "INSERT INTO wp_mm_mind_map(nom_mind_map) VALUES (:nom_mind_map)";
        $params = array(
            ":nom_mind_map"=>$mindmap->getNom_mind_map()
        );     
        try {
            $sth = $this->executer($sql, $params);
            $nb = $sth->rowcount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        return $nb;
    }
    /**
     * Modification d'un mindmap
     * @param \mindmap
     * @return int Nombre de mises à jour
    */
    function update(mindmap $mindmap){
        $sql = "UPDATE wp_mm_mind_map
                SET id_mind_map=:id_mind_map,
                    nom_mind_map=:nom_mind_map
                WHERE id_mind_map=:id_mind_map";
        $params = array(
            ":id_mind_map" => $mindmap->getId_mind_map(), 
            ":nom_mind_map" => $mindmap->getNom_mind_map()
        );     
        try {
            $sth = $this->executer($sql, $params);
            $nb = $sth->rowcount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        return $nb;
    }
    /**
     * Suppression d'un mindmap
     * @param int ID d'un mindmap
     * @return int Nombre de mises à jour
    */
    function delete($id_mind_map){
        $sql = "DELETE FROM wp_mm_mind_map
                WHERE id_mind_map=:id_mind_map";
            $params = array(
                ":id_mind_map"=>$id_mind_map
            );    
            try {
                $sth = $this->executer($sql, $params);
                $nb = $sth->rowcount();
            } catch (PDOException $e) {
                die("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            return $nb;
            }
} //class MindmapDAO