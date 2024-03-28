<?php
// Check if the delete_id parameter is set in the URL
if (isset($_GET['delete_id'])) {
    // Establish connection to the database
    $connection = mysqli_connect("localhost", "root", "", "bhavani");

    // Check if the connection was successful
    if ($connection) {
        // Escape the delete_id to prevent SQL injection
        $delete_id = mysqli_real_escape_string($connection, $_GET['delete_id']);

        // Construct the DELETE query
        $query = "DELETE FROM cart WHERE id = '$delete_id'";

        // Execute the DELETE query
        $result = mysqli_query($connection, $query);

        // Check if the deletion was successful
        if ($result) {
            // Redirect back to the cart page after successful deletion
            header("Location: cart-page.php");
            exit(); // Ensure that script execution stops after redirection
        } else {
            // Handle the case where deletion failed
            echo "Error deleting item: " . mysqli_error($connection);
        }

        // Close the database connection
        mysqli_close($connection);
    } else {
        // Handle the case where connection to the database failed
        echo "Error connecting to the database";
    }
} else {
    // Handle the case where delete_id parameter is not set in the URL
    echo "Item ID to delete is not specified";
}
?>
