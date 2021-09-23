<?php

class Emprunt {

	private $id_emprunt;
	private $abonne_id;
	private $livre_id;
	private $date_emprunt;

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

	public function getId_emprunt() { return $this->id_emprunt; }
	public function getAbonne_id() { return $this->abonne_id; }
	public function getLivre_id() { return $this->livre_id; }
	public function getDate_emprunt() { return $this->date_emprunt; }

	private function setId_emprunt(int $id) {
		$this->id_emprunt = $id;
	}

	/**
	 * @param int $id
	 */
	public function setAbonne_id(int $id) {
		$this->abonne_id = $id;
	}

	/**
	 * @param int $id
	 */
	public function setLivre_id(int $id) {
		$this->livre_id = $id;
	}

	/**
	 * @param string $date
	 */
	public function setDate_emprunt(string $date) {
		$this->date_emprunt = $date;
	}

	public function __construct(array $donnees) {
	$this->hydrate($donnees);
	}
}
