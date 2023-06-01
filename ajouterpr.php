<?php
include 'conn.php';
if (isset($_POST['sub'])){
    $code=filter_var($_POST['code'],FILTER_SANITIZE_STRING);
    $type=filter_var($_POST['type'],FILTER_SANITIZE_STRING);
    $chef=filter_var($_POST['chef'],FILTER_SANITIZE_STRING);
    $dated=$_POST['dated'];
    $datef=$_POST['datef'];
    
    
    
    
      
    
    $sql1 = "INSERT INTO projet(code, type, chefprojet, date_debut, date_fin)
        VALUES ('$code','$type','$chef','$dated','$datef')";
        $rest1=mysqli_query($con,$sql1);
    if($rest1){
      $projet_id=mysqli_insert_id($con);
      header("location: ajoutemembre.php?id=$projet_id");
        exit();
    } else {
      echo "Erreur lors de l'ajout du projet : " . mysqli_error($con);
  }







}




?>




<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="ajoutequipe.css" >
    
    <title>Ajouter un Projet</title>
  </head>
  <body>
    <div class="container">
      <h1>Ajouter un Projet</h1>
      <form method="post">
        <label for="code"> Code:</label>
        <input type="text" id="code" name="code">
        
        <label for="type"> Type:</label>
        <input type="text" id="type" name="type">

        
        
        
        <label for="chef"> Chef Projet:</label>
        <input type="text" id="chef" name="chef">
        
        
        <label for="dated">Date de debut </label>
        <input type="date"  placeholder="entrer votre date" name="dated"><br>
        
        <br><label for="dates">Date de fin </label>
        <input type="date"  placeholder="entrer votre date" name="datef"><br>
                
        
        

        <br> <button type="submit" name="sub">Suivant</button>
      </form>
    </div>
  </body>
</html