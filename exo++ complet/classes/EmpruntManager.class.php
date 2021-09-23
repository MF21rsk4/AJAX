<?php
require_once 'bdd.class.php';
/**
 * Entity Abonne Manager
 */
class empruntManager extends BDD {

  private $bdd;

  // Constructeur de la classe et récupération du connecteur de BDD
  public function __construct() { $this->bdd = $this->pdo(); }

  /**
   * @param Emprunt $emprunt
   * @return boolean
   */
  public function addEmprunt(Emprunt $emprunt) {
    // Préparation de la requête d'insertion. Assignation des valeurs. Exécution de la requête.
	    $add_emprunt = $this->bdd->prepare('INSERT INTO emprunt(abonne_id, livre_id, date_emprunt) VALUES(:abonne_id, :livre_id, :date_emprunt);');
	    $add_emprunt->bindValue(':abonne_id', $emprunt->getAbonne_id(), PDO::PARAM_INT);
      $add_emprunt->bindValue(':livre_id', $emprunt->getLivre_id(), PDO::PARAM_INT);
      $add_emprunt->bindValue(':date_emprunt', $emprunt->getDate_emprunt(), PDO::PARAM_STR);
	    $add_emprunt->execute();
      $add_emprunt->closeCursor();
      return ($add_emprunt->rowCount());
   } 

  /**
   * @param Emprunt $emprunt
   * @return boolean
   */
  public function updateEmprunt(Emprunt $emprunt) {
  // Prépare une requête de type UPDATE.
      $update_emprunt = $this->bdd->prepare('UPDATE emprunt SET abonne_id = :abonne_id, livre_id = :livre_id, date_emprunt = :date_emprunt WHERE id_emprunt='.$emprunt->getId_emprunt());
      $update_emprunt->bindValue(':abonne_id', $emprunt->getAbonne_id(), PDO::PARAM_INT);
      $update_emprunt->bindValue(':livre_id', $emprunt->getLivre_id(), PDO::PARAM_INT);
      $update_emprunt->bindValue(':date_emprunt', $emprunt->getDate_emprunt(), PDO::PARAM_STR);
      $update_emprunt->execute();
      $update_emprunt->closeCursor();
      return ($update_emprunt->rowCount());
  } 

  /**
   * @param  int $id 
   * @return boolean   
   */
  public function deleteEmprunt(int $id) {
  // Exécute une requête de type DELETE
      $delete_emprunt = $this->bdd->query('DELETE FROM emprunt WHERE id_emprunt = '.$id);
      $delete_emprunt->closeCursor();
      return ($delete_emprunt->rowCount());
  }      

  /**
   * @param  int $id 
   * @return array
   */
  public function getEmpruntbyId(int $id) {
    $emprunt = $this->bdd->query('SELECT * FROM emprunt WHERE id_emprunt ='.$id)->fetch(PDO::FETCH_ASSOC);
    return ($emprunt);
  }  

  /**
   * @return array
   */
  public function getListEmprunt() {
    $emprunts = $this->bdd->query('SELECT emprunt.id_emprunt AS id_emprunt, abonne.prenom AS prenom, abonne.nom AS nom, abonne.id_abonne AS id_abonne,
                                          livre.titre AS titre, livre.auteur AS auteur, livre.id_livre AS id_livre, emprunt.date_emprunt AS date_emprunt 
                      FROM abonne
                      JOIN emprunt ON abonne.id_abonne = emprunt.abonne_id
                      JOIN livre ON emprunt.livre_id = livre.id_livre;')->fetchAll(PDO::FETCH_ASSOC);
    return $emprunts;
  }   
}
