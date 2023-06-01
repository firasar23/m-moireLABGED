<?php
include 'conn.php';

if (isset($_POST['sub'])) {
    $nomEt = filter_var($_POST['netudiant'], FILTER_SANITIZE_STRING);
    $nomEn = filter_var($_POST['nencadreur'], FILTER_SANITIZE_STRING);
    $prenomEt = filter_var($_POST['petudiant'], FILTER_SANITIZE_STRING);
    $prenomEn = filter_var($_POST['pencadreur'], FILTER_SANITIZE_STRING);
    $theme = filter_var($_POST['theme'], FILTER_SANITIZE_STRING);
    $resume = filter_var($_POST['resume'], FILTER_SANITIZE_STRING);
    $dates = $_POST['dates'];

    // Insérer l'étudiant
    $sql1 = "INSERT INTO etudiant (nom, prenom)
             VALUES ('$nomEt', '$prenomEt')";
    $result1 = mysqli_query($con, $sql1);

    if ($result1) {
        $etudId = mysqli_insert_id($con);

        // Insérer l'encadreur
        $sql2 = "INSERT INTO encadreur (nom, prenom)
                 VALUES ('$nomEn', '$prenomEn')";
        $result2 = mysqli_query($con, $sql2);

        if ($result2) {
            $encadId = mysqli_insert_id($con);

            // Insérer la thèse avec les associations
            $sql3 = "INSERT INTO these (etudiant_id, encadreur_id, theme, resume, date_soutenance)
                     VALUES ('$etudId', '$encadId', '$theme', '$resume', '$dates')";
            $result3 = mysqli_query($con, $sql3);

            if ($result3) {
                $theseId = mysqli_insert_id($con);

                $sql4 = "INSERT INTO these_etudiant_encadreur (these_id, etudiant_id, encadreur_id)
                         VALUES ('$theseId', '$etudId', '$encadId')";
                $result4 = mysqli_query($con, $sql4);

                if ($result4) {
                    // Succès : la thèse a été ajoutée avec succès à la base de données
                    echo "La thèse a été ajoutée avec succès.";
                    header("location: affthese.php");
                } else {
                    // Erreur lors de l'insertion de l'association entre la thèse, l'étudiant et l'encadreur
                    echo "Erreur lors de l'ajout de l'association entre la thèse, l'étudiant et l'encadreur : " . mysqli_error($con);
                }
            } else {
                // Erreur lors de l'insertion de la thèse
                echo "Erreur lors de l'ajout de la thèse : " . mysqli_error($con);
            }
        } else {
            // Erreur lors de l'insertion de l'encadreur
            echo "Erreur lors de l'ajout de l'encadreur : " . mysqli_error($con);
        }
    } else {
        // Erreur lors de l'insertion de l'étudiant
        echo "Erreur lors de l'ajout de l'étudiant : " . mysqli_error($con);
    }
}

mysqli_close($con);
?>




<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="ajoutequipe.css" >
    
    <title>Ajouter une These</title>
  </head>
  <body>
    <div class="container">
      <h1>Ajouter une These</h1>
      <form method="post">
        <label for="netudiant"> Nom de l'Etudiant:</label>
        <input type="text" id="netudiant" name="netudiant">
        
        <label for="petudiant"> Prenom de l'Etudiant:</label>
        <input type="text" id="petudiant" name="petudiant">

        
        <label for="nencadreur"> Nom de l'Encadreur:</label>
        <input type="text" id="nencadreur" name="nencadreur">
        
        <label for="pencadreur"> Prenom de l'Encadreur:</label>
        <input type="text" id="pencadreur" name="pencadreur">

        
        
        <label for="theme">Theme:</label>
        <textarea id="theme" name="theme"></textarea>
        
        <label for="resume">Resume</label>
        <textarea id="resume" name="resume"></textarea>
        
        <label for="dates">Date de soutenance:</label>
        <input type="date"  placeholder="entrer votre date" name="dates">
        <br>
                
        
        

        <br><button type="submit" name="sub">Ajouter</button>
        
        <br><button type="submit"  ><a href="morect.php"> More</a></button>
        
      </form>
    </div>
  </body>
</html>