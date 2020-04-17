<?php
/**
 * Classe bulles
 *
 * @author Marjorie :D
 */
class Bulles
{
	////////////////////
	//// Attributs ////
	////////////////////
    private $id_bulle;
    private $name_bulle;
    private $num_bulle;
    private $color_bulle; 
    private $id_relation;
    private $numero_relation;
    private $id_mind_map;
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
	function getId_bulle() {
		return $this->id_bulle;
	}
  function getName_bulle() {
	  return $this->name_bulle;
	} 
  function getNum_bulle() {
	  return $this->num_bulle;
	} 
  function getColor_bulle() {
     return $this->color_bulle;
  }
  function getId_relation() {
    return $this->id_relation;
  }
  function getNumero_relation() {
    return $this->numero_relation;
  }
  function getId_mind_map() {
    return $this->id_mind_map;
  }
	//////////////////
	///// Setter /////
	//////////////////
	function setId_bulle($id_bulle) {
	  $this->id_bulle = $id_bulle;
	}  
  function setName_bulle($name_bulle) {
		$this->name_bulle = $name_bulle;
  } 
  function setNum_bulle($num_bulle) {
	  $this->num_bulle = $num_bulle;
  }   
  function setColor_bulle($color_bulle) {
    $this->color_bulle = $color_bulle;
  } 
  function setId_relation($id_relation) {
    $this->id_relation = $id_relation;
  }
  function setNumero_relation($numero_relation) {
    $this->numero_relation = $numero_relation;
  }
  function setId_mind_map($id_mind_map) {
    $this->id_mind_map = $id_mind_map;
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
}// Classe Bulles
