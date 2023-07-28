<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$description = $ID = "";

$description_err  = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    
    // Validate first_name
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter the Description.";     
    } else{
        $description = $input_description;
    }


    // Validate first_name
    $input_ID = trim($_POST["ID"]);
    if(empty($input_ID)){
        $ID_err = "Please enter the Course ID.";     
    } else{
        $ID = $input_ID;
    }


    // Check input errors before inserting in database
    if(empty($description_err) ){
        // Prepare an insert statement
        $sql = "INSERT INTO course ( ID,description ) VALUES (  ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_ID,$param_description);
            
            // Set parameters
            $param_ID = $ID;
            $param_description = $description;

            
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
                            <label>Course ID</label>
                            <textarea name="ID" class="form-control <?php echo (!empty($ID_err)) ? 'is-invalid' : ''; ?>" disabled><?php echo $ID; ?></textarea>
                            <span class="invalid-feedback"><?php echo $ID_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
                            <span class="invalid-feedback"><?php echo $description_err;?></span>
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