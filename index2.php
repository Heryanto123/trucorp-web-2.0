<?php
	$db_IP = '172.23.0.2';
	$db_User = 'root';
	$db_Pass = 'rahasiaUAS';
	$db_Name = 'trucorp';
	$filename = 'trucorp-db.sql';

	$conn = new mysqli($db_IP, $db_User, $db_Pass);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "CREATE DATABASE trucorp";
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully with the name trucorp";
	    $link = mysqli_connect($db_IP,$db_User,$db_Pass,$db_Name) or die('Error connecting to MySQL Database: ' . mysqli_error());


		$tempLine = '';

		$lines = file($filename);

		foreach ($lines as $line) {

		    if (substr($line, 0, 2) == '--' || $line == '')
			continue;

		    $tempLine .= $line;

		    if (substr(trim($line), -1, 1) == ';')  {
			mysqli_query($link, $tempLine) or print("Error in " . $tempLine .":". mysqli_error());
			$tempLine = '';
		    }
		}
	     echo "Tables imported successfully";
	     echo "<br>";
	} else {
	    echo "Error creating database: " . $conn->error;
	}
	$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $connection = new mysqli($db_IP,$db_User,$db_Pass,$db_Name);
	$query = "SELECT * FROM users";
        $result = $connection->query($query);
	?>
	<h5><?= $result->num_rows ?></h5>
	<?php
    ?>
</body>
</html>