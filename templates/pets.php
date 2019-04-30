<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "ormuco", "ormuco", "ormuco");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$favorite_color = mysqli_real_escape_string($link, $_REQUEST['favorite_color']);
$cat_dog = mysqli_real_escape_string($link, $_REQUEST['cat_dog']);
 
//echo "$name $favorite_color $cat_dog";

// Attempt insert query execution
$sql = "INSERT INTO pets ( name, favorite_color, cat_dog ) VALUES ('$name', '$favorite_color', '$cat_dog')";
if(mysqli_query($link, $sql)){
//    echo "Record added successfully.";
?>
    <!DOCTYPE html>
 	<html>
	<head>
	<script>
		function goBack() {
  		window.history.back()
		}
	</script>
	</head>
	<body>

	<p> Record Added successfully </p>
<?php
	$result = mysqli_query($link,"SELECT * FROM pets");

	echo "<table border='1'>
	<tr>
	<th>Name</th>
	<th>Favorite Color</th>
	<th>Cat or Dog</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['favorite_color'] . "</td>";
	echo "<td>" . $row['cat_dog'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
?>
	<button onclick="goBack()">Go Back</button>

	</body>
	</html>
<?php
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
