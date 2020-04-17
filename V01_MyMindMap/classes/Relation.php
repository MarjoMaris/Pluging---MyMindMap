<?php
/**
 * Classe bulles
 *
 * @author Marjorie :D
*/
class Relation
{
	////////////////////
	//// Attributs ////
	////////////////////
    private $id_relation;
    private $type_relation;
    private $identite_bulle;
   	//////////////////
	// Constructeur //
	/////////////////
    public function __construct(array $tableau = null)
    {
        if ($tableau != null) {
            $this->fill($tableau);
        }
	}
	//////////////////
	///// Getter ///// 
	//////////////////
	function getId_relation() {
		return $this->id_relation;
	}
    function getType_relation() {
		return $this->type_relation;
	}  
    function getIdentite_bulle() {
		return $this->identite_bulle;
    }    
	//////////////////
	///// Setter /////
	//////////////////
	function setId_relation($id_relation) {
		$this->id_relation = $id_relation;
	}
    function setType_relation($type_relation) {
	    $this->type_relation = $type_relation;
	}  
    function setIdentite_bulle($identite_bulle) {
	    $this->identite_bulle = $identite_bulle;
	} 
    /**
     * Hydrateur
     * Alimente les propriétés à partir d'un tableau
     * @param array $tableau
     */
    public function fill(array $tableau)
    {
        foreach ($tableau as $cle => $valeur) {
            $methode = 'set' . $cle;
            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }
    /**
     * Retourne un tableau du contenu de l'objet
     *
     * @return array
     */
    public function dump()
    {
        return get_object_vars($this);
    }
    /**
     * Affiche la liste des propriétés de l'objet courant
     *
     * @return string les propriétés sous la forme d'une liste à puce HTML
     */
    public function afficher()
    {
        $tableau = $this->dump();
        $html = '<ul>';
        foreach ($tableau as $cle=>$valeur) {
            $html .= '<li>' . $cle . ' = '.$valeur. '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}// Classe Relation


