<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$first_name = $last_name = "";
$first_name_err = $last_name_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    
    // Validate first_name
    $input_first_name = trim($_POST["first_name"]);
    if(empty($input_first_name)){
        $first_name_err = "Please enter the First_Name.";     
    } else{
        $first_name = $input_first_name;
    }

        // Validate last_name
        $input_last_name = trim($_POST["last_name"]);
        if(empty($input_first_name)){
            $last_name_err = "Please enter the Last Name.";     

        } else{
            $last_name = $input_last_name;
        }
    
    // Check input errors before inserting in database
    if(empty($first_name_err) && empty($last_name_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO user ( first_name, last_name) VALUES ( ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_first_name, $param_last_name);
            
            // Set parameters
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
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
    <title>Create Record</title>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create User</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="form-group">
                            <label>First Name</label>
                            <textarea name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>"><?php echo $first_name; ?></textarea>
                            <span class="invalid-feedback"><?php echo $first_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <textarea name="last_name" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>"><?php echo $last_name; ?></textarea>
                            <span class="invalid-feedback"><?php echo $last_name_err;?></span>
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