<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #eaeaea; /* Light gray background */
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 35px;
        background-color: #ffffff; /* White container background */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h2 {
        text-align: center;
        color: #1a1a1a; /* Dark gray text color */
    }

    form {
        text-align: left; /* Adjusted alignment to left */
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
        color: #333333; /* Slightly darker text color */
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #999999; /* Lighter border color */
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box;
    }

    button[type="submit"] {
        background-color: #4caf50; /* Green submit button */
        color: #ffffff; /* White text color */
        border: none;
        padding: 12px 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>


</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="dash.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Login</button>
            
        </form>
        <?php
            if(isset($_GET['error']) && $_GET['error'] === 'incorrect'){
                echo "<p style='color: red;'>Username and Password are Incorrect</p>";
            }
        ?>
    </div>
    <div class="logout-button">
        
        <?php
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                echo '<a href="logout.php">Logout</a>';
            }
        ?>
    </div>
</body>
</html>
