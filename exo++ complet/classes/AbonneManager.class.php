<?php
require_once 'bdd.class.php';
/**
 * Entity Abonne Manager
 */
class abonneManager extends BDD   {

  private $bdd;

  // Constructeur de la classe et récupération du connecteur de BDD
  public function __construct() { $this->bdd = $this->pdo(); }

  /**
   * @param Abonne $abonne
   * @return boolean
   */
  public function addAbonne(Abonne $abonne) {
    // Préparation de la requête d'insertion. Assignation des valeurs. Exécution de la requête.
	    $add_abonne = $this->bdd->prepare('INSERT INTO abonne(prenom, nom) VALUES(:prenom, :nom);');
	    $add_abonne->bindValue(':prenom', $abonne->getPrenom(), PDO::PARAM_STR);
      $add_abonne->bindValue(':nom', $abonne->getNom(), PDO::PARAM_STR);      
	    $add_abonne->execute();
      $add_abonne->closeCursor();
      return ($add_abonne->rowCount());
   } 

   /**
    * @param  Abonne $abonne 
    * @return boolean
    */
  public function updateAbonne(Abonne $abonne) {
  // Prépare une requête de type UPDATE.
      $update_abonne = $this->bdd->prepare('UPDATE abonne SET prenom = :prenom, nom = :nom WHERE id_abonne='.$abonne->getId_abonne());
      $update_abonne->bindValue(':prenom', $abonne->getPrenom(), PDO::PARAM_STR);
      $update_abonne->bindValue(':nom', $abonne->getNom(), PDO::PARAM_STR);      
      $update_abonne->execute();
      $update_abonne->closeCursor();
      return ($update_abonne->rowCount());
  } 

  /**
   * @param  int $id 
   * @return boolean   
   */
  public function deleteAbonne(int $id) {
  // Exécute une requête de type DELETE
      $delete_abonne = $this->bdd->query('DELETE FROM abonne WHERE id_abonne = '.$id);
      $delete_abonne->closeCursor();
      return ($delete_abonne->rowCount());
  }      

  /**
   * @param  int $id 
   * @return array
   */
  public function getAbonnebyId(int $id) {
    $abonne = $this->bdd->query('SELECT * FROM abonne WHERE id_abonne ='.$id)->fetch(PDO::FETCH_ASSOC);
    return ($abonne);
  }   

  /**
   * @return array
   */
  public function getListAbonne() {
    $abonnes = $this->bdd->query('SELECT * FROM abonne;')->fetchAll(PDO::FETCH_ASSOC);
    return $abonnes;
  }   
}
