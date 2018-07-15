<html>

<head>
</head>

<body>
<?php
# Error wird gemeldet
error_reporting(-1);

# Verbindung zur DB wird hergestellt
$pdo = new PDO('mysql:host=localhost;dbname=random_number', 'root');

 ?>



  <form action=""  method="post" name="formular1">
    <p><b>Ihren Namen hier eingeben</p></b>
      <input type="text" name="user" value="" size="50" maxlength="150" required/>
      <input type="submit" name="Button" value="Absenden">



<?php






        $UserImport = "INSERT INTO test (user) VALUES ('user')";

        $sql = "SELECT * FROM savedNumber";
        foreach ($pdo->query($sql) as $row)
        {
          echo $row['User']."<br />";
          echo $row['savedNumber']."<br />";
          echo $row['timeStamp']."<br /><br />";
        }







?>

  <br>
  </div>
</body>
