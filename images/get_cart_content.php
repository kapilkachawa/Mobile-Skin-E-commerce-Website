<?php
// Establish the database connection
$conn = new mysqli("localhost", "root", "", "bhavani");

if ($conn->connect_error) {
    die("Connection Failed!" . $conn->connect_error);
}

// Fetch cart items
$stmt = $conn->prepare('SELECT * FROM cart');
$stmt->execute();
$result = $stmt->get_result();

// Check if there are items in the cart
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Output HTML for each cart item
        echo '<div class="cart-item" id="cart-item-' . $row['id'] . '">';
        echo '<div class="item-image">';
        echo '<img src="' . $row['skin'] . '" alt="' . $row['model_name'] . '" />';
        echo '</div>';

        echo '<div class="item-details">';
        echo '<div class="item-info">';
        echo '<p class="item-name"><strong>' . $row['model_name'] . '</strong></p>';
        // You can include more details here as needed
        echo '</div>';
        
        echo '<div class="item-amount">';
        echo '<span id="price_' . $row['id'] . '"><strong>₨' . number_format($row['price'], 2) . '</strong></span>';
        echo '</div>';

        echo '<div class="item-quantity">';
        echo 'Quantity: 1'; // Assuming quantity is always 1 for each item
        echo '</div>';

        echo '<form>';
        echo '<input type="hidden" name="product_id" value="' . $row['id'] . '" />';
        echo '<button type="button" class="btn btn-remove" data-mdb-toggle="tooltip" title="Remove item" onclick="removeItem(' . $row['id'] . ')">';
        echo '<i class="fas fa-trash"></i> Remove';
        echo '</button></form>';

        echo '</div>';
        echo '</div>';
    }
} else {
    // Output a message if the cart is empty
    echo '<p><strong>No items in the cart.</strong></p>';
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
