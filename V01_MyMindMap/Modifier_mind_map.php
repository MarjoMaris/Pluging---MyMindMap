<?php
require_once "Init.php";
// Instanciation des DAO
$MindMapDAO = new MindMapDAO();
$id_mind_map = isset($_GET['id_mind_map']) ? $_GET['id_mind_map'] : null;
// Lecture du formulaire
$submit = isset($_POST['submit']);
if ($submit) {
    $nom_mind_map = isset($_POST['nom_mind_map']) ? $_POST['nom_mind_map'] : null;
    $mindmap = new Mindmap(array(
        'id_mind_map'=>$id_mind_map,
      'nom_mind_map'=>$nom_mind_map
    ));
    // Ajoute l'enregistrement dans la BD
    $MindMapDAO->update($mindmap);
    // Redirection vers la liste des lignes
    echo("<script>document.location.href ='http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Menu_MindMap';</script>");
} else {
    $mindmap = $MindMapDAO->find($id_mind_map);
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Modification Mind_Map</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
    </head>

    <body>

        <?php include "Menu.php"; ?>

        <div class="py-5 text-center">
                <h2>Modification du Mind Map</h2>
                <p class="lead">Changez vos informations pour permettre de modifier votre mind map.</p>
            </div>

        <?php require_once "MindmapForm.php";?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
    </body>
</html>