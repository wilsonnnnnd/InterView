<?php
// Check if the ID parameter is provided in the URL
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../config.php";

    // Prepare a SELECT statement
    $sql = "SELECT * FROM enrolment WHERE ID = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){
                // Fetch the enrolment record
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $ID = $row["ID"];
                $User_ID = $row["User_ID"];
                $Course_ID = $row["course_ID"];
                $State = $row["State"];
            } else{
                // No enrolment record found with the given ID, redirect to the enrolment index page
                header("location: index.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else{
    // ID parameter is missing, redirect to the enrolment index page
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="mt-5">
                <h2>Enrolment Details</h2>
                <div class="form-group">
                    <label>ID:</label>
                    <p><?php echo $row["ID"]; ?></p>
                </div>
                <div class="form-group">
                    <label>User ID:</label>
                    <p><?php echo $row["User_ID"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Course ID:</label>
                    <p><?php echo $row["course_ID"]; ?></p>
                </div>
                <div class="form-group">
                    <label>State:</label>
                    <p><?php echo $row["State"]; ?></p>
                </div>
                <p><a href="index.php" class="btn btn-secondary">Back</a></p>
            </div>
        </div>
    </div>
</body>

</html>
