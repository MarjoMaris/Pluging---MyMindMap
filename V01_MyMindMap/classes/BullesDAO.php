<?php
require_once plugin_dir_path(__FILE__)."DAO.php";
class BullesDAO extends DAO {
    /**
     * Constructeur
    */
    function __construct() {
        parent::__construct();
    }
    /** 
     * Lecture d'une ligne par son ID
     * @param int ID de le ligne
     * @return \Bulles
    */
    public function find($id_bulle)
    {
        $sql = "SELECT *
                FROM wp_mm_bulle 
                WHERE id_bulle=:id_bulle";
        try {
            $params = array(":id_bulle" => $id_bulle);
            $sth=$this->executer($sql, $params);
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $bulles=null;
        if ($row) {
            $bulles = new Bulles($row);
        }
        // Retourne l'objet métier
        return $bulles;
    } // function find()
    /**
     * Lecture de tous les lignes
     * @return array
    */
    public function findAll()
    {
        $sql = "SELECT *
                FROM wp_mm_bulle 
                WHERE id_mind_map=".$_GET['id_mind_map']."";
        try {
            $sth=$this->executer($sql);
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $les_bulles = array();
        foreach ($rows as $row) {
            $les_bulles[] = new Bulles($row);
        }
        // Retourne un tableau d'objets "lignes"
        return $les_bulles;
    } // function findAll()

    
 
    /**
     * Ajout d'une bulle
     * @param \bulles
     * @return int Nombre de mises à jour
    */
    public function insert(bulles $bulles){
        $sql =  "INSERT INTO wp_mm_bulle(name_bulle, num_bulle, color_bulle, id_relation, num_relation, id_mind_map) 
        VALUES (:name_bulle, :num_bulle, :color_bulle, :id_relation, :numero_relation, :id_mind_map)";
        $params = array(
            ":name_bulle"=>$bulles->getName_bulle(),
            ":num_bulle"=>$bulles->getNum_bulle(),
            ":color_bulle"=>$bulles->getColor_bulle(),
            ":id_relation"=>$bulles->getId_relation(),
            ":numero_relation"=>$bulles->getNumero_relation(),
            ":id_mind_map"=>$bulles->getId_mind_map()
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
     * Modification d'une bulles
     * @param \bulles
     * @return int Nombre de mises à jour
    */
    function update(bulles $bulles){
        $sql = "UPDATE wp_mm_bulle
                SET id_bulle=:id_bulle,
                    name_bulle=:name_bulle,
                    num_bulle=:num_bulle,
                    color_bulle=:color_bulle,
                    id_relation=:id_relation,
                    numero_relation=:num_relation,
                    id_mind_map=:id_mind_map
                WHERE id_bulle=:id_bulle";
        $params = array(
            ":id_bulle" => $bulles->getId_bulle(), 
            ":name_bulle" => $bulles->getName_bulle(),
            ":num_bulle" => $bulles->getNum_bulle(),
            ":color_bulle" => $bulles->getColor_bulle(),
            ":id_relation" => $bulles->getId_relation(),
            ":numero_relation"=>$bulles->getNumero_relation(),
            ":id_mind_map"=>$bulles->getId_mind_map()
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
     * Suppression d'une bulle
     * @param int ID d'une bulle
     * @return int Nombre de mises à jour
    */
    function delete($id_bulle){
        $sql = "DELETE FROM wp_mm_bulle 
                WHERE id_bulle=:id_bulle";
            $params = array(
                ":id_bulle"=>$id_bulle
            );     
            try {
                $sth = $this->executer($sql, $params);
                $nb = $sth->rowcount();
            } catch (PDOException $e) {
                die("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            return $nb;
            }
} //class BullesDAO