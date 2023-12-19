<?php

$conn = mysqli_connect('localhost','root','','project1');

if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Assign Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    body {
            background-color:powderblue;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            align-items: center;
            min-height: 100vh;
        }
        
       

    h2 {
        color: #2003B0;
    }

    form {
        width: 500px;
        background-color: #00FFFF;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    select,
    input[type="text"],
    input[type="date"] {
        width: 70%;
        padding: 8px 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button[type="submit"] {
        width: fit-content;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            margin-top: 10px;
    }

    button[type="submit"]:hover {
        background-color: #4CAF50;
    }
</style>

</head>
<body>
<h2>Assign Task to Employee</h2>
    <form id="activity-form" action="assign.php" method="POST" >
        
        <table>
        <tr>
                <td>Employee ID</td>
                <td>
                    <select name="Eid" id="Eid">
                        <?php
                        
                        $sql = "SELECT Eid FROM employee";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["Eid"] . "'>" . $row["Eid"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Task ID</td>
                <td>
                    <select name="Tid" id="Tid">
                        <?php
                       
                        $sql = "SELECT Tid FROM task";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["Tid"] . "'>" . $row["Tid"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
            <td> Date Assigned </td>
            <td><input type="date" name="Date_assign" id="Date_assign"></td>
            </tr>
            <!-- <tr>
                <td>Activity ID</td>
                <td>
                    <select name="Activityid" id="Activityid">
                        <?php
                      
                        $sql = "SELECT Activityid FROM taskactivities";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["Activityid"] . "'>" . $row["Activityid"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr> -->
            <tr>
                <td>Remarks</td>
                <td><input type="text" name="Remarks" /></td>
            </tr>
        </table>
        <button type="submit" name="sub" id="sub">Assign</button>
    </form>
  
</body>
</html>
