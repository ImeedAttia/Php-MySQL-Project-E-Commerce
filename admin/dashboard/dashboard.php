<?php 
session_start();
	include("../../programme/connection.php");
	include("../../programme/functions.php");
	include ("delete_dashboard/delete.php");	
	$user_data = check_login($con);
	$sql = "SELECT * FROM users"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>dashboard</title>
	<meta charset="UTF-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="dashboard.css">

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
								<th class="column1">ID</th>
								<th class="column2">name</th>
								<th class="column3">lastname</th>
								<th class="column4">region</th>
								<th class="column5">email</th>
								<th class="column6">State</th>
								<th class="column7">password</th>
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
										echo '<td class="column2 row_data" col_name="user_name" id="user_name"> ' . $row["user_name"] . "</td>";
										echo '<td class="column3 row_data" col_name="user_lastname" id="user_lastname" > ' . $row["user_lastname"] . "</td>";
										echo '<td class="column4 row_data" col_name="region" id="region" > ' . $row["region"] . "</td>";
										echo '<td class="column5 row_data" col_name="email" id="email" > ' . $row["email"] . "</td>";
										echo '<td class="column6 row_data" col_name="admin_user" id="admin_user" > ' . $row["admin_user"] . "</td>";
										echo '<td class="column7 row_data" col_name="password" id="password" > ' . $row["password"] . "</td>";
										//return the id on click
										echo   "<td  ><a href='delete_dashboard/delete.php?recordId=" . $recordId . "' class='btn btn-danger btn-sm' >Delete</a> </td>";
										echo   "<td  ><a href='edit_dashboard.php?recordId=" . $recordId . "' class='btn btn-info'>Edit</a>";
							
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