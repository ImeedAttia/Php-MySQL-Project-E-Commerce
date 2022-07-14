<?php 

	include("../../../programme/connection.php");
	$sql = "SELECT * FROM commande"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>dashboard</title>
	<meta charset="UTF-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../article.css">

</head>
<body>
	
	
	<div class="limiter">
	
		<div class="container-table100">
		
			<div class="wrap-table100">
				<div class="table100">
				<input type="button" class="btn btn-lg btn-success" onclick="location.href='../../../user/article/liste des produit/Product.php';" value="Home" />

					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">ID</th>
								<th class="column2">nom client</th>
								<th class="column3">nom article</th>
								<th class="column4">prix</th>
								<th class="column7">date</th>
								<th class="column7">validation</th>
								<th class="column7">valide</th>
								<th class="column7">non valide</th>
								
							</tr>
						</thead>
						<tbody>

							<?php 
								$result = $con->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
                                        $recordId = $row["id"];


                                        $sqls = "SELECT name,prix_achat FROM article WHERE id= '" .  $row['idArticle'] . "' "; 
                                        $results = $con->query($sqls);
                                        while($rows = $results->fetch_assoc()) {
                                            $prix = $rows["prix_achat"];
                                            $nameart = $rows["name"];
                                        }
                                        $sqlu = "SELECT * FROM users WHERE id= '" .  $row['idUser'] . "' "; 
                                        $resultu = $con->query($sqlu);
                                        while($rowu = $resultu->fetch_assoc()) {
                                           
                                            $nameu = $rowu["user_name"]  . "  " .$rowu["user_lastname"] ;
                                        }

										if($row['Validate']== '0'){
											$valid = 'Refuser';
										}else if($row['Validate']== '1'){
											$valid = 'Confirmer';
										}else if($row['Validate']== '2'){
											$valid = 'en attente';
										}





										echo '<tr><td class="column1" id="id"> ' . $row["id"] . "</td>";
										echo '<td class="column2" > ' . $nameu . "</td>";
										echo '<td class="column3"> ' . $nameart . "</td>";
										echo '<td class="column7" > ' . $prix . "</td>";
										echo '<td class="column7" > ' . $row["date"] . "</td>";
										echo '<td class="column7" > ' . $valid . "</td>";
										//return the id on click
										echo   "<td  ><a href='valide.php?recordId=" . $recordId . "' class='btn btn-success btn-sm' >Confirmer</a> </td>";
										echo   "<td  ><a href='non_valide.php?recordId=" . $recordId . "' class='btn btn-danger'>Refuser</a>";
							
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