<?php
require_once '../inc/connexion.php';

if (isset($_POST['action']) && $_POST['action']=='affiche') {   //je recois la requete ajax pour afficher les véhicules
    
    // J'effectue la requête de lecture dans la table que je renvoie dans un tableau
    $tab['vehicules'] = $bdd->query('SELECT * FROM vehicule')->fetchAll(PDO::FETCH_ASSOC);
    // Je prépare une variable qui me permettra de savoir si j'ai des véhicules dans ma base de données
    // Je regarde si le tableau contient des véhicules si oui la variable passe à 'Vrai'
    $tab['resultat'] = ( count($tab['vehicules']) > 0 );
    // je renvoie mon tableau de véhicules et ma variable de controle en JSON à la requête Ajax
    echo json_encode($tab);
}


if(isset($_POST['action']) && $_POST['action']=='insert'){  //je recois la requete ajax pour inserer un véhicule

    //j'écris ma requête SQL d'insertion puis j'affecte les valeurs envoyées par la méthode AJAX en 'POST'
    $insertVehicule = $bdd->prepare('INSERT INTO vehicule (marque, modele, annee, couleur) VALUES (:marque, :modele, :annee, :couleur)');
    $insertVehicule->bindValue(':marque', $_POST['marque'], PDO::PARAM_STR);
    $insertVehicule->bindValue(':modele', $_POST['modele'], PDO::PARAM_STR);
    $insertVehicule->bindValue(':annee', $_POST['annee'], PDO::PARAM_INT);
    $insertVehicule->bindValue(':couleur', $_POST['couleur'], PDO::PARAM_STR);
    // Je prépare une variable qui me permettra de savoir si l'insertion en BDD a fonctionné
    // J'execute la requête. Si tout s'est bien passé ma variable est 'Vrai'
    $tab['resultat'] = ($insertVehicule->execute());
    // je renvoie la variable de controle en JSON à la requête Ajax
    echo json_encode($tab);
}
