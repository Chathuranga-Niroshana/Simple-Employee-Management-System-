<?php
$conn = mysqli_connect('localhost', 'root', '', 'project1');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addedActivities"]) && is_array($_POST["addedActivities"])) {
        $addedActivities = $_POST["addedActivities"];
        
        $insertSuccess = true;

        foreach ($addedActivities as $data) {
            if (isset($data["Tid"], $data["Activity"])) {
                $Tid = mysqli_real_escape_string($conn, $data["Tid"]);
                $Activity = mysqli_real_escape_string($conn, $data["Activity"]);

                $sql = "INSERT INTO taskactivities (Tid, Activity) VALUES ('$Tid', '$Activity')";
                if (!mysqli_query($conn, $sql)) {
                    $insertSuccess = false;
                    echo "Error inserting data: " . mysqli_error($conn);
                    break;
                }
            } else {
                $insertSuccess = false;
                echo "Invalid data format.";
                break;
            }
        }

        if ($insertSuccess) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    } else {
        echo "Invalid input data.";
    }
}

mysqli_close($conn);
?>
