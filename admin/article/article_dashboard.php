<?php 

	include("../../programme/connection.php");
	include ("delete_article/delete.php");	
	$sql = "SELECT * FROM article"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>dashboard</title>
	<meta charset="UTF-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="article.css">

</head>
<body>
	
	
	<div class="limiter">
	
		<div class="container-table100">
		
			<div class="wrap-table100">
				<div class="table100">
				<input type="button" class="btn btn-lg btn-success" onclick="location.href='../../user/article/liste des produit/Product.php';" value="Home" />
				<input type="button" class="btn btn-lg btn-success" onclick="location.href='commande/valide_commande.php';" value="Commandes" />

					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">ID</th>
								<th class="column2">name</th>
								<th class="column3">code article</th>
								<th class="column4">libelle article</th>
								<th class="column5">prix achat</th>
								<th class="column6">Prix vente</th>
								<th class="column7">stock</th>
								<th class="column7">date</th>
								<th class="column7">supprime</th>
								<th class="column7">edit</th>
								
							</tr>
						</thead>
						<tbody>

							<?php 
								$result = $con->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$recordId = $row["id"];
										//print the users data
										echo '<tr><td class="column1" id="id"> ' . $row["id"] . "</td>";
										echo '<td class="column2" > ' . $row["name"] . "</td>";
										echo '<td class="column3"> ' . $row["code_article"] . "</td>";
										echo '<td class="column4"> ' . $row["libelle_article"] . "</td>";
										echo '<td class="column5"> ' . $row["prix_achat"] . "</td>";
										echo '<td class="column6" > ' . $row["prix_vente"] . "</td>";
										echo '<td class="column7" > ' . $row["stock"] . "</td>";
										echo '<td class="column7" > ' . $row["date"] . "</td>";
										//return the id on click
										echo   "<td  ><a href='delete_article/delete.php?recordId=" . $recordId . "' class='btn btn-danger btn-sm' >Delete</a> </td>";
										echo   "<td  ><a href='edit_article.php?recordId=" . $recordId . "' class='btn btn-info'>Edit</a>";
							
									}
								}			 
								else 
								{
								echo "0 results";
								}
								$con->close();
							?>
										
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>


	

	
</body>
</html>