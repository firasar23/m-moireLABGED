<?php
include 'conn.php';
if (isset($_POST['submit'])){
  $numequipe=filter_var($_POST['equipe'], FILTER_SANITIZE_NUMBER_INT);
  $nom=filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
  $prenom=filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
  $datedenaiss=$_POST['datenaiss'];
  $sex=filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
  $epouse=filter_var($_POST['epouse'], FILTER_SANITIZE_STRING);
  $diplome=filter_var($_POST['diplome'], FILTER_SANITIZE_STRING);
  $datediplome=$_POST['anndiplome'];
  
  $grade=filter_var($_POST['gradee'], FILTER_SANITIZE_STRING);
  $dategrade=$_POST['anngrade'];
  $statut=filter_var($_POST['statute'], FILTER_SANITIZE_STRING);
  $domaine=filter_var($_POST['domaine'], FILTER_SANITIZE_STRING);
  $structure=filter_var($_POST['structure'], FILTER_SANITIZE_STRING);
  $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $errors=[];
  
  if (empty($prenom)){
    $errors[]="veuillez entrer le prenom";
}elseif(empty($nom)){
    $errors[]="veuillez entrer le nom de famille";
}elseif(empty($datedenaiss)){
  $errors[]='veuillez entrer votre date de naissance';
}
elseif(empty($diplome)){
    $errors[]="veuillez entrer votre diplome";
}
elseif(empty($epouse)){
  $errors[]='entrer votre epouse';
}elseif(empty($datediplome)){
  $errors[]='veuillez entrer votre date doptention de diplome';
}elseif(empty($dategrade)){
  $errors[]='veuillez entrer votre date doptention de grade';
}elseif(empty($domaine)){
  $errors[]='veuillez entrer votre domaine';
}elseif(empty($structure)){
  $errors[]='veuillez entrer votre structure de rattchement';
}elseif (empty($email)){
    $errors[]="veuillez entrer votre adreese email";
}elseif(empty($sex)){
    $errors[]="veuillez selctionner votre sexe";
}elseif(empty($grade)){
  $errors[]="veuillez entrer votre grade";
}elseif(empty($statut)){
  $errors[]="veuillez entrer votre statut";
}elseif(empty($numequipe)){
  $errors[]="veuillez entrer votre equipe svp";
}

if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    $errors[]="email non valide";
}
if(isset($errors)){
  if(!empty($errors)){
      foreach($errors as $msg){
          echo $msg . "<br>";
      }
  }
}

  
  
$sql="INSERT INTO `chercheur` (num_dEquipe,nom,prenom,date_de_naissance,sex,epouse_de,dernier_diplome,an_obt_diplome,grade,an_obt_grade,statut,domaine_principal,Structure_de_rattachement,email)
VALUES ('$numequipe','$nom','$prenom','$datedenaiss','$sex','$epouse','$diplome','$datediplome','$grade','$dategrade','$statut','$domaine','$structure','$email')";

$rsse=mysqli_query($con, $sql);
if($rsse){
  header('location:affequipe.php');
}else{
  echo "Une erreur s'est produite lors de l'ajoute ";
}
  
 
}
?>

<!doctype html>
<html>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="stylesheet" href="ajoute.css" >

    <title>ajoutez</title>
  </head>
  <body>
    <div class="container">
        <form method="post">
               
                <div class="form">
                <label >namee</label>
                <input type="Text" class="form-control" placeholder="entrer votre nom" name=" nom" >
                </div>
                
                <div class="form">
                <label >prenom</label>
                <input type="Text" class="form-control" placeholder="entrer votre prenom" name="prenom">
                </div>
                
                <div class="form">
                <label >date de naissance</label>
                <input type="date" class="form-control" placeholder="entrer votre date naissance" name="datenaiss">
                </div>
                
                <div class="form">
                <label >epouse de </label>
                <input type="Text" class="form-control" placeholder="epouse de" name="epouse">
                </div>
                
                <div class="form">
                <label >dernier diplome</label>
                <input type="Text" class="form-control" placeholder="entrer votre dernier diplome" name="diplome">
                </div>
                
                <div class="form">
                <label>anne obtient diplome</label>
                <select name="anndiplome">
                <?php
                $annee_actuelle = date("Y");
                for ($i = 1900; $i <= $annee_actuelle; $i++) {
                  echo "<option value='$i'>$i</option>";
                }
                ?>
              </select>

                
                
              <label for="">annes obtient de grade </label>
              <select name="anngrade">
                <?php
                $annee_actuelle = date("Y");
                for ($i = 1900; $i <= $annee_actuelle; $i++) {
                  echo "<option value='$i'>$i</option>";
                }
                ?>
              </select>
                
                <div class="form">
                <label >domaine principale</label>
                <input type="Text" class="form-control" placeholder="entrer votre domaine" name="domaine">
                </div>

                <div class="form">
                <label >structure de rattachement</label>
                <input type="Text" class="form-control" placeholder="entre " name="structure">
                </div>

                <div class="form">
                <label >email</label>
                <input type="email"  class="form-control" placeholder="entrer votre email" name="email">
                </div>
                
                

              
                <select name="gradee" >
                  <option value="Pr">Pr</option>
                  <option value="MCB">MCB</option>
                  <option value="MAA">MAA</option>
                  <option value="MAB,D">MAB,D</option>
                  <option value="MCA">MCA</option>
                  
                </select>
                <select name ="statute">
                <option value=" P Et"> P Et </option>
                <option value=" P H.E"> P H.E</option>
                
                <div class="form">
                <label >Sex</label>
                <input type="radio" name="gender" value="Mr">Mr
                <input type="radio" name="gender" value="Mme">Mme
                <input type="radio" name="gender" value="Melle">Melle 
                </div>
                <label>Les équipes</label>
                <select name="equipe" id="equipe">
                <option value="">Sélectionnez une équipe</option>
                <?php
                  include 'conn.php';
                  $equipe = "SELECT * FROM equipe";
                  $listequipe = mysqli_query($con, $equipe);
                  if (!$listequipe) {
                      echo "Erreur : " . mysqli_error($con);
                  } else {
                      while ($enr = mysqli_fetch_array($listequipe)) {
                          echo '<option value="' . $enr['numero'] . '">' . $enr['intitule_DEquipe'] . '</option>';
                      }
                  }
                  mysqli_close($con);
                  ?>
                </select>


                

                


                <button type="submit" class="btnsub" name="submit">ajoutez</button>
                
        
        </form>
    </div>

    
  </body>
</html>