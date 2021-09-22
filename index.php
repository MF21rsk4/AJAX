<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>AJAX2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </head>

<body class="p-4 text-center">

    <h1 class="mb-5">Gestion des Véhicules</h1>

    <form id="vehicule" action="" method="">

        <p>
        <label for="marque">MARQUE : </label>
        <input type="text" name="marque" id="marque">

        <label for="modele" class="ms-5">MODELE : </label>
        <input type="text" name="modele" id="modele">
        </p>

        <p>
        <label for="annee" class="mt-2">ANNEE : </label>
        <input type="number" name="annee" id="annee">

        <label for="couleur" class="ms-5">COULEUR : </label>
        <input type="text" name="couleur" id="couleur">
        </p>

        <p><input class="mt-3" type="submit" value="Sauvegarder ce véhicule"></p>

    </form>

    <div class="msg" style="color: red"></div>

    <table class="table table-striped mt-5">
        <tr class="table-dark">
            <th>ID</th>
            <th>MARQUE</th>
            <th>MODELE</th>
            <th>ANNEE</th>
            <th>COULEUR</th>
        </tr>

        <tbody class="insert">
            <tr>
                <td colspan="5"  style="color: red">Aucun véhicule à afficher</td>
            </tr>
        </tbody>
    </table>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
