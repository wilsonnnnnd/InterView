<!-- <?php
// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$user_id = $course_id = $state = "";
$user_id_err = $course_id_err = $state_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate User ID
    $input_user_id = trim($_POST["user_id"]);
    if (empty($input_user_id)) {
        $user_id_err = "Please enter a User ID.";
    } else {
        $user_id = $input_user_id;
    }

    // Validate Course ID
    $input_course_id = trim($_POST["course_id"]);
    if (empty($input_course_id)) {
        $course_id_err = "Please enter a Course ID.";
    } else {
        $course_id = $input_course_id;
    }

    // Validate State
    $input_state = trim($_POST["state"]);
    if (empty($input_state)) {
        $state_err = "Please enter a state.";
    } else {
        $state = $input_state;
    }

    // Check input errors before updating in the database
    if (empty($user_id_err) && empty($course_id_err) && empty($state_err)) {
        // Prepare an update statement
        $sql = "UPDATE enrolment SET User_ID=?, course_ID=?, State=? WHERE ID=?";
         
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sisi", $param_user_id, $param_course_id, $param_state, $param_id);
            
            // Set parameters
            $param_user_id = $user_id;
            $param_course_id = $course_id;
            $param_state = $state;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to enrolment index page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM enrolment WHERE ID = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
    
                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field values
                    $user_id = $row["User_ID"];
                    $course_id = $row["course_ID"];
                    $state = $row["State"];

                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Enrolment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .wrapper {
        width: 600px;
        margin: 0 auto;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Enrolment</h2>
                    <p>Please edit the input values and submit to update the enrolment record.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" name="user_id" class="form-control <?php echo (!empty($user_id_err)) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $user_id; ?>">
                            <span class="invalid-feedback"><?php echo $user_id_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" name="course_id" class="form-control <?php echo (!empty($course_id_err)) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $course_id; ?>">
                            <span class="invalid-feedback"><?php echo $course_id_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <select name="state" class="form-control <?php echo (!empty($state_err)) ? 'is-invalid' : ''; ?>">
                                <option value="Not Started" <?php echo ($state === 'Not Started') ? 'selected' : ''; ?>>Not Started</option>
                                <option value="In Progress" <?php echo ($state === 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                                <option value="Completed" <?php echo ($state === 'Completed') ? 'selected' : ''; ?>>Completed</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $state_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html> -->
