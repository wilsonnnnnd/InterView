<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$user_id = $course_id = $state = "";
$user_id_err = $course_id_err = $state_err = "";
 
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate user_id
    $input_user_id = trim($_POST["user_id"]);
    if (empty($input_user_id)) {
        $user_id_err = "Please enter a User ID.";
    } else {
        $user_id = $input_user_id;
    }
    
    // Validate course_id
    $input_course_id = trim($_POST["course_id"]);
    if (empty($input_course_id)) {
        $course_id_err = "Please enter a Course ID.";
    } else {
        $course_id = $input_course_id;
    }

    // Validate state
    $input_state = trim($_POST["state"]);
    if (empty($input_state)) {
        $state_err = "Please enter a state.";
    } else {
        $state = $input_state;
    }
    
    // Check input errors before inserting in database
    if (empty($user_id_err) && empty($course_id_err) && empty($state_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO enrolment (User_ID, Course_ID, State) VALUES (?, ?, ?)";
        
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_user_id, $param_course_id, $param_state);
            
            // Set parameters
            $param_user_id = $user_id;
            $param_course_id = $course_id;
            $param_state = $state;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Enrolment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Selectize.js CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css">
    <!-- Include Selectize.js JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>


    <style>
    .wrapper {
        width: 600px;
        margin: 0 auto;
    }

    table tr td:last-child {
        width: 120px;
    }
    </style>

    <script>
    $(document).ready(function() {
        $('.selectize-user').selectize({
            create: true, // Allow user to create new options
            sortField: 'text' // Sort options by their display text
        });
    });
    $(document).ready(function() {
        $('.selectize-course').selectize({
            create: true, // Allow user to create new options
            sortField: 'text' // Sort options by their display text
        });
    });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Enrolment</h2>
                    <p>Please fill this form and submit to add a new enrolment record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>User</label>
                            <select name="user_id"
                                class=" selectize-user <?php echo (!empty($user_id_err)) ? 'is-invalid' : ''; ?>">
                                <?php
                                // Include config file
                                require_once "../config.php";

                                // Fetch users from the "user" table
                                $sql = "SELECT ID, first_name,last_name FROM user";
                                if ($result = mysqli_query($link, $sql)) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $userOptionValue = $row['first_name'].' '.$row['last_name']. '(' . $row['ID'] . ')';
                                        $userOptionName = $row['first_name'].' '.$row['last_name']. '(' . $row['ID'] . ')';

                                        // Check if the current user is selected (if editing an existing enrolment)
                                        $selected = ($user_id === $row['ID']) ? 'selected' : '';

                                        echo "<option value='$userOptionValue' $selected>$userOptionName</option>";
                                    }

                                    // Free result set
                                    mysqli_free_result($result);
                                }
                                ?>
                            </select>
                            <span class="invalid-feedback"><?php echo $user_id_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <select name="course_id"
                                class=" selectize-course <?php echo (!empty($course_id_err)) ? 'is-invalid' : ''; ?>">
                                <?php
                                // Include config file
                                require_once "../config.php";

                                // Fetch users from the "user" table
                                $sql = "SELECT ID, description FROM course";
                                if ($result = mysqli_query($link, $sql)) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $userOptionValue = $row['description']. '(' . $row['ID'] . ')';
                                        $userOptionName = $row['description'].'(' . $row['ID'] . ')';

                                        // Check if the current user is selected (if editing an existing enrolment)
                                        $selected = ($user_id === $row['ID']) ? 'selected' : '';

                                        echo "<option value='$userOptionValue' $selected>$userOptionName</option>";
                                    }

                                    // Free result set
                                    mysqli_free_result($result);
                                }
                                ?>
                            </select>
                            <span class="invalid-feedback"><?php echo $user_id_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <select name="state"
                                class="form-control <?php echo (!empty($state_err)) ? 'is-invalid' : ''; ?>">
                                <option value="Not Started" <?php echo ($state === 'Not Started') ? 'selected' : ''; ?>>
                                    Not Started</option>
                                <option value="In Progress" <?php echo ($state === 'In Progress') ? 'selected' : ''; ?>>
                                    In Progress</option>
                                <option value="Completed" <?php echo ($state === 'Completed') ? 'selected' : ''; ?>>
                                    Completed</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $state_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>