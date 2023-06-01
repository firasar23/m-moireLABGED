<?php
include 'conn.php';

// Afficher les équipes
$sql = "SELECT * FROM equipe";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Teams</title>
	<link rel="stylesheet" type="text/css" href="aff.css"> 
    

</head>

<body>
<header>
</header>
	<div class="container">
        
		<?php while($row = mysqli_fetch_assoc($result)) { ?>
			<div class="box">
				<div class="icon"><?php echo $row['numero']; ?></div>
				<div class="content">
                <a href="affihchageu.php?numEquipe=<?php echo $row['numero']; ?>">More</a>
					<h3>Team Name: <?php echo $row["acronyme_DEquipe"]; ?></h3>
					<p>Leader: <?php echo $row["chef_DEquipe"]; ?></p>
					
					
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
