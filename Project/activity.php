<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project1";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$addedActivities = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        $Tid = $_POST["Tid"];
        $Activity = $_POST["Activity"];
         $ActivityId = $_POST["ActivityId"]; 
        
        $addedActivities[] = array(
            "Tid" => $Tid,
            "Activity" => $Activity,
             "ActivityId" => $ActivityId 
        );

       
        $sql = "INSERT INTO taskactivities (ActivityId, Tid, Activity) VALUES ('$ActivityId', '', '$Activity')";
        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully";
        } else {
          echo "Error: " . mysqli_error($conn);
         }
    }
}
?>

<!DOCTYPE html>
<head><style>
    body {
        background-color: powderblue;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    fieldset {
        margin: 0 auto;
        width: 60%;
        background-color: #00FFFF;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
    }

    input {
        margin: 5px 0;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #d1d1d1;
    }

    th, td {
        border: 1px solid #d1d1d1;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f1f1f1;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e3f2fd;
    }

    #activity-form {
        text-align: center;
    }

    .form-table {
        margin: 0 auto;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-success {
        background-color: #4CAF50;
        color: white;
    }

    .btn-primary {
        background-color: #007BFF;
        color: white;
    }

    .btn-danger {
        background-color: #FF5757;
        color: white;
    }

    .table-container {
        margin: 20px auto;
        text-align: center;
    }
</style>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Assigning</title>
    
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<center><fieldset>
<div class="d-flex justify-content-center">
    
    <form id="activity-form" action="assignTask.php" method="POST" class="p-4 bg-light rounded">
        <center><h2>Activities</h2></center>
        <table class="form-table">
            <tr>
                <td class="form-label">Task ID  </td>
                <td>
                    <select style="width:27%" name="Tid" id="Tid" class="form-control">
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
                <td class="form-label">Activity  </td>
                <td><input type="text" name="Activity" class="form-control"/></td>
                
            </tr>
               </fieldset>
        </table>
        <input type="submit" name="add" id="add" class="btn btn-success">
    </form>
</div>
<br><br>
<div class="table-container">
    <table class="table">
        <thead class="mx-auto">
            <tr>
                <th>Task ID</th>
                <th>Activity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="activity-table-body" class="mx-auto">
            
        </tbody>
    </table>
    <button style="background-color: blue" type="submit" name="submit" id="submit" class="btn btn-primary">Save DB</button>
</div>
</center>

<script>
$(document).ready(function () {
    var addedActivities = []; 

    $("#add").click(function () {
        var Tid = $("#Tid").val();
        var Activity = $("input[name='Activity']").val();

        var newActivity = {
            "Tid": Tid,
            "Activity": Activity
        };

        addedActivities.push(newActivity);

        $("input[name='Activity']").val("");

        refreshTable();
    });

    function refreshTable() {
        var tableBody = $("#activity-table-body");
        tableBody.empty(); 

        for (var i = 0; i < addedActivities.length; i++) {
            var data = addedActivities[i];
            var row = "<tr><td>" + data.Tid + "</td><td>" + data.Activity + "</td><td><button  class='btn btn-danger delete-btn' data-index='" + i + "'>Delete</button></td></tr>";
            tableBody.append(row);
        }

        $(".delete-btn").click(function () {
            var index = $(this).data("index");
            addedActivities.splice(index, 1);
            refreshTable(); 
        });
    }

    $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "assignTask.php",
            data: { "addedActivities": addedActivities },
            success: function (response) {
                if (response === "success") {
                    alert("Data submitted successfully!");
                    addedActivities = [];
                    refreshTable();
                } else {
                  alert("Data submitted successfully!");
                    addedActivities = [];
                    refreshTable();
                }
            },
            error: function (xhr, status, error) {
                alert("AJAX Error: " + error);
            }
        });
    });
});

</script>
</body>
</html>
