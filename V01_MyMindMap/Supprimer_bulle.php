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
    // Supprime l'enregistrement dans la BD
    $bullesDAO->delete($id_bulle);
    // Redirection vers la liste des bureaux
    header("<script>document.location.href = 'http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Bulle_MindMap';</script>");
} else {
    // Formulaire non soumi : lit l'objet métier
    $bulles = $bullesDAO->find($id_bulle);
    $is_disabled=true; // Empèche toute saisie
}
?>
<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppression bulle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
    <link rel="stylesheet" type ="text/css" href="Css/FREDI.css">
  </head>

  <body>

    <?php include "Menu.php"; ?>
    <br><br>
    <div class="py-5 text-center">
                  <h2>Suppression d'une bulle</h2>
              </div>
              <br><br>
    <?php require_once "BullesForm.php"; ?>
  <br><br><br>
  </body>

</html>