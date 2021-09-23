<?php
require_once 'bdd.class.php';

/**
 * Entity Livre Manager
 */ 
class livreManager extends BDD {

  private $bdd;

  // Constructeur de la classe et récupération du connecteur de BDD
  public function __construct() { $this->bdd = $this->pdo(); }

  /**
   * @param Livre $livre
   * @return boolean
   */
  public function addLivre(Livre $livre) {
    // Préparation de la requête d'insertion. Assignation des valeurs. Exécution de la requête.
	    $add_livre = $this->bdd->prepare('INSERT INTO livre(titre, auteur) VALUES(:titre, :auteur);');
	    $add_livre->bindValue(':titre', $livre->getTitre(), PDO::PARAM_STR);
      $add_livre->bindValue(':auteur', $livre->getAuteur(), PDO::PARAM_STR);      
	    $add_livre->execute();
      $add_livre->closeCursor();
      return ($add_livre->rowCount());
   } 

  /**
   * @param Livre $livre
   * @return boolean
   */
  public function updateLivre(Livre $livre) {
  // Prépare une requête de type UPDATE.
      $update_livre = $this->bdd->prepare('UPDATE livre SET titre = :titre, auteur = :auteur WHERE id_livre='.$livre->getId_livre());
      $update_livre->bindValue(':titre', $livre->getTitre(), PDO::PARAM_STR);
      $update_livre->bindValue(':auteur', $livre->getAuteur(), PDO::PARAM_STR);      
      $update_livre->execute();
      $update_livre->closeCursor();
      return ($update_livre->rowCount());
} 

  /**
   * @param  int $id 
   * @return boolean   
   */
  public function deleteLivre(int $id) {
  // Exécute une requête de type DELETE
      $delete_livre = $this->bdd->query('DELETE FROM livre WHERE id_livre = '.$id);
      $delete_livre->closeCursor();
      return ($delete_livre->rowCount());
  }      

  /**
   * @param  int $id 
   * @return array
   */
  public function getLivrebyId(int $id) {
    $livre = $this->bdd->query('SELECT * FROM livre WHERE id_livre ='.$id)->fetch(PDO::FETCH_ASSOC);
    return ($livre);
  }   

  /**
   * @param  int $id 
   * @return array
   */
  public function getListLivre() {
    $livres = $this->bdd->query('SELECT * FROM livre;')->fetchAll(PDO::FETCH_ASSOC);
    return $livres;
  }   
}
