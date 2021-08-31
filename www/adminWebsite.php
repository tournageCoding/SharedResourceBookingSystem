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

$q = $pdo->query("SELECT * FROM booked_sessions");

while($row = $q->fetch()){
  echo "<tr><td>".$row["name"]."</td><td>".$row["court"]."</td><td>".$row["session"]."</td></tr>\n";
}
?>
</table>

<?php

// configuration
// $url = 'http://example.com/backend/editor.php';
$file = '/resources/notices.txt';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    // header(sprintf('Location: %s', $url));
    // printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<!-- HTML form -->
<form action="" method="post">
<textarea name="text"><?php echo htmlspecialchars($text) ?></textarea>
<input type="submit" />
<input type="reset" />
</form>

<p style="font-size:20px"><b>Club Notices:</b></p>

<?php
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM notices");

while($row = $q->fetch()){
  echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row["body"]."</td></tr>\n";
}
?>

</body>
</html>
