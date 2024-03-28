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
if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        echo "User not found!";
        exit;
    }

    // Close the database connection
    $conn->close();

    $cartItemsHTML = '';
    $totalAmount = 0;

while ($row = $result->fetch_assoc()) {
    $cartItemsHTML .= '<div class="cart-item">';
    $cartItemsHTML .= '<div class="item-image"><img src="' . $row["product_image"] . '" class="photo"></div>';
    $cartItemsHTML .= '<div class="item-details">';
    $cartItemsHTML .= '<div class="item-name">' . $row['product_name'] . '</div>';
    $cartItemsHTML .= '<div class="item-amount">₹' . $row['total_amount'] . '</div>';
    $cartItemsHTML .= '<div class="item-quantity">Quantity: 1</div>';
    $cartItemsHTML .= '</div>';
    $cartItemsHTML .= '</div>';

    // Add the price to the total amount
    $totalAmount += $row['total_amount'];

    
}
?>
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
                <link rel="stylesheet" href="all CSS/payment.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                    crossorigin="anonymous"></script>
                <script src="https://kit.fontawesome.com/d871e58d52.js" crossorigin="anonymous"></script>
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cursive+Font&display=swap">

                <style>
                    /*
            * Prefixed by https://autoprefixer.github.io
            * PostCSS: v8.4.14,
            * Autoprefixer: v10.4.7
            * Browsers: last 4 version
            */

            .item-image img {
                        max-width: 80px;
                        opacity: 1;
                        height: auto;
                        margin-right: 20px;
                        border-radius: 4px;
                        background-color: #f0f0f0; /* Light background color for the image */
                        padding: 5px; /* Padding for better visibility */
                    }

                   .item-details {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                    -ms-flex-direction: column;
                        flex-direction: column;
            }

            .item-name,
            .item-amount,
            .item-quantity {
                font-family: 'Cursive Font', cursive;
                text-align: left;
            }



            .cart-item {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                margin-bottom: 10px; /* Adjust as needed */
                        background-color: #f0f0f0; /* Light background color for the image */

            }


            .item-details {
                -webkit-box-flex: 1;
                    -ms-flex: 1;
            }

            @media only screen and (max-width: 767px) {
                .pay-container {
                    flex-direction: column; /* Stack containers vertically on small screens */
                }

                .pay-container-2 {
                    order: -1; /* Move the second container to the top on small screens */
                }

                .pay-container-02 {
                    position: static; /* Remove fixed position on small screens */
                }

                .cart-item {
                    flex-direction: column; /* Stack cart items vertically on small screens */
                }
                
                .item-image img {
                    margin-right: 0; /* Remove right margin for the item image on small screens */
                }
                
                .item-details {
                    text-align: center; /* Center item details on small screens */
                }

                .pay-input-email,
                .pay-inputs,
                .city-state-pincode {
                    width: 100%; /* Make input fields full-width on small screens */
                }
            }

                    

                </style>
            </head>

            <body>
                
                <section class="second_navbar">
                    <div class="list">
                        <div><a href="index.php">Home</a></div>
                        <div><a href="#">About</a></div>
                        <div><a href="#">Services</a></div>
                        <div><a href="#">Contect</a></div>
                    </div>
                </section>

                <!-- ------------------------------------------------------------------------------------------------------ -->

                <div class="pay-container">
                    <div class="pay-container-1"> <!-- big container 1 -->
                        <!-- -----------------------------------Title and login--------------- -->
                        <div class="pay-titles">
                            <div class="pay-title">Contact</div>
                            <span class="pay-login">
                                Have an account?
                                <a href="#">Log in</a>
                            </span>
                        </div>

                        <!-- -----------------------------gatting Information (email)------------------- -->
        <form method="post" action="">
                             <div class="pay-input-email">
                                <input type="text" name="email" class="input-effect" required>
                                <span><?php echo $order['email']; ?></span>
                            </div>
                            

                            <!-- --------------------------------delivery------------------------------- -->
                            <div class="pay-titles-2">
                                <div class="pay-title">Delivery</div>
                            </div>
                            
                            <div class="fname-lname">
                                <div class="pay-inputs">
                                    <input type="text" name="fname" class="input-effect-2" required>
                                    <span><?php echo $order['first_name']; ?></span>
                                </div>
                                <div class="pay-inputs">
                                    <input type="text" name="lname" class="input-effect-2" required>
                                    <span><?php echo $order['last_name']; ?></span>
                                </div>
                            </div>

                            <!-- ---------------------------address-------------------------- -->
                            <div class="pay-input-email"> <!--using pay-input-email class for same effect on address box-->
                                <input type="text" name="address" class="input-effect" required>
                                <span><?php echo $order['address']; ?></span>
                            </div>
                            <div class="pay-input-email"> <!--using pay-input-email class for same effect on address box-->
                                <input type="text" name="address-point" class="input-effect" required>
                                <span><?php echo $order['apartment']; ?></span>
                            </div>

                            <!-- -------------------city,state,pincode----------------------- -->
                            <div class="city-state-pincode">
                                <div class="pay-inputs">
                                    <input type="text" name="city" class="input-effect-2" required>
                                    <span><?php echo $order['city']; ?></span>
                                </div>
                               
                                 <div class="pay-inputs">
        <input type="text" name="state" class="input-effect-2" required>
        <span><?php echo $order['state']; ?></span>
    </div>

                                <div class="pay-inputs">
    <input type="number" name="pin" class="input-effect-2 phone-number" required>
                                    <span><?php echo $order['pincode']; ?></span>
                                </div>
                            </div>

                            <!-- ---------------phone number------------- -->
                            <div class="pay-input-email"> <!--using pay-input-email class for same effect on address box-->
                                <input type="number" name="phone" inputmode="numeric" pattern="[0-9]" class="input-effect phone-number" required>

                                <span><?php echo $order['phone']; ?></span>
                            </div>
                           

                            <!-- -----------------------------payments------------------------------- -->
                            <div class="pay-titles-2">
                                <div class="pay-title">Payment</div>
                                <div class="secure-title">
                                    All transactions are secure and encrypted.
                                </div>
                            </div>


                                <div class="radio-item"><input name="#" id="radio2">
                                    <label for="radio2"><?php echo $order['payment_method']; ?></label>
                                </div>
                            
                          
                        </form>

                        <div class="services">
                            <a href="#">Refund policy</a>
                            <a href="#">Privacy policy</a>
                            <a href="#">Terms of service</a>
                        </div>
                    </div>
                    <!-- --------------------------------------------------second container--------------------------------------------------- -->
                    

                            <div class="cart-items-container">
                            <h3>Your Cart Items</h3>
                            <?php echo $cartItemsHTML; ?>

                            </div>
                             <div class="all-totals">
                                <div class="Subtotal">
                                <p class="total">Subtotal</p>
                                <p class="total">₹<?php echo number_format($totalAmount, 2); ?></p>
                            </div>
                                <div class="Shipping Subtotal">
                                    <p class="total">Shipping</p>
                                    <p class="total">Free</p>
                                </div>
                                <div class="total1">
                                    <div class="total2">
                                        <p class="total3">Total</p>
                                        <p class="total4">Including ₹396.00 in taxes</p>
                                    </div>
                                <p class="total">₹<?php echo number_format($totalAmount, 2); ?></p>
                                </div>
                                <div class="coupen-applyed">
                                    <p><i class="fa-solid tag fa-tags"></i>TOTAL SAVINGS ₹399.00</p>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                </div>
                <script>
                    let sidebar = document.getElementsByClassName("pay-container-2")[0];
                    let sidebar_content = document.getElementsByClassName("pay-container-02")[0];

                    window.onscroll = () => {
                        let scrollTop = window.scrollY;
                        let viewportHeight = window.innerHeight;
                        let contentHeight = sidebar_content.getBoundingClientRect().height;

                        if (scrollTop >= contentHeight - viewportHeight) {
                            sidebar_content.style.position = "fixed";
                        }
                        else {
                            sidebar_content.style.position = "";
                        }
                    }
                </script>

                
            </body>

            </html>


