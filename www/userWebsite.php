<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Pallet Town Court Booking</title>
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
<h1>Pallet Town Court Booking</h1>

<!-- Send booking to database when form is recieved. -->
<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$name = $_POST["name"];
$court = $_POST["court"];
$session = $_POST["session"].":00";

$sql = "INSERT INTO booked_sessions (name, court, session)
VALUES ('$name', '$court', '$session')";

$pdo->exec($sql);
?>

<p style="font-size:20px"><b>Booked sessions:</b></p>

<table border="1">
<tr><th>Court</th><th>Date and Time</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM booked_sessions ORDER BY session ASC");

while($row = $q->fetch()){
  echo "<tr><td>".$row["court"]."</td><td>".substr($row["session"], 0, 16)."</td></tr>\n";
}
?>
</table>

<p>Please enter your name, a court number and the time you wish to book.</p>

<form action="" method="POST">
Name: <input type="text" name="name"><br><br>
Court Number: <input type="number" name="court" min="1" max="2"><br><br>
Date and Time: <input type="text" name="session"
		      pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}" required>
<p style="font-size:12">YYYY-MM-DD HH:MM</p>
<input type="submit">
</form>

<p style="font-size:20px"><b>Club Notices:</b></p>

<!-- Display bookings from database in a table. -->
<table border="1">
 <tr><th>Title</th><th>Body</th></tr>
  
<?php
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM notices");

while($row = $q->fetch()){
  echo "<tr><td>".$row["title"]."</td><td>".$row["body"]."</td></tr>\n";
}
?>
</table>

</body>
</html>
