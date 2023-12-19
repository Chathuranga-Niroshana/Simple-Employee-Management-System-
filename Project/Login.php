<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION["username"] = $username;
        header("Location: Dashboard.php");
    } else {
        $error_message = "Invalid username or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
    body {
        background-color: powderblue;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    h2 {
        color: #2003B0;
    }

    .form {
        width: 900px;
        background-color: #00FFFF;
        padding: 3rem;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    label {
        width: 40%;
        font-weight: bold;
    }

    input {
        width: 40%;
        height: 5%;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 8px 15px;
        margin: 10px 0 15px 0;
        box-shadow: 1px 1px 2px 1px black;
    }

    input[type="submit"] {
        width: 25%;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        margin-top: 10px;
    }

    p.error-message {
        color: red;
    }
</style>

</head>
<body>
    
    <form method="post" action="" class="form">
    <h2>Login</h2><br><br>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input style="width: 25%;" type="submit" value="Login">
    </form>
    <?php if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    } ?>
</body>
</html>
