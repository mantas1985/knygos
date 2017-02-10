<!DOCTYPE html>
<html>
    <head>  
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Knygų sąrašas</title>
    </head>
 <body>
<?php
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

$sql = "SELECT * FROM knygos";
$result = mysqli_query($conn, $sql);

/* Display table contents 
http://www.kryogenix.org/code/browser/sorttable/
*/
        echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
        echo "<tr><td><b>Eil.Nr.</b></td><td><b>Pavadinimas</b></td><td><b>Leidimo metai</b></td><td><b>Autorius(-iai)</b></td><td><b>Žanras</b></td></tr>\n";
       if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				   $id			 =	$row["id"];
				   $pavadinimas		 = $row["pavadinimas"];
				   $leidimo_metai = $row["leidimo_metai"];
				   $autoriai		 = $row["autoriai"];
				   $zanras	     = $row["zanras"];
				   $eil_nr		 = $eil_nr + 1; //numbering user from 1
				   
					echo "<tr><td>$eil_nr</td><td><a href=\"../web/knygosinfo.php?knyga=$pavadinimas\">$pavadinimas</a>	</td><td>$leidimo_metai</td><td>$autoriai</td><td>$zanras</td>\n";
			} 
	   } else {
					echo "0 results";
		}
        echo "</table><br>\n";

$conn->close();

?>
</body>
   
</html>