<?php
  

  $conn = mysqli_connect('localhost','root','','project1');

  if (!$conn) {
      die("Connection failed: " .mysqli_connect_error());}
  
  $Eid=$_POST["Eid"];
  $Tid=$_POST["Tid"];
  $Date_assign=$_POST["Date_assign"];
  //$ActivityId	=$_POST["ActivityId	"];
  $Remarks=$_POST["Remarks"];


  $sql= "INSERT INTO assign VALUES('$Eid','$Tid','$Date_assign','','$Remarks')";


  if (mysqli_query($conn, $sql)) {  
    echo "New record submitted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }


mysqli_close($conn);
?>