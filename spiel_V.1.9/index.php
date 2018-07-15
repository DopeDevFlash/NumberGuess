<?php
session_start();
main();

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

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}







# Programm beginnt
function main()
{
  $zufallzahl = getRandomNumber();
  if (isset($_POST['zahl']))
  {
      $zahl = $_POST['zahl'];

      $valid = validate($zahl, $zufallzahl);
  }

  if(isset($valid) && $valid){
      echo $_SESSION['versuche'];
      $templateName = 'restart.phtml';

  } else {
    $templateName = 'index.html';
  }
  renderTemplate($templateName);
}



function setRandomNumber()
{
  $_SESSION['zufallzahl'] = rand(0, 100);
}




function getRandomNumber()
{
  if(!isset($_SESSION['zufallzahl']))
  {
      setRandomNumber();
  }
  return $_SESSION['zufallzahl'];

}
?>
<a href=\"logout.php\">Logout</a>
<?php


function validate($zahl, $zufallzahl)
{
  tryTowin();
  if($zahl == $zufallzahl)
  {
    setRandomNumber();
    return true;
  }


  echo "<b>Eingetragene Zahl: </b>". $_POST['zahl'];
  if($zahl < $zufallzahl)
  {
    echo "<br><br>";
    echo "Ihre Zahl war zu klein!";
    return false;
  }

  if($zahl > $zufallzahl)
  {
    echo "<br><br>";
    echo "Ihre Zahl war zu gross!";
    return false;

  }
}


function tryTowin()
{
  if(!isset($_SESSION['versuche'])){
    $_SESSION['versuche'] = 0;
  }
  $_SESSION['versuche'] += 1;
}



function renderTemplate($templateName)
{
  echo file_get_contents($templateName);
}

$conn->close();
