<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d871e58d52.js" crossorigin="anonymous"></script>
    <style>
        body {
            /* background-color: #f8f9fa; */
            font-family: 'Arial', sans-serif;
        }

        .cart-container {
            max-width: 40rem;
            /* margin: 20px auto; */
            padding: 1rem;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
        }

        .cart-item {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .item-image img {
            max-width: 100px;
            opacity: 1;
            height: auto;
            margin-right: 20px;
            border-radius: 4px;
            background-color: #f0f0f0; /* Light background color for the image */
            padding: 3px; /* Padding for better visibility */
        }

        .item-details {
            flex-grow: 0;
        }

        .item-info {
            text-align: left; /* Changed to left */
        }

        .item-name {
            font-size: 18.15px;
            font-weight: 400;
            /* font-family: cursive; */
        }

        .item-amount {
            text-align: left; /* Changed to left */
            margin-bottom: 5px;
            color: gray;
        }

        .item-quantity {
            text-align: left; /* Changed to left */
            color: gray;
        }

        .btn-remove {
            /* background-color: #282828; */
            border: 0px solid;
            color: gray;
            font-size: 12px;
            border-radius: 20px;
            letter-spacing: 2px;
        }

        .cart-summary {
            text-align: right;
            margin-top: 20px;
        }

       .btn-start-shopping {
    background-color: black; /* Black background */
    border-color: #fff; /* White border */
    color: #fff !important; /* White text */
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
}
.btn-start-shopping:hover {
     background-color: black; /* Black background */
    border-color: #fff; /* White border */
    color: #fff !important; /* White text */
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
}


.btn-primary {
    background-color: black; /* Black background */
    border-color: #fff; /* White border */
    color: #fff !important; /* White text */
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
}
.btn-primary:hover {
     background-color: black; /* Black background */
    border-color: #fff; /* White border */
    color: #fff !important; /* White text */
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
}




        @media only screen and (max-width:600px) {
            .cart-container {
                max-width: 30rem;
                /* margin: 20px auto; */
                padding: 1rem;
                background-color: #fff;
                border-radius: 15px;
                box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
            }

            .cart-item {
                border-bottom: 1px solid #ddd;
                padding-bottom: 10px;
                margin-bottom: 20px;
                display: flex;
                align-items: center;
            }

            .item-image img {
                max-width: 100px;
                opacity: 1;
                height: auto;
                margin-right: 20px;
                border-radius: 4px;
                background-color: #f0f0f0;
                /* Light background color for the image */
                padding: 3px;
                /* Padding for better visibility */
            }

            .item-details {
                flex-grow: 0;
            }

            .item-info {
                text-align: left;
                /* Changed to left */
            }

            .item-name {
                font-size: 18.15px;
                font-weight: 400;
                /* font-family: cursive; */
            }

            .item-amount {
                text-align: left;
                /* Changed to left */
                margin-bottom: 5px;
                color: gray;
            }

            .item-quantity {
                text-align: left;
                /* Changed to left */
                color: gray;
            }

            .btn-remove {
                /* background-color: #282828; */
                border: 0px solid;
                color: gray;
                font-size: 12px;
                border-radius: 20px;
                letter-spacing: 2px;
            }

            .cart-summary {
                text-align: right;
                margin-top: 20px;
            }

            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
                color: #fff;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 4px;
                font-size: 16px;
            }

            .btn-primary:hover {
                background-color: #0056b3;
                border-color: #0056b3;
            }
        }
    </style>

    <script>
          

  function addToCart(productId, productName, productPrice, productImage, productQty) {
    var cartLimit = 10;

    // Check if the cart has reached the limit (e.g., 10 items)
    var cartItems = document.getElementsByClassName('cart-item');

    if (cartItems.length >= cartLimit) {
      alert('You cannot add more than ' + cartLimit + ' items to the cart.');
      return;
    }

    // Send an AJAX request to add_item.php
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_item.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Specify the data to be sent to the server
    var data =
      "pid=" + productId +
      "&pname=" + encodeURIComponent(productName) +
      "&pprice=" + productPrice +
      "&pimage=" + encodeURIComponent(productImage) +
      "&pqty=" + productQty;

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4) {
        console.log('Add to Cart response:', xhr.status, xhr.responseText);

        // Update the cart display on successful addition
        if (xhr.status == 200) {
          // After updating the cart, update the total amount and show/hide the "Start Shopping" button
          updateCartDisplay();
          updateTotalAmount();
        }
      }
    };

    // Send the request
    xhr.send(data);
  }

    // Function to update the cart display using AJAX
    function updateCartDisplay() {
        // Send an AJAX request to get_cart_content.php
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_cart_content.php", true);

        // Set up the callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Update the cart container with the new content
                document.getElementById("cart-container").innerHTML = xhr.responseText;
            }
        };

        // Send the request
        xhr.send();
    }
        
        // Function to update the total amount and show/hide the "Start Shopping" button
        function updateTotalAmount() {
            // Send an AJAX request to get the updated total amount
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_total_amount.php", true);

            // Set up the callback function to handle the response
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Update the total amount display
                    var totalAmount = xhr.responseText.trim();
                    var totalAmountElement = document.getElementById("total-amount");
                    var startShoppingButton = document.getElementById("start-shopping-btn");

                    totalAmountElement.innerHTML = totalAmount;

                    // Show/hide the "Start Shopping" button based on the total amount
                    if (totalAmount === 'Rs0.00') {
                        startShoppingButton.style.display = "block"; // Show "Start Shopping" button
                    } else {
                        startShoppingButton.style.display = "none"; // Hide "Start Shopping" button
                    }
                }
            };

            // Send the request
            xhr.send();
        }

        // Function to handle removing an item from the cart using AJAX
        // Function to handle removing an item from the cart using AJAX
function removeItem(productId) {
    // Send an AJAX request to remove_item.php
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "remove_item.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Specify the data to be sent to the server
    var data = "product_id=" + productId;

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the cart item display on success
            var itemElement = document.getElementById("cart-item-" + productId);
            itemElement.parentNode.removeChild(itemElement);

            // Update the total amount and show/hide the "Start Shopping" button
            updateTotalAmount();

            // Check if there are no items in the cart
            var cartContainer = document.getElementById("cart-container");
            if (!cartContainer || cartContainer.innerHTML.trim() === '') {
                // Reload the entire page
                window.location.reload(true);
            }
        }
    };

    // Send the request
    xhr.send(data);
}


         function loadMoreItems(page) {
            // Send an AJAX request to load more items
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_more_items.php",true);

            // Set up the callback function to handle the response
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Append the new items to the cart container
                    document.getElementById("cart-container").innerHTML += xhr.responseText;
                }
            };

            // Send the request
            xhr.send();
        }

        

     

    </script>

    
 
</head>

<body>
     <?php
    // Establish the database connection
    $conn = new mysqli("localhost", "root", "", "bhavani");

    if ($conn->connect_error) {
        die("Connection Failed!" . $conn->connect_error);
    }
    $stmt = $conn->prepare("SELECT * FROM cart");
    $stmt->execute();
    $result = $stmt->get_result();



    $totalAmount = 0; // Initialize total amount

    if ($result->num_rows > 0) {
        echo '<div class="cart-container" id="cart-container">';

         while ($row = $result->fetch_assoc()) {
            // Output HTML for each cart item
            echo '<div class="cart-item" id="cart-item-' . $row['id'] . '">';
            echo '<div class="item-image">';
            echo '<img src="' . $row['skin'] . '" alt="' . $row['model_name'] . '" />';
            echo '</div>';

            echo '<div class="item-details">';
            echo '<div class="item-info">';
            echo '<p class="item-name"><strong>' . $row['model_name'] . '</strong></p>';
            //echo '<p>Skin: ' . $row['skin_name'] . '</p>';
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
            // Add the price to the total amount
            $totalAmount += $row['price'];
        }
        // Display total amount and checkout button or "Start Shopping" button
        echo '<div class="cart-summary">';
        if ($totalAmount > 0) {
            echo '<p>Total Amount: <strong id="total-amount">₨' . number_format($totalAmount, 2) . '</strong></p>';
            echo '<a href="payment.php" class="btn btn-primary">Checkout</a>';  
        } else {
echo '<p style="font-family: cursive; font-size: 20px; text-align: center;"><strong>No items in the cart.</strong></p>';
echo '<a href="index.php" id="start-shopping-btn" class="btn btn-start-shopping">Start Shopping</a>';
        }
        echo '</div>';
        echo '</div>';
    }
    // Close the statement and connection
    $stmt->close();
    $conn->close();
    ?>
</body>
</html> 