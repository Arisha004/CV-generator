<?php
include 'db.php';
$sql="select * from person";
$result=$conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>List of CVs</h1>
    <?php
    if()
echo "<table border='1' ; cellspacing='10'; cellpadding='10'>";
  echo   "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Education</th>
    <th>Experience</th>
    <th>Skills</th>
    </tr>";

?>
</body>
</html>