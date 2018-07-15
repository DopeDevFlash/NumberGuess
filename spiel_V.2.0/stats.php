<?php

error_reporting(-1);

// Connection herstellen
$conn = mysqli_connect("localhost", "root", "", "numberguess");

// Verbindung überprüfen
if (mysqli_connect == true)
{
  echo "Verbindung aufgebaut";
}
else
  echo "Verbindung fehlgeschlagen";

$conn->set_charset("utf8");

//Selektiert die Einträge der DB
$result = mysqli_query($conn, "SELECT User, savedTries, timestamp FROM stats");





while ($row = mysqli_fetch_array($result))
{
    echo  $row[0].  "<br />";
    echo  $row[1]. "<br />";
    echo  $row[2]. "<br />";
}













?>












<html>

<head>
</head>

<body>



<table border="1">

  <tr>

<th><h1> Spiel </h1></th>

<th><h1> Versuche </th></h1>


<th><h1> Zeitstempel </th></h1>


<tr>

<td> <div align="center">
    1 <br /> <br />
    2 <br /> <br />
    3 <br /> <br />
    4 <br /> <br />
    5 <br /> <br />
    6 <br /> <br />
    7 <br /> <br />
</div>
</td>

<td> <div align="center">
    25 <br /> <br />
    43 <br /> <br />
    65 <br /> <br />
    76 <br /> <br />
    21 <br /> <br />
    56 <br /> <br />
    90 <br /> <br />
</div>
</td>

<td> <div align="center">
    25 <br /> <br />
    43 <br /> <br />
    65 <br /> <br />
    76 <br /> <br />
    21 <br /> <br />
    56 <br /> <br />
    90 <br /> <br />
</div>
</td>

</table>


<div align="center">





<br /> <br />
<form action="highscore.phtml" method="post" name="formular2" id="formular2">
      <input type="submit" name="save" size="25" value="Zur Highscore Liste" maxlength="100" />
</body>
