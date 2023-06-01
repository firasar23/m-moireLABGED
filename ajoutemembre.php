<?php
include 'conn.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
 if(isset($_POST['sub'])){
    $nom1=$_POST['nom1'];
    $nom2=$_POST['nom2'];
    $prenom1=$_POST['prenom1'];
    $prenom2=$_POST['prenom2'];

    $sql1="INSERT into mombre (projet_id, nom, prenom) VALUES ('$id','$nom1','$prenom1') ";
    $rst1=mysqli_query($con,$sql1);
    
    
    $sql2="INSERT into mombre (projet_id, nom, prenom) VALUES ('$id','$nom2','$prenom2') ";
    $rst2=mysqli_query($con,$sql2);
    if($rst2){
      header("location: affthese.php");
    }

 }
    




?>

















<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="ajoutequipe.css" >
    
    <title>Ajouter membres du projet</title>
  </head>
  <body>
    <div class="container">
      <h1>Ajouter membres du projet </h1>
      <form method="post">
       
        <label for="nom1"> Nom membre 1:</label>
        <input type="text" id="nom1" name="nom1">

        <label for="prenom1"> Prenom membre 1:</label>
        <input type="text" id="prenom1" name="prenom1">
        
        <label for="nom2"> Nom membre 2:</label>
        <input type="text" id="nom2" name="nom2">

        <label for="prenom2"> Prenom membre 1:</label>
        <input type="text" id="prenom2" name="prenom2"> 
        
                
        
        

        <br> <button type="submit" name="sub">Ajouter</button>
      </form>
    </div>
  </body>
</html>