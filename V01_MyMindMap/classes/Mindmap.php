<?php
/**
 * Classe bulles
 *
 * @author Marjorie :D
*/
class Mindmap
{
	////////////////////
	//// Attributs ////
	////////////////////
    private $id_mind_map;
    private $nom_mind_map;
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
	function getId_mind_map() {
		return $this->id_mind_map;
	}
    function getNom_mind_map() {
		return $this->nom_mind_map;
	} 
	//////////////////
	///// Setter /////
	//////////////////
	function setId_mind_map($id_mind_map) {
        $this->id_mind_map = $id_mind_map;
    }
    function setNom_mind_map($nom_mind_map) {
	    $this->nom_mind_map = $nom_mind_map;
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
}// Classe Mindmap



