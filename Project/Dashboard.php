<?php
session_start();


if (!isset($_SESSION["username"])) {
    header("Location: Login.php"); 
    exit();
}


$userData = [
    "username" => $_SESSION["username"],
    "email" => "user@example.com",
    
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background-color:powderblue;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .form{
            width:70%;
            height: auto;
            justify-content: space-between;
            background-color: #00FFFF;
            padding:3rem;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h3{
            color: #2003B0;
        }

        h1 {
            color: black;
        }
        .form h3 {
            margin: 0;
            padding-bottom: 20px;
            font-size: 24px;
            color: #2003B0;
        }
        .form a {
            text-decoration: none;
            color: #000;
    }

        .form a:hover {
            color: blue;
        }

        .form img {
            display: block;
        }
            
        
        </style>
</head>
<body>
    <h3>Welcome to the Homepage... <?php echo $userData["username"]; ?>!</h3>
    <hr><br>
    <center> <h1>Employee & Task Management System</h1></center>

    

    <div class="form">
        <h3>Go in to the Data forms</h3><br><br>
            <a href="emp.html"><img src="Images/Enployee.png" width="250px"></a> 
           <center> <a href="Task.html"><img src="Images/task.png" width="250px"></a></center><br><br>
            <a href="activity.php"><img src="Images/Activity.png" width="250px"></a>
            <center><a href="AssignForm.php"><img src="Images/Assign.png" width="250px"></a></center>
            <a href="Report.php"><img src="Images/Report1.jpg" width="250px"></a>
        
    </div>
    
    <a href="Login.php"><img src="Images/Log.jpg" width="150px"></a>
</body>
</html>
