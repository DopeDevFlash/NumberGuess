<?php
session_start();
main();

# Verbindung zur DB wird hergestellt
$pdo = new PDO('mysql:host=localhost;dbname=numberguess', 'root', '');

# $timestamp wird definiert
$timestamp = time();
$datum = date("d.m.Y - H:i", $timestamp);


# dient nur zur Überprüfung
$sql = "SELECT ID, User, savedTries FROM stats";
foreach ($pdo->query($sql) as $row)
{
  echo $row['ID']." ".$row['User']."<br />";
  echo "Zahl: ".$row['savedTries']."<br /><br />";
}

# $timestamp initilialisierung
$statement = $pdo->prepare("UPDATE stats SET timeStamp = ? WHERE id = 1");
$statement->execute(array(date("d.m.Y - H:i", $timestamp)));
# überprüfung zum Output von der Zeit
# echo date("d.m.Y - H:i", $timestamp);

$savedTries  = $_POST["savedTries"];


$savedTriesInput   = "INSERT INTO stats (User, savedTries) VALUES ('$User', '$savedTries')";

# PDO Query an DB senden

$sql = "SELECT * FROM stats";
foreach ($pdo->query($sql) as $row)
{
  echo $row['User']."<br />";
  echo $row['savedTries']."<br />";
  echo $row['timeStamp']."<br /><br />";
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
