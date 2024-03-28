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

if (isset($_POST['create'])) {
    $model_name = $_POST["model_name"];
    $price = $_POST["price"];
    $product_qty = $_POST["product_qty"];

    // File upload handling
    $targetDir = "bhavani'/images/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not a valid image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert data into the database
            $sql = "INSERT INTO skins (model_name, price, product_qty, skin) VALUES ('$model_name', '$price','$product_qty', '$targetFile')";

            if ($con->query($sql) === TRUE) {
                echo "<script>alert('New record created successfully')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
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

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="model_name">Model Name</label>
                    <textarea name="model_name" id="model_name" class="form-control" placeholder="Enter Model Name" required></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <textarea name="price" id="price" class="form-control" placeholder="Enter Skin Price" required></textarea>
                </div>

                <div class="form-group">
                    <label for="product_qty">Quantity</label>
                    <textarea name="product_qty" id="product_qty" class="form-control" placeholder="Enter Skin Quantity" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Upload Image</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>

                <button type="submit" name="create" class="btn btn-dark mt-4 mb-4 pt-2 pb-2">Add Model</button>
            </form>
        </div>
    </div>
</body>
</html>
