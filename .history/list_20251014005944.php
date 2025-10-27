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
    <style>
      
        </style>
</head>
<body>
    <h1>List of CVs</h1>
    <?php
    if($result->num_rows>0){
echo "<table border='1' cellpadding='10'>";
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

while($row=$result->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["email"]."</td>";
    echo "<td>".$row["phone"]."</td>";
    echo "<td>".$row["address"]."</td>";
    echo "<td>".$row["education"]."</td>";
    echo "<td>".$row["experience"]."</td>";
    echo "<td>".$row["skills"]."</td>";
    echo "</tr>";
    
}
echo "</table>";
    }
    else{
        echo "no records found";
    }

?>
</body>
</html>