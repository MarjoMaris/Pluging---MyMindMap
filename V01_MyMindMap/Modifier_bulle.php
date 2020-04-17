<?php
require_once "Init.php";
// Instanciation des DAO
$bullesDAO = new BullesDAO();
// Récupère l'ID dans l'URL
$id_bulle = isset($_GET['id_bulle']) ? $_GET['id_bulle'] : null;
$id_mind_map = isset($_GET['id_mind_map']) ? $_GET['id_mind_map'] : null;
// Lecture du formulaire
$submit = isset($_POST['submit']);
if ($submit) {
    // Formulaire soumi
    // Récupère les données du formulaire
    $name_bulle = isset($_POST['name_bulle']) ? $_POST['name_bulle'] : null;
    $num_bulle = isset($_POST['num_bulle']) ? $_POST['num_bulle'] : null;
    $color_bulle = isset($_POST['color_bulle']) ? $_POST['color_bulle'] : null;
    $id_relation = isset($_POST['id_relation']) ? $_POST['id_relation'] : null;
    $bulles = new Bulles(array(
      'id_bulle'=>$id_bulle,
      'name_bulle'=>$name_bulle,
      'num_bulle'=>$num_bulle,
      'color_bulle'=>$color_bulle,
      'id_relation'=>$id_relation,
      'id_mind_map'=>$id_mind_map
    ));
    // Ajoute l'enregistrement dans la BD
    $bullesDAO->update($bulles);
    // Redirection vers la liste des bulles
    header("<script>document.location.href = 'http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Bulle_MindMap';</script>");
} else {
    $bulles = $bullesDAO->find($id_bulle);
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Modification bulle</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
    </head>
    <body>

        <?php include "Menu.php"; ?>

        <div class="py-5 text-center">
                <h2>Modification d'une bulle</h2>
                <p class="lead">Changez vos informations pour permettre de modifier votre bulle.</p>
            </div>

        <?php require_once "BullesForm.php";?>
        
        <br><br><br><br><br>
    </body>
</html>