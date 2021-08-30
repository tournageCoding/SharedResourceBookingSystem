<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Database test page</title>
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
<h1>Database test page</h1>

<p>Showing contents of papers table:</p>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$name = $_POST["name"];
$court = $_POST["court"];
$session = $_POST["session"];

$sql = "INSERT INTO booked_sessions (name, court, session)
VALUES ('$name', '$court', '$session')";

$pdo->exec($sql);
?>

<table border="1">
<tr><th>Name</th><th>Court</th><th>Date and Time</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM booked_sessions");

while($row = $q->fetch()){
  echo "<tr><td>".$row["name"]."</td><td>".$row["court"]."</td><td>".$row["session"]."</td></tr>\n";
}

?>
</table>

Please enter your name, a court number and the time you wish to book.

<form action="index.php" method="POST">
Name: <input type="text" name="name"><br>
Count Number: <input type="number" name="court" min="1" max="2"><br>
Date and Time: <input type="text" name="session"
		  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}" required><br>
<input type="submit">
</form>

Welcome <?php echo $_POST["name"]; ?><br>
Court: <?php echo $_POST["court"]; ?><br>
Session: <?php echo $_POST["session"]; ?>

</body>
</html>