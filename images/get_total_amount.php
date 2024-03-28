<?php
// Establish the database connection
$conn = new mysqli("localhost", "root", "", "bhavani");

if ($conn->connect_error) {
    die("Connection Failed!" . $conn->connect_error);
}

// Fetch total amount from the cart
$stmt = $conn->prepare('SELECT SUM(price) AS total_amount FROM cart');
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalAmount = $row['total_amount'];
    echo '₨' . number_format($totalAmount, 2);
} else {
    echo 'Rs0.00';
    
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
s