<?php 

	include("../../programme/connection.php");
	include ("delete_message/delete.php");	
	$sql = "SELECT * FROM contact"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Message</title>
	<meta charset="UTF-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="message.css">

</head>
<body>
	
	
	<div class="limiter">
	
		<div class="container-table100">
		
			<div class="wrap-table100">
				<div class="table100">
				<input type="button" class="btn btn-lg btn-success" onclick="location.href='../../user/article/liste des produit/Product.php';" value="Home" />
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Name</th>
								<th class="column2">Email</th>
								<th class="column3">Subject</th>
								<th class="column4">Message</th>
								<th class="column5">Date</th>
								<th class="column6">Delete</th>
								
								
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
										echo '<tr><td class="column1" id="id"> ' . $row["Name"] . "</td>";
										echo '<td class="column2 row_data" col_name="user_name" id="user_name"> ' . $row["Email"] . "</td>";
										echo '<td class="column3 row_data" col_name="user_lastname" id="user_lastname" > ' . $row["Subject"] . "</td>";
										echo '<td class="column4 row_data" col_name="region" id="region" > ' . $row["Message"] . "</td>";
										echo '<td class="column5 row_data" col_name="email" id="email" > ' . $row["datetime"] . "</td>";
										//return the id on click
										echo   "<td  ><a href='delete_message/delete.php?recordId=" . $recordId . "' class='btn btn-danger btn-sm' >Delete</a> </td>";
										
							
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