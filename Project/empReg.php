<?php

$Eid = $_POST["Eid"];
$Telephone = $_POST["Telephone"];
$Name = $_POST["Name"];
$email = $_POST["email"];
$Designation = $_POST["Designation"];

$conn = mysqli_connect('localhost','root','','project1');


if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());}


$sql = "INSERT INTO employee
VALUES ('$Eid', '$Telephone', '$Name', '$email', '$Designation')";

    if (mysqli_query($conn,$sql)) {
        echo "Data added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
mysqli_close($conn);
?>
