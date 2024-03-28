<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include('db_connection.php');

    // Retrieve and sanitize input data
    $productId = $_POST['pid'];
    $productName = $_POST['pname'];
    $productPrice = $_POST['pprice'];
    $productImage = $_POST['pimage'];
    $productQty = $_POST['pqty'];

    // Validate the input data if needed

    // Add the item to the cart in the database
    $stmt = $conn->prepare("INSERT INTO cart (product_id, product_name, product_price, product_image, product_qty) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isdsi", $productId, $productName, $productPrice, $productImage, $productQty);
    
    if ($stmt->execute()) {
        // Return a success response
        echo json_encode(['status' => 'success', 'message' => 'Item added to cart successfully']);
    } else {
        // Return an error response
        echo json_encode(['status' => 'error', 'message' => 'Error adding item to cart']);
    }

    $stmt->close();
    $conn->close();
} else {
    // Return an error response if the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

?>
