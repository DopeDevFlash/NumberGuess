<html>



<head>

</head>



<body>









<form action="" method="post" name="formular1">

<p><b>Ihren Namen hier eingeben</p></b>

<input type="text" name="user" value="" size="50" maxlength="150" required/>

<input type="submit" name="Button" value="Absenden">





<?php

# Error wird gemeldet

error_reporting(-1);



$servername = "localhost";

$username = "root";

$password = "";

$dbname = "numberguess";



# Connection wird erstellt

$conn = new mysqli($servername, $username, $password, $dbname);

# Connection prüfen

if ($conn->connect_error)

{

die("Verbindung fehlgeschlagen: " . $conn->connect_error);

}









if (isset($_POST['user']))

{

$user = $_POST['user'];

$sql = "INSERT INTO stats (user) VALUES ('$user')";



if ($conn->query($sql) === TRUE) {

echo "Neue Verbindung hergestellt";

} else {

echo "Fehler: " . $sql . "<br>" . $conn->error;

}
}





$conn->close();
?>

</body>
