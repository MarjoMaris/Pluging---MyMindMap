<?php
// Connection à la BDD
require_once "Init.php";
// Récupère l'ID dans l'URL
if(isset($_GET['id_mind_map'])){
    $les_bulles=array();
     $dao = new BullesDAO(); 
    $les_bulles = $dao->findAll(); 
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Tableau V01</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        
    </head>
    <body>
        <div class="container">
            <header>
                <?php include "Menu.php";?>
            </header>

            <br><br>

            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h4 class="display-4">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Liste des bulles</font>
                    </font>
                </h4>
            </div>

            <br>
            
            <p>Veuillez cliquez sur : <a href="http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Creation_Bulle_MindMap&id_mind_map='<?php echo $_GET['id_mind_map']; ?>'">Création Bulle</a> , si vous voulez créer une nouvelle bulle</p>
                <div class="alba wrapper">
                    <div class="innerTable">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-2 shadow-sm h-md-0 position-relative">
                                    <div class="col p-1 d-flex flex-column position-static"> 
                                        <div style="overflow:auto; 1px solid; width: auto; height: 367px;">
                                            <table>
                                                    <thead>
                                                        <tr class="table100-head">
                                                            <th class="column1">ID</th>
                                                            <th class="column2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                            <th class="column3">Numéro</th>
                                                            <th class="column4">Relier à ...</th>
                                                            <th class="column5">Couleur</th>
                                                            <th class="column6">Outils</th>
                                                        </tr>
                                                    </thead>  

                                                    <tbody>
                                                        <?php
                                                                foreach ($les_bulles as $bulles)
                                                                {
                                                                    echo '<tr>';
                                                                        echo '<td>'.$bulles->getId_bulle().'</td>';
                                                                        echo '<td>'.$bulles->getName_bulle().'</td>';
                                                                        echo '<td>'.$bulles->getNum_bulle().'</td>';
                                                                        echo '<td>'.$bulles->getNumero_relation().'</td>';
                                                                        echo '<td><input type="color" value="'.$bulles->getColor_bulle().'" disabled></td>';
                                                                        echo '<td>[<a href="http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Modification_Bulle_MindMap&id_mind_map='.$_GET['id_mind_map'].'&amp;id_bulle='.$bulles->getId_bulle().'">Modifier</a>]<br>
                                                                                [<a href="http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Suppression_Bulle_MindMap&id_mind_map='.$_GET['id_mind_map'].'&amp;id_bulle='.$bulles->getId_bulle().'">Supprimer</a>]
                                                                        </td>';
                                                                    echo '</tr>';

                                                                }
                                                        ?>
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    
               
                    echo  '<button class="btn btn-outline-primary my-1 my-sm-3" type="submit" ">
                                <font style="vertical-align: center;"></font>
                                <font style="vertical-align: center;"></font>
                                <a href="http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Deploiment1_Bulle_MindMap&id_mind_map='.$_GET['id_mind_map'].'" role="button" aria-pressed="true">Déploiment</a>
                            </button>'; 
                ?>
                
               
        </div>

<br><br>
<br>
<br>


    </body>
</html>