<html>

<head>
</head>

<body>


<form action=""  method="post" name="formular1">
    <p><b>Ihren Namen hier eingeben</p></b>
      <input type="text" name="user"  size="50" maxlength="150" required/>
      <input type="submit" name="Button" value="Absenden">

<?php
# Error wird gemeldet
error_reporting(-1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname   = "numberguess";

# Connection herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

#Verbindung prüfen
if ($conn->connect_error)
{
  die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}




if(isset($_POST['user']))
{
  $user = $_POST['user'];
  $sql = "INSERT INTO stats (User) VALUES ('$user')";


  if ($conn->query($sql) === TRUE)

  {
    echo "Neue Verbindung hergestellt";
  }
  else
   {
     echo "Error: " . $sql . "<br>" .$conn->error;
  }
}



$conn->close();
?>

  <br>
  </div>
</body>
