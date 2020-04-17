<?php
// Connection à la BDD
require_once "Init.php";

//Si Id_mind_map existe faire :
if(isset($_GET['id_mind_map'])){
    $les_bulles=array();
    $dao = new BullesDAO(); 
    $les_bulles = $dao->findAll(); 
}
// Lecture du formulaire
$submit = isset($_POST['submit']);
//Vérification si le slug existe
function the_slug_exists($name_bubulle) {
    global $wpdb;
    if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $name_bubulle . "'", 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}

if ($submit) {
    foreach ($les_bulles as $bulles)
        {
           //Recupération du nom de la bulle
           $name_bubulle=$bulles->getName_bulle();
           $numero_bubulle=$bulles->getNum_bulle();
             //Création slug
           $var = sanitize_title($name_bubulle);

           if ($numero_bubulle=='1.1'){
            if (!the_slug_exists($var)){
                $page = array(
                    'post_type' => 'page',
                    'post_title' => $name_bubulle,
                    'post_name' => $var,
                    'post_parent' => 0

                );
                wp_insert_post($page);
            }
           } else {
            if (!the_slug_exists($var)){
                $page = array(
                    'post_type' => 'page',
                    'post_title' => $name_bubulle,
                    'post_name' => $var,
                    'post_parent' => 1

                );
                wp_insert_post($page);
            }
           }
            
        }   
   echo("<script>document.location.href = 'http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Menu_MindMap';</script>");
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
        <title>Deploiment</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  

    <body>

        <?php include "Menu.php"; ?>

        <div class="py-5 text-center">
                <h2>Deploiment des pages </h2>
                <p class="lead">Vérification pour le appelation des pages</p>
        </div>
        
        <div class="container">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h6 class="border-bottom border-gray pb-2 mb-0">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Page(s)</font>
                    </font>
                </h6>
            </div>
            <div class="alba wrapper">
                <div class="innerTable">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-2 shadow-sm h-md-0 position-relative">
                                <div class="col p-1 d-flex flex-column position-static"> 
                                    <div style="overflow:auto; 1px solid; width: auto; height: 280px;">
                                        <div class="container">
                                            <table>  
                                                <?php
                                                    foreach ($les_bulles as $bulles){
                                                        echo '<div class="media text-muted pt-3">';
                                                            echo '<svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Espace réservé: 32x32">';
                                                                    echo '<rect width="100%" height="100%" fill="'.$bulles->getColor_bulle().'"></rect>';
                                                            echo '</svg>';
                                                            echo '<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">';
                                                                echo '<strong class="d-block text-gray-dark">';
                                                                        echo '<font style="vertical-align: align;">';
                                                                            echo '<font style="vertical-align: inherit;">'.$bulles->getName_bulle().'</font>';
                                                                        echo '</font>';
                                                                echo '</strong>';
                                                            echo '</p>';
                                                        echo '</div>';
                                                    }
                                                ?>           
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form class="needs-validation" method="post" action="<?php echo $action.$query_string; ?>">
                <input type="submit" class="btn btn-outline-secondary" name="submit" value="Valider"></input>
            </form>
        </div>
        <br><br><br><br><br><br><br><br>
    </body>
</html>