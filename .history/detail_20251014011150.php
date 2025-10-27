<?php
include 'db.php';
$id=$_GET['id'];
$sql="select * from person where id='$id'";
$result=$conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="style.css">
  
    
</head>
<body>
    <h2>Detail list of $id</h1>
    <p><a href="index.html"> Go back to registeration page</a></p>
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
    <th>Action</th>
    
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
    echo "<td><a href='detail.php?id=$row[id]'>Generate your cv </a></td>";
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