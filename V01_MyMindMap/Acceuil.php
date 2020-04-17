<?php
require_once "Init.php";
// Crée le tableau d'objets métier "mindmap"
$les_mindmap=array();
$dao = new MindMapDAO(); 
$les_mindmap = $dao->findAll(); 

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Mind Map</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <div class="container">
                <header>
                    <?php include "Menu.php";?>
                </header>
                
                </br></br>
                
                    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                        <h1 class="display-4">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Bienvenue sur MyMindMap</font>
                            </font>
                        </h1>
                        <p class="lead">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Liste des MindMap</font>
                            </font>
                        </p>
                    </div>

                    </br></br>

                    <p>Veuillez cliquez sur : <a href="http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Creation_MindMap" role="button" aria-pressed="true">Création MindMap</a> , si vous voulez créer un nouveau MindMap</p>
                    
                    <div class="alba wrapper">
                        <div class="innerTable">
                            <div class="row mb-3">
                                <div class="col-md-12">
                            
                                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-2 shadow-sm h-md-0 position-relative">
                                        <div class="col p-1 d-flex flex-column position-static">
                                            <div style="overflow:auto; 1px solid; width: auto; height: 370px;">
                                                <table>
                                                        <thead>
                                                            <tr class="table100-head">
                                                                <th class="column1">MindMap n°</th>
                                                                <th class="column2">Nom</th>
                                                                <th class="column3">Outils</th>
                                                                <th class="column4">Bulles</th>
                                                            </tr>
                                                        </thead>
                                                       
                                                        <tbody>
                                                                <?php  
                                                                    if(isset($les_mindmap)){
                                                                            foreach ($les_mindmap as $mindmap){
                                                                                echo '<tr>';                                                              
                                                                                    echo '<td>'.$mindmap->getId_mind_map().'</td>';
                                                                                    echo '<td>'.$mindmap->getNom_mind_map().'</td>';
                                                                                    echo '<td>[<a href="http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Modification_MindMap&id_mind_map='.$mindmap->getId_mind_map().'">Modifier</a>]<br>
                                                                                    [<a href="http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Suppression_MindMap&id_mind_map='.$mindmap->getId_mind_map().'">Supprimer</a>] </td>';
                                                                                    echo '<td>[<a href="http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=Bulle_MindMap&id_mind_map='.$mindmap->getId_mind_map().'">cliquez-ici</a>]</td>';
                                                                                echo '</tr>';
                                                                            }
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
                    <p>Vous arrivez pas à comprendre le fonctionnement de ce mini-plugin ? <a href="http://localhost/projets/STAGE/WordPress-master/wp-admin/admin.php?page=MyMindMap_Acceuil_Sub_Aide">Cliquez-ici</a>, ceci vous ramènera à une page dédiée aux explications du fonctionnement du plugin en détails</p> 
            </div>
            <br><br>
    </body>
</html>