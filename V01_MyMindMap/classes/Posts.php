<?php
/**
 * Classe posts
 *
 * @author Marjorie :D
 */
class Posts
{
	////////////////////
	//// Attributs ////
  ////////////////////
    private $id_posts;
    private $post_title;
    private $post_type;
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
  function getId_posts() {
		return $this->id_posts;
	}
	function getPost_title() {
		return $this->post_title;
	}
    function getPost_type() {
	  return $this->post_type;
	} 
  
	//////////////////
	///// Setter /////
  //////////////////
  function setId_posts($id_posts) {
	  $this->id_posts = $id_posts;
	}  
	function setPost_title($post_title) {
	  $this->post_title = $post_title;
	}  
    function setPost_type($post_type) {
		$this->post_type = $post_type;
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
}// Classe posts
