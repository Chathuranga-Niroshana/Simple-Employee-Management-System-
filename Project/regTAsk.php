<?php

$Tid = $_POST["Tid"];
$Name = $_POST["Name"];
$Start_date = $_POST["Start_date"];
$End_date = $_POST["End_date"];
$nature = $_POST["nature"];

$conn = mysqli_connect('localhost','root','','project1');


if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());}


$sql = "INSERT INTO task
VALUES ('$Tid', '$Name', '$Start_date', '$End_date', '$nature')";

    if (mysqli_query($conn,$sql)) {
        echo "Data added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
mysqli_close($conn);
?>
