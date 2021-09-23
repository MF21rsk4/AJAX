<?php
/**
 * Entity Abonne
 */
class Abonne {

  protected $id_abonne;
  protected $prenom;
  protected $nom;

  // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
  public function hydrate(array $donnees) {
     foreach ($donnees as $key => $value) {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);
      // Si le setter correspondant existe.
      if (method_exists($this, $method)) {
        // On appelle le setter.
        $this->$method($value);
      }
     }
  }

  public function getId_abonne() { return $this->id_abonne; }
  public function getPrenom() { return $this->prenom; }
  public function getNom() { return $this->nom; }

  /**
   * @param int $id
   */
  private function setId_abonne(int $id) {
    $this->id_abonne = $id;
  }

  /**
   * @param string $prenom
   */
  public function setPrenom(string $prenom) {
    if (is_string($prenom) && strlen($prenom) <= 50) {
      $this->prenom = $prenom;
    }  else {
        echo 'ERREUR ABONNE PRENOM'; die();
    }
  }

  /**
   * @param string $nom
   */
  public function setNom(string $nom) {
    if (is_string($nom) && strlen($nom) <= 50) {
      $this->nom = $nom;
    }  else {
        echo 'ERREUR ABONNE NOM'; die();
    }
  }

  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }  
}
