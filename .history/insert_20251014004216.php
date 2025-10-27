<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $sql = "INSERT INTO cvs (name, email, phone, address, education, experience, skills) VALUES ('$name', '$email', '$phone', '$address', '$education', '$experience', '$skills')";
    if()

}

?>