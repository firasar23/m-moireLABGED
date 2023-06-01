<?php
include 'conn.php';

// Afficher les équipes
$sql = "SELECT * FROM equipe";
$result = mysqli_query($con, $sql);

$numequipe=$_GET['numEquipe'];





?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Teams</title>
	<link rel="stylesheet" type="text/css" href="aff.css"> 
	<link rel="stylesheet" href="btn1.css">
</head>
<header>

</header>
<body>

	<div class="container">
        
		<?php 
    
    while($row = mysqli_fetch_assoc($result)) { ?>
			<div class="box">
				<div class="icon"><?php echo $row['numero']; ?></div>
				<div class="content">
                <a href="<?php echo 'affihchage3.php?responable=' . urlencode($numequipe) . '&numEquipe=' . urlencode($row['numero']); ?>">More</a>
					<h3>Team Name: <?php echo $row["acronyme_DEquipe"]; ?></h3>
					<p>Leader: <?php echo $row["chef_DEquipe"]; ?></p>
					
                    <?php if ($row["numero"] == $numequipe) { ?>
                    <a href='editeqp.php?numero=<?php echo $row["numero"]; ?>'>Edit</a>
                    <?php } ?>
					
				</div>
			</div>
		<?php } ?>
	</div>
    <script> const boxes = document.querySelectorAll('.container .box .icon');

boxes.forEach((box, index) => {
  const color = getColorForIndex(index);
  box.style.boxShadow = `0 0 0 0 ${color}`;
  box.style.background = color;

  box.parentNode.addEventListener('mouseover', () => {
    box.style.boxShadow = `0 0 0 400px ${color}`;
  });

  box.parentNode.addEventListener('mouseout', () => {
    box.style.boxShadow = `0 0 0 0 ${color}`;
  });
});

function getColorForIndex(index) {
  const colors = ['#077BFF', '#2196f3', '#4CAF50', '#FF9800', '#F44336', '#9C27B0'];
  return colors[index % colors.length];
}
</script> 
</body>
</html>
