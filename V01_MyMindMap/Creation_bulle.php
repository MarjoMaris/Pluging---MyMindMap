<?php
require_once "Init.php";
// Instanciation des DAO
$bullesDAO = new BullesDAO();
$id_mind_map = isset($_GET['id_mind_map']) ? $_GET['id_mind_map'] : null;
// Lecture du formulaire
$submit = isset($_POST['submit']);
if ($submit) {
    // Crée un objet lignes à l'image des données
    $name_bulle = isset($_POST['name_bulle']) ? $_POST['name_bulle'] : null;
    $num_bulle = isset($_POST['num_bulle']) ? $_POST['num_bulle'] : null;
    $color_bulle = isset($_POST['color_bulle']) ? $_POST['color_bulle'] : null;
    $id_relation = isset($_POST['id_relation']) ? $_POST['id_relation'] : null;
    $id_mind_map = isset($_GET['id_mind_map']) ? $_GET['id_mind_map'] : null;
    $bulles = new Bulles(array(
      'name_bulle'=>$name_bulle,
      'num_bulle'=>$num_bulle,
      'color_bulle'=>$color_bulle,
      'id_relation'=>$id_relation,
      'id_mind_map'=>$id_mind_map 
    ));
    // Ajoute l'enregistrement dans la BD
    $bullesDAO->insert($bulles);
    // Redirection vers la liste des lignes
    wp_redirect('http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Bulle_MindMap');
} else {
    // Formulaire non soumi
    // Initialise l'objet métier
    $bulles = new Bulles();
}
?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Création bulle</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
    </head>
    <body>
        <?php include "Menu.php"; ?>
        <div class="py-5 text-center">
                <h2>Création d'une bulle</h2>
                <p class="lead">Rentrez vos informations pour permettre de créer votre bulle.</p>
            </div>
        <?php require_once "BullesForm.php";?>

    </body>
</html>