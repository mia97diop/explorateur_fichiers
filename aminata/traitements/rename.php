<?php

//renommage fichier ou dossier
if (isset($_POST['submit_rename'] )) {
  if(is_dir($_POST['old_name'])) {
    if (is_dir($_POST['new_name'])) {
      echo'le nom '.$_POST['new_name'].' existe deja';
    } else {
      rename($_POST['old_name'],$_POST['new_name']);
    }
  } else if (is_file($_POST['old-name'])) {
    if (is_file( $_POST['new_name'])) {
      echo'le nom '.$_POST['new_name'].' existe deja';
    } else {
      rename($_POST['old_name'],$_POST['new_name']);
      }
  }
}
header('Location: ../index.php');
exit;

 ?>
