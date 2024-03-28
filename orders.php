        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bhavani";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch order items
        $stmt = $conn->prepare('SELECT * FROM orders');
        $stmt->execute();
        $result = $stmt->get_result();

        // Close the connection
        $conn->close();
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Order Details</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
                integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
                crossorigin="anonymous">
            <style>
                /* Add your custom styles here */
                body {
                    font-family: Arial, sans-serif;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                th {
                    background-color: #f2f2f2;
                }
            </style>
        </head>

     <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .card-body p {
            margin-bottom: 5px;
        }

        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Order Details</h2>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card">
                <div class="card-header">
                    Order ID: <?php echo $row['id']; ?>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                    <p><strong>Name:</strong> <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
                    <p><strong>Apartment:</strong> <?php echo $row['apartment']; ?></p>
                    <p><strong>City:</strong> <?php echo $row['city']; ?></p>
                    <p><strong>State:</strong> <?php echo $row['state']; ?></p>
                    <p><strong>Pincode:</strong> <?php echo $row['pincode']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                    <p><strong>Payment Method:</strong> <?php echo $row['payment_method']; ?></p>
                    <p><strong>Total Amount:</strong> <?php echo $row['total_amount']; ?></p>
                    <p><strong>Product Name:</strong> <?php echo $row['product_name']; ?></p>
                    <p><strong>Status:</strong> <?php echo $row['status']; ?></p>

                    <img src="<?php echo $row['product_image']; ?>" alt="Product Image">
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>
