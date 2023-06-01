<?php
include 'conn.php';

// Requête SQL pour récupérer les données de la table "these" avec les noms et prénoms de l'étudiant et de l'encadreur
$sql = "SELECT these_etudiant_encadreur.id, these.id_t, these.theme, these.resume, these.date_soutenance, etudiant.nom AS etudiant_nom, etudiant.prenom AS etudiant_prenom, encadreur.nom AS encadreur_nom, encadreur.prenom AS encadreur_prenom
FROM these_etudiant_encadreur
INNER JOIN these ON these_etudiant_encadreur.these_id = these.id_t
INNER JOIN etudiant ON these_etudiant_encadreur.etudiant_id = etudiant.id_et
INNER JOIN encadreur ON these_etudiant_encadreur.encadreur_id = encadreur.id_ec";

$result = mysqli_query($con, $sql);


$sql2 = "SELECT projet.id_p, projet.code, projet.type, projet.chefprojet, projet.date_debut, projet.date_fin, mombre.nom AS membre_nom, mombre.prenom AS membre_prenom, mombre.id_m AS idd
 FROM projet 
 INNER JOIN mombre ON mombre.projet_id = projet.id_p";
$rst=mysqli_query($con,$sql2); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /><meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Responsive hmlt tablee</html></title>
    <link rel="stylesheet" href="des2.css">
    <header>
        <a href="#" class="logo"><span>P</span>roudction <span>D</span>u <span>P</span>rojet </a>
    
    </header>
</head>

<body >
    
    <main class="table">
        <br>
        <section class="table__header">
            <h1 > <span>T</span>HESES </h1> 
        </section>
        <section class="table__body">
        <table>
                <thead>
                    <tr>
                        <th>Nom de l'étudiant</th>
                        <th>Prénom de l'étudiant</th>
                        <th>Nom de l'encadreur</th>
                        <th>Prénom de l'encadreur</th>
                        <th>Thème</th>
                        <th>Résumé</th>
                        <th>Date de soutenance</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                        ?>
                        <tr>
                            <td><?php echo $row['etudiant_nom']; ?></td>
                            <td><?php echo $row['etudiant_prenom']; ?></td>
                            <td><?php echo $row['encadreur_nom']; ?></td>
                            <td><?php echo $row['encadreur_prenom']; ?></td>
                            <td><?php echo $row['theme']; ?></td>
                            <td><?php echo $row['resume']; ?></td>
                            <td><?php echo $row['date_soutenance']; ?></td>
                            <td>
                                <?php $id=$row['id']; ?>
                                <?php echo'<button><a href="suppthese.php?id='.$id.'">delete</a></button>'   ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table><br>
            <br> <button  type="submit"> <a href="ajouterth.php"> Ajouter These</a></button>
            
            

            



    </main>
    
    <section class="table__header">
            <h1><span>P</span>rojets</h1> 
        </section>
        <section class="table__body">
        <table>
            <thead>
                    <tr>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Chef Projet</th>
                        <th>Nom de membre</th>
                        <th>Prenom de membre</th>
                        <th>Date de debut</th>
                        <th>Date de fin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($rst)) {
                        
                        ?>
                        <tr>
                            <td><?php echo $row['code']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['chefprojet']; ?></td>
                            <td><?php echo $row['membre_nom']; ?></td>
                            <td><?php echo $row['membre_prenom']; ?></td>
                            <td><?php echo $row['date_debut']; ?></td>
                            <td><?php echo $row['date_fin']; ?></td>
                            <td>
                                <?php $idd=$row['idd']; ?>
                                <?php echo'<button><a href="suppprojet.php?id='.$idd.'">delete</a></button>'   ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody></section>
            </table><br>
            <br> <button  type="submit"> <a href="ajouterpr.php"> Ajouter Projet</a></button>

</body>
</html>