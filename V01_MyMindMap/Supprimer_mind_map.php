<?php
require_once "Init.php";
// Instanciation des DAO
$mindmapDAO = new MindMapDAO();
// Récupère l'ID dans l'URL
$id_mind_map = isset($_GET['id_mind_map']) ? $_GET['id_mind_map'] : null;
// Lecture du formulaire
$submit = isset($_POST['submit']);
if ($submit) {
    // Formulaire soumi
    // Supprime l'enregistrement dans la BD
    $mindmapDAO->delete($id_mind_map);
    // Redirection vers la liste des bureaux
    echo("<script>document.location.href = 'http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Menu_MindMap';</script>");
} else {
    // Formulaire non soumi : lit l'objet métier
    $mindmap = $mindmapDAO->find($id_mind_map);
    $is_disabled=true; // Empèche toute saisie
}
?>
<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppression Mind Map</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
  </head>

  <body>

    <?php include "Menu.php"; ?>
    <br><br><br>
    <div class="py-5 text-center">
                  <h2>Suppression d'une bulle</h2>
              </div>

    <?php require_once "MindmapForm.php"; ?>
    <br><br><br><br><br><br><br><br><br><br><br><br>
  </body>

</html>