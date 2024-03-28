<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="all CSS/lolcss.css">
    <link rel="stylesheet" href="all CSS/products_page_css.css">
    <link rel="stylesheet" href="all CSS/cart-page.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d871e58d52.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- nav link add kr dena -->

    <div class="cart-container"> <!-- First container -->
        <div class="cart-child-container"> <!-- Second container -->
            <div class="cart-heading"> <!-- this is for heading -->
                Shopping Bag
            </div>
            <div class="cart-body"> <!-- main cart body container -->
                <div class="cart-head head-1"> <!-- this is for cart header's container -->
                    <div class="product-box p-1">
                        <p>PRODUCT</p>
                    </div>
                    <div class="PQT-box PQT-1">
                        <p>PRICE</p>
                        <P>QUANTITY</P>
                        <P>TOTAL</P>
                    </div>
                </div>
                
                <!-- loop start kare toh cart-head class wale div se start karna he taaki wo display block rahe or ek ke baad ek product niche aate jayenge -->
                   
                    <?php
                   
                    $connection = mysqli_connect("localhost", "root", "", "bhavani");

                    $query = "SELECT id, skin, price, model_name FROM cart";
                    $result = mysqli_query($connection, $query);

                    // Initialize total variable
                    $total = 0;

                    // Check if query was successful
                    if ($result) {
                        // Loop through each row in the result set
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Output HTML for each product using fetched data
                            echo '<div class="cart-head">';
                            echo '<div class="product-box">';
                            echo '<div class="delete-box">';
                            echo '<i class="fa-solid fa-trash" onclick="deleteItem(' . $row['id'] . ')"></i>'; // Add onclick function to remove item
                            echo '</div>';
                            echo '<div class="products-image">';
                            echo '<img src="' . $row['skin'] . '" alt="image" class="cart-image">';
                            echo '</div>';
                            echo '<div class="products-detail">';
                            echo '<p>' . $row['model_name'] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="PQT-box">';
                            echo '<p>Rs. ' . $row['price'] . '</p>';
                            echo '<P>1</P>';
                            echo '<P>Rs. ' . $row['price'] . '</P>';
                            echo '</div>';
                            echo '</div>';

                            // Add price to total
                            $total += $row['price'];
                        }
                    } else {
                        // Handle error if query fails
                        echo "Error: " . mysqli_error($connection);
                    }

                    // Close database connection
                    mysqli_close($connection);
                    ?>

                
            </div>
        </div>
    </div>

    <div class="total-container">
        <div class="first-button">
           <a href="index.php"> <button>CONTINUE SHOPPING</button></a>
        </div>
        <div class="second-button">
            <div class="total-price">
                <div class="total-1">
                    <p>Sub-Total:</p>
                    <!-- Display total here -->
                    <p>Rs. <?php echo $total; ?></p>
                </div>
                <div class="total-1">
                    <p>Total:</p>
                    <!-- Display total here -->
                    <p>Rs. <?php echo $total; ?></p>
                </div>
            </div>
            <div class="first-button">
               <a href="payment.php"> <button>&nbsp;&nbsp;CHECKOUT&nbsp;&nbsp;</button></a>
            </div>
        </div>
    </div>

    <!-- yaha per footer add kr dena -->

    <script>
        function deleteItem(itemId) {
            if (confirm("Are you sure you want to delete this item?")) {
                window.location.href = "remove_item.php?delete_id=" + itemId;
            }
        }
    </script>
</body>

</html>
