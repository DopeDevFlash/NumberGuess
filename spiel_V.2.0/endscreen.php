<?php
   session_start();

   error_reporting(-1);
   ini_set("display_errors", true);

   if(isset($_POST['user']))
   {
	  // Connection herstellen
	  $conn = new mysqli("localhost", "root", "", "numberguess");

	  // Verbindung prüfen
	  if ($conn->connect_error)
		  die("Verbindung fehlgeschlagen: " . $conn->connect_error);
	  $conn->set_charset("utf8");

	  $query = "INSERT INTO
					 `stats`
					   (`User`)
				VALUES
				 ('" . $conn->real_escape_string($_POST['user']) . "')";
	  $conn->query($query)
		 or die ("MySQL-Error: " . $conn->error);

	  $_SESSION['saved'] = true;

	  if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!='off' or $_SERVER['SERVER_PORT']==443)
		 $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	  else
		 $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

	  header ("Location: $url");
	  exit();
   }
?>
<!DOCTYPE html>
<html lang="de">
  <head>
	<meta charset="utf-8" />
	<title>Name eingeben</title>
  </head>
  <body>
<?php
   if (isset($_SESSION['saved']))
   {
	  unset($_SESSION['saved']);
	  echo "<p>User erfolgreich gespeichert</p>";
   }
?>
   <form action=""  method="post" name="formular1">
	 <p><b>Ihren Namen hier eingeben</p></b>
	 <input type="text" name="user"  size="50" maxlength="150" required/>
	 <input type="submit" name="Button" value="Absenden">
  </form>
</body>
</html>
