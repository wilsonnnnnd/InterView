<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Course Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo 'http://localhost/interview'; ?>">Interview</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?php echo 'http://localhost/interview/User/index.php'; ?>">User</a>

                <a class="nav-item nav-link" href="<?php echo 'http://localhost/interview/Course/index.php'; ?>">Course</a>
                <a class="nav-item nav-link " href="<?php echo 'http://localhost/interview/Enrolment/index.php'; ?>">Enrolment</a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Course Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Course</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../config.php";
                    
                    // For extra protection these are the columns of which the user can sort by (in your database table).
                    $columns = array('ID','description');
                    // Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
                    $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
                    
                    // Get the sort order for the column, ascending or descending, default is ascending.
                    $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

                    // Attempt select query execution
                    $sql = "SELECT * FROM course ORDER BY " .  $column . ' ' . $sort_order;

                    // Some variables we need for the table.
                    $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
                    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                    $add_class = ' class="highlight"';

                    // // Attempt select query execution
                    // $sql = "SELECT * FROM course";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                       <th><a href="index.php?column=ID&order=<?php echo $asc_or_desc; ?>">ID<i class="fas fa-sort<?php echo $column == 'ID' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                                        <th><a href="index.php?column=Description&order=<?php echo $asc_or_desc; ?>">Description<i class="fas fa-sort<?php echo $column == 'Description' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['ID'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";


                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['ID'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['ID'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['ID'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>