<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['user_admin'])) {
    header("location: index.php");
    die();
}

date_default_timezone_set('Asia/Kolkata');
include('includes/source.php');
include('includes/function.php');
include('user_info.php');

$br = '\n';
$error = false;

// Fetch tables outside the form submission condition
$tables_query = "SHOW TABLES";
$tables_result = $con->query($tables_query);
$tables = [];

if ($tables_result->num_rows > 0) {
    while ($row = $tables_result->fetch_row()) {
        // Only add tables that start with "model" to the array
        if (strpos($row[0], 'model') === 0) {
            $tables[] = $row[0];
        }
    }
}

if (isset($_POST['create'])) {
    $table_name = $_POST["table_name"];
    $modal_name = $_POST["modal_name"];
    $image_path = $_POST["image_path"];

    $sql = "INSERT INTO $table_name (model_name, image_path) VALUES ('$modal_name', '$image_path')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>

<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
    <title>THE SYSTEM ADMINISTRATOR</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .title_name {
            color: rgba(2, 90, 40);
            padding: 10px !important;
            font-family: 'Delicious Handrawn', cursive !important;
            font-family: 'Roboto Slab', serif !important;
        }

        .frm {
            font-family: 'Delicious Handrawn', cursive !important;
            font-family: 'Roboto Slab', serif !important;
        }

        .form-control {
            border: 1px solid rgba(2, 90, 40);
            color: rgba(2, 90, 40);
            border-radius: 0px;
            background-color: rgba(245, 245, 245);
        }
    </style>
</head>
<body>
<?php include('nav_bar.php'); ?>
<?php include('menu_bar.php'); ?>
<div class="futt" id="futt">
    <div class="row" style="width: 100%; margin: 0px; padding: 0px;">
        <div class="col-lg-12 col-md-12 col-12" style="width: 100%; margin: 0px; padding: 0px;">
            <h3 class="p-4 title_name">ADD DEVICE TO MODEL</h3>
        </div>

        <div class="col-lg-6 col-md-12 col-12 frm">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="table_name">Select Model</label>
                    <select name="table_name" class="form-control" required>
                        <option value="" disabled selected>Select a Model</option>
                        <?php
                        foreach ($tables as $table) {
                            echo "<option value='$table'>$table</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="modal_name">Model Name</label>
                    <textarea name="modal_name" id="modal_name" class="form-control" placeholder="Enter Model Name" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image_path">Image URL</label>
                    <textarea name="image_path" id="image_path" class="form-control" placeholder="Enter URL of Image" required></textarea>
                </div>

                <button type="submit" name="create" class="btn btn-dark mt-4 mb-4 pt-2 pb-2">Add Model</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
