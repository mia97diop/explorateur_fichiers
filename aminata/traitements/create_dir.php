<?php

//creation dossier
if (isset( $_POST['submit_dir'] )){
              // Le nom du dossier à créer

                //verifier si le repertoire existe déjàt
                if(is_dir( $_POST['create_dir'])) // fonction is_dir -> vérifie si il y a un dossier qui porte le nom entré par l'utilisateur
                {
                    echo'le repertoire existe déjà';
                }

                //création d'un nouveau dossier
                else
                {
                    mkdir( $_POST['create_dir']); // mkdir -> fonction de création de dossiers
                    echo'le dossier '.$_POST['create_dir'].' vient d\'etre créé';
                }
            }
header('Location: ../index.php');
exit;
 ?>
