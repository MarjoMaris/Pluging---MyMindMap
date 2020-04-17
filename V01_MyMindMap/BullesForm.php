<?php
// Si l'action n'est pas fournie, on la crée avec la valeur par défaut (le formulaire s'appelle lui-même) 
if (!isset($action)) {
  $action = '#';
}
// Si l'ID n'est pas fourni, on ne la passe pas dans la query string de l'URL
$query_string=null;
if ($bulles-> getId_bulle() !=""){
  $query_string = "?id=".$bulles-> getId_bulle();
}
// Empèche la saisie dans le formulaire si le booléen $is_disabled est à vrai
$disabled="";
if (isset($is_disabled) && $is_disabled==true) {
  $disabled="disabled";
}
                              
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <title>MIND MAP - Création d'une bulle</title>
    </head>
    <body>


        <!-- HTML - Formulaire Creation d'une bulle -->
        <div class="container">

            <main role="main" class="container">
                <div class="jumbotron">
        
                    <div class="col-md-6 order-md-4">
                        <h4 class="mb-3 md-3">Formulaire : </h4>
                        <form class="needs-validation" method="post" action="<?php echo $action.$query_string; ?>">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" name="name_bulle" id="name_bulle" value="<?php echo $bulles->getName_bulle(); ?>" <?php echo $disabled; ?>>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Numéro Bulle</label>
                                        <select class="custom-select d-block w-100" name="num_bulle" id="num_bulle" value="<?php echo $bulles->getNum_bulle(); ?>" <?php echo $disabled; ?>>
                                            <?php 
                                                if(isset($_GET['id_mind_map'])){
                                                    $les_relation=array();
                                                    $dao = new RelationDAO(); 
                                                    $les_relation = $dao->findAll(); 
                                            
                                                    foreach ($les_relation as $relation){
                                                        $numero_bulle=$relation->getIdentite_bulle();
                                                        echo"<option value=".$numero_bulle.">$numero_bulle</option>";
                                                    }
                                                }
                                            ?> 
                                        </select>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label>Relier à ...</label>
                                            <select class="custom-select d-block w-100" name="id_relation" id="id_relation" value="<?php echo $bulles->getId_relation(); ?>" <?php echo $disabled; ?>>
                                            <?php
                                                foreach ($les_relation as $relation){
                                                    
                                                    $numero_relation=$relation->getType_relation();
                                                    $numero_id=$relation->getId_relation();
                                                    echo"<option value=".$numero_id.">$numero_relation</option>";
                                                }
                                            ?> 
                                            </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Couleur bulle :</label><br>
                                        <input type="color" id="color_bulle" name="color_bulle" value="<?php echo $bulles->getColor_bulle(); ?>" <?php echo $disabled; ?>>
                                    </div>
                                </div>
                                <br>
                                <input type="submit" class="btn btn-outline-secondary" name="submit" value="Valider">
                         </form>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>