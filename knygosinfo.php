<!DOCTYPE html>
<html>
    <head>  
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Knygos informacija</title>
    </head>
 <body>
 
 <?php
	 /* Requested book error checking */
	$req_book ="";
	if (isset($_GET['knyga'])) {
		$req_book = trim($_GET['knyga']);
	} else {
		$req_book = null;
	}
	
	$servername = "sql103.byethost31.com";
	$username = "b31_19318194";
	$password = "programa1985";
	$dbname = "b31_19318194_php";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM knygos WHERE pavadinimas LIKE '$req_book'";
	$result = mysqli_query($conn, $sql);
 
	echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
        echo "<tr><td><b>Pavadinimas</b></td><td><b>Leidimo metai</b></td><td><b>Autorius(-iai)</b></td><td><b>Žanras</b></td></tr>\n";
       if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				   $id			 =	$row["id"];
				   $pavadinimas		 = $row["pavadinimas"];
				   $leidimo_metai = $row["leidimo_metai"];
				   $autoriai		 = $row["autoriai"];
				   $zanras	     = $row["zanras"];
				   
				echo "<tr><td>$pavadinimas</td><td>$leidimo_metai</td><td>$autoriai</td><td>$zanras</td>\n";
			} 
	   } else {
					echo "0 results";
		}
        echo "</table><br>\n";
	
	$conn->close();
 
 ?>
 
 </body>
 </html>