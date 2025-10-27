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
    <h2>Detail list of person with <?php echo  $id; ?></h1>
   
    <p><a href="cv.php?id=<?php echo $id ; ?>" class="btn">Generate CV</a></p>

    <p><a href="list.php"> Go back to list page</a></p>
    <?php
    if($result->num_rows>0){


while($row=$result->fetch_assoc()){
  
    echo "<p>ID: ".$row["id"]."<br></p>";
    echo "<p>NAME: ".$row["name"]."<br></p>";
    echo "<p>EMAIL: ".$row["email"]."<br>";
    echo "<p>PHONE : ".$row["phone"]."<br>";
    echo "<p>ADDRESS: ".$row["address"]."<br>";
    echo "<p>EDUCATION: ".$row["education"]."<br>";
    echo "<p>EXPERIENCE: ".$row["experience"]."<br>";
    echo "<p>SKILLS: ".$row["skills"]."<br>";
   
    
}

    }
    else{
        echo "no records found";
    }

?>
</body>
</html>