<?php

//suppresion fichier
if (isset( $_POST['submit_suppr'] )){
// supprimer dossier
  //verifier si le fichier ou le dossier existe déjà
  if(is_dir( $_POST['suppr'])){
    rmdir( $_POST['suppr']); // rmdir -> fonction de supression des dossiers
    echo'le dossier '.$_POST['suppr'].' vient d\'etre supprimé';
  } else if(is_file($_POST['suppr'])){
    unlink($_POST['suppr']); //fonction un-> supression des fichiers
    echo'le fichier '.$_POST['suppr'].' vient d\'etre supprimé';
  }else {
    echo $_POST['supression'].' : n\'existe pas';
  }
}
header('Location: ../index.php');
exit;
?>
