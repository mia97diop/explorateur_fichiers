<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Explorateur d'Aminata</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style media="screen">
      img{
        width:28px;
      }
      .navig
      {
        background-color:#f5f5f5;
    width: 100%;
    height:809px;
      }
      #sharch
{
    position: relative;
    left:1000px;
    top: 14px;
    border-radius: 10px;
}
header
{
    background-color: #1d2d44;
    position: relative;
    margin-left:-7px;
    width: 101%;
    height: 58px;
    margin-top: -8px;
}
#bout
{
    background-color:#707b88;
    width:100%;
    left: 31px;
    position: relative;
}
body
{
    background-color:#e7eaed;
}
.grandiv
{
    height:66em;
}
#row2
{
    width:100%;
    left: 31px;
    position: relative;  
}
#col1
{
    position: relative;
    right: 15px;
}
    </style>
  </head>
  <body>
<header>
<input type="text"  placeholder="search" id="sharch"> 
</header>
<div class="grandiv">
<div id="bout" class="row">
<form action="traitements/create_dir.php" method="post">
      <label >Créer un dossier : </label>
      <input type="text" name="create_dir">
      <input type="submit" name="submit_dir">
    </form><br>
    <form action="traitements/suppr.php" method="post">
      <labeL> Supprimer : </label>
      <input type="text" name="suppr">
      <input type="submit" name="submit_suppr">
    </form><br>
    <form action="traitements/rename.php" method="post">
      <labeL> Renommer : </label>
      <input type="text" name="old_name">
      <input type="text" name="new_name">
      <input type="submit" name="submit_rename">
    </form>
</div>
<div class="row" id="row2">
<div class="col-md-4" id="col1">
<aside class="navig">
    <?php
    //navigation
        $racine='./index.php';      //on stock le chemin vers la racine

       //on initialise path
        $path="";
        echo "<a href='$racine'> Racine</a><br><br>";

        if(sizeof($_GET) != 0){
        		$path = $_GET["path"];
    		}

        if(strlen($path)==0) $path=".";
        else if ($path !=".")
        {
            $parent_dir = substr($path,0,strrpos($path,"/")); //contient le dossier précédemment visité
                echo "<a href='./index.php?path=$parent_dir'><img src='img/back.gif'></a><br><br>"; //lien vers le dossier précédent

        }
        // on ouvre le dossier et on le parcourt
        $dir = opendir($path);
        $directories=array();
        $files=array();
        while($file = readdir($dir))
        {
            if($file != "." && $file != "..")
            {
                // on stock les dossiers et les fichiers dans deux variables différentes
                if(is_dir("$path/$file"))
                {
                    $directories[]="$file";
                }
                else {
                  $files[]="$file";
                }
            }
        }
        // on tri le tableau directories
            if(isset($directories))
                {
                    sort($directories);
                    foreach($directories as $d) //on parcourt le tableau et on l'affiche
                    {
                                      //avec un icône pour les dossiers
                        echo "<a href='./index.php?path=$path/$d'><img src='img/close.gif'>.$d.</a><br><br>";
                         //et un lien vers les sous dossiers

                    }
                }
      // on trie les fichiers dans l'ordre alphabétique
            if(isset($files))
            {
                sort($files);
            if($files!= 'index.php')
            {
                foreach($files as $files2)
                {
                     $extension = pathinfo($files2, PATHINFO_EXTENSION);

                     if ($extension=="pdf")
                      {
                          echo "<a href=\"$path/$files2\" > <img src='img/pdf.jpg'>.$files2.</a><br>";
                     }

                     elseif ($extension == "png"  || $extension =="jpg"|| $extension =="JPG" || $extension =="jpeg" || $extension =="ico" )
                      {


                          echo "<a href=\"$path/$files2\" > <img src='img/jpg.jpg'><br> $files2 </a><br><br>
                    ";

                     }
                      elseif ($extension == "mp3" )
                      {


                          echo "<a href=\"$path/$files2\" > <img src='img/mp3.png'><br><br> $files2 </a><br>
                    ";
                     }
                      elseif ($extension == "doc" || $extension == "docx" )
                      {
                          echo "<a href=\"$path/$files2\" > <img src='img/doc.png'><br><br> $files2 </a><br>
                    ";
                     }
                     else if ( $extension!="pdf" && "png" && "jpg"&& "JPG" && "jpeg" && "mp3" && "ico" && "doc" && "docx")
                         {
                    echo "<a href=\"$path/$files2\" > <img src='img/fichier.png'><br><br> $files2 </a><br>
                    ";}
                    elseif ($extension=="psd")
                     {
                        echo "<a href=\"$path/$files2\" > <img src='img/Psd.jpg'><br><br> $files2 </a><br>";
                    }           //ouverture du fichier dans une nouvelle fenêtre
                }
            }
            }
            //on ferme la lecture dossier
        closedir($dir);
    ?>
</aside>
</div>
    <div class="col-md-8">
<?php
 //navigation
 $racine='./index.php';      //on stock le chemin vers la racine
 //on initialise path
  $path="";
  echo "<a href='$racine'> Racine</a><br><br>";
  if(sizeof($_GET) != 0){
          $path = $_GET["path"];
      }

  if(strlen($path)==0) $path=".";
  else if ($path !=".")
  {
      $parent_dir = substr($path,0,strrpos($path,"/")); //contient le dossier précédemment visité
          echo "<a href='./index.php?path=$parent_dir'><img src='img/back.gif'></a><br><br>"; //lien vers le dossier précédent
  }
$dir = opendir($path);
$directories=array();
$files=array();
while($file = readdir($dir))
{
    if($file != "." && $file != "..")
    {
        // on stock les dossiers et les fichiers dans deux variables différentes
        if(is_dir("$path/$file"))
        {
            $directories[]="$file";
        }
        else {
          $files[]="$file";
        }
    }
}
// on trie les fichiers dans l'ordre alphabétique
if(isset($files))
{
    sort($files);
if($files!= 'index.php')
{
    foreach($files as $files2)
    {
         $extension = pathinfo($files2, PATHINFO_EXTENSION);

         if ($extension=="pdf")
          {
              echo "<a href=\"$path/$files2\" > <img src='img/pdf.jpg'>.$files2.</a><br>";
         }

         elseif ($extension == "png"  || $extension =="jpg"|| $extension =="JPG" || $extension =="jpeg" || $extension =="ico" )
          {


              echo "<a href=\"$path/$files2\" > <img src='img/jpg.jpg'><br> $files2 </a><br><br>
        ";

         }
          elseif ($extension == "mp3" )
          {


              echo "<a href=\"$path/$files2\" > <img src='img/mp3.png'><br><br> $files2 </a><br>
        ";
         }
          elseif ($extension == "doc" || $extension == "docx" )
          {
              echo "<a href=\"$path/$files2\" > <img src='img/doc.png'><br><br> $files2 </a><br>
        ";
         }
         else if ( $extension!="pdf" && "png" && "jpg"&& "JPG" && "jpeg" && "mp3" && "ico" && "doc" && "docx")
             {
        echo "<a href=\"$path/$files2\" > <img src='img/fichier.png'><br><br> $files2 </a><br>
        ";}
        elseif ($extension=="psd")
         {
            echo "<a href=\"$path/$files2\" > <img src='img/Psd.jpg'><br><br> $files2 </a><br>";
        }           //ouverture du fichier dans une nouvelle fenêtre
    }
}
}
//on ferme la lecture dossier
closedir($dir);
?>
</div>
        </div>
  </body>
</html>
