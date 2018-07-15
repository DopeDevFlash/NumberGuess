<?php


   $user = "John";
   $pass = "Abc123!";

   # So kannst du dir das Passwort SHA1-gehased anschauen:
   // echo sha1($pass);

   # Daten holen
   $Data = file_get_contents('./auth/data.txt');

   # Man kann den shit mit geöffnetem handle (fopen) auch via
   # definitiv besser bei großen Dateien, aber das ist ja hier nicht der Fall.

   if ($Data) {
	  # Aufsplitten bei Zeilenumbruch
	  $Data = explode(PHP_EOL, $Data);

	  # Zeilen durchlaufen
	  foreach ($Data as $Line) {
		 # Zeile aufsplitten bei Doppelpunkt
		 $Auth = explode(':', $Line);

		 # Checken ob es genau 2 Werte sind (Benutzername links vom ":" und Passwort rechts davon)
		 if (count($Auth) == 2) {
			# Checken ob die übergebenen Daten passen
			if ($Auth[0] == $user && $Auth[1] == sha1($pass)) {
			   echo "Login erfolgreich";
         echo "<br><br>";
         echo "<a href=\"index.php\">Zum Zahlenraten</a>";
         echo "<br><br>";
         echo "<a href=\"logout.php\">Logout</a>";
         break;
			} else {
			   echo "Login fehlgeschlagen";
         break;
			}
		 } else {
			echo "Da stimmt was nicht mit den Daten. Bitte Benutzer und Passwort zeilenweise durch Doppelpunkt getrennt eintragen.";

		 }
	  }
   } else {
	  echo "Die Textdatei ist leer";
   }
?>
