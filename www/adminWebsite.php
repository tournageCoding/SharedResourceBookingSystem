<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Administrator Mode</title>
<style>
th { text-align: left; }

table, th, td {
  border: 2px solid grey;
  border-collapse: collapse;
}

th, td {
  padding: 0.2em;
}
</style>
</head>

<body>
  
<h1>Pallet Town Court Booking (Administrator Mode)</h1>

<!-- Use data from forms to interact with database. -->
<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$nameI = $_POST["nameI"];
$courtI = $_POST["courtI"];
$sessionI = $_POST["sessionI"].":00";
$nameD = $_POST["nameD"];
$courtD = $_POST["courtD"];
$sessionD = $_POST["sessionD"].":00";

$idD = $_POST["idD"];
$idI = $_POST["idI"];
$titleI = $_POST["titleI"];
$bodyI = $_POST["bodyI"];

$insertSession = "INSERT INTO booked_sessions (name, court, session)
VALUES ('$nameI', '$courtI', '$sessionI')";

$deleteSession = "DELETE FROM booked_sessions WHERE name='$nameD' AND court='$courtD' AND session='$sessionD'";

$insertNotice = "INSERT INTO notices (id, title, body)
VALUES ('$idI', '$titleI', '$bodyI')";

$deleteNotice = "DELETE FROM notices WHERE id='$idD'";

$pdo->exec($insertSession);
$pdo->exec($deleteSession);
$pdo->exec($insertNotice);
$pdo->exec($deleteNotice);
?>

<p style="font-size:20px"><b>Booked sessions:</b></p>

<!-- Display bookings from database in a table. -->
<table border="1">
<tr><th>Name</th><th>Court</th><th>Date and Time</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM booked_sessions ORDER BY session ASC");

while($row = $q->fetch()){
  echo "<tr><td>".$row["name"]."</td><td>".$row["court"]."</td><td>".substr($row["session"], 0, 16)."</td></tr>\n";
}
?>
</table>

<p>Please enter the name, a court number and the time you wish to book for.</p>

<form action="" method="POST">
Name: <input type="text" name="nameI"><br><br>
Court Number: <input type="number" name="courtI" min="1" max="2"><br><br>
Date and Time: <input type="text" name="sessionI"
		  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}" required><br><br>
<input type="submit">
</form>

<p>Please enter the exact name, court number and time of the booking you wish to delete.</p>

<form action="" method="POST">
Name: <input type="text" name="nameD"><br><br>
Court Number: <input type="number" name="courtD" min="1" max="2"><br><br>
Date and Time: <input type="text" name="sessionD"
		  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}" required><br><br>
<input type="submit">
</form>

<p style="font-size:20px"><b>Club Notices:</b></p>

<!-- Display bookings from database in a table. -->
<table border="1">
<tr><th>ID</th><th>Title</th><th>Body</th></tr>
<?php
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM notices ORDER BY id ASC");

while($row = $q->fetch()){
  echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row["body"]."</td></tr>\n";
}
?>
</table>

<p>Please enter the ID, Title and Body of the notice you wish to add.</p>

<form action="" method="POST">
  ID: <input type="number" name="idI"><br><br>
  Title: <input type="text" name="titleI"><br><br>
  Body: <input type="text" name="bodyI"><br><br>
<input type="submit">
</form>

<p>Please enter the ID of the notice you wish to delete.</p>

<form action="" method="POST">
ID: <input type="number" name="idD"><br><br>
<input type="submit">
</form>

</body>
</html>
