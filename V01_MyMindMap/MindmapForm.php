<?php
// Si l'action n'est pas fournie, on la crée avec la valeur par défaut (le formulaire s'appelle lui-même) 
if (!isset($action)) {
  $action = '#';
}
// Si l'ID n'est pas fourni, on ne la passe pas dans la query string de l'URL
$query_string=null;
if ($mindmap-> getId_mind_map() !=""){
  $query_string = "?id=".$mindmap-> getId_mind_map();
}
// Empèche la saisie dans le formulaire si le booléen $is_disabled est à vrai
$disabled="";
if (isset($is_disabled) && $is_disabled==true) {
  $disabled="disabled";
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <title>MIND MAP - Création d'un MIND MAP</title>
    </head>

    <body>


        <!-- HTML - Formulaire Creation d'un MIND MAP -->
        <div class="container">
            <main role="main" class="container">
                <div class="jumbotron">
                    <div class="col-md-6 order-md-4">
                        <h4 class="mb-3 md-3">Formulaire : </h4>
                        <form class="needs-validation" method="post" action="<?php echo $action.$query_string; ?>">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Nom du MindMap</label>
                                        <input type="text" class="form-control" name="nom_mind_map" id="nom_mind_map" value="<?php echo $mindmap->getNom_mind_map(); ?>" <?php echo $disabled; ?>>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-outline-secondary" name="submit" value="Valider">
                                
                         </form>
                    </div>
                </div>
            </main>
        </div>
    </body>

</html>