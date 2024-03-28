<?php
$conn = new mysqli("localhost", "root", "", "bhavani");

if ($conn->connect_error) {
    die("Connection Failed!" . $conn->connect_error);
}

// Check if a product deletion request is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $productIdToDelete = $_POST['product_id'];

    // Delete the product from the cart
    $stmt_delete = $conn->prepare('DELETE FROM cart WHERE id = ?');
    $stmt_delete->bind_param('i', $productIdToDelete);
    $stmt_delete->execute();
    $stmt_delete->close();
}

$stmt = $conn->prepare('SELECT * FROM cart');
$stmt->execute();
$result = $stmt->get_result();

// Enable output buffering to prevent header errors
ob_start();
?>

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
        .gradient-custom {
            background: #6a11cb;
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
        }
    </style>
</head>

<body>
    <section class="h-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <?php
                    if ($result->num_rows > 0) {
                    ?>
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Cart - <?php echo $result->num_rows; ?> items</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $totalAmount = 0; // Initialize total amount

                                while ($row = $result->fetch_assoc()) :
                                    $productId = $row['id'];
                                ?>
                                    <!-- Single item -->
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <!-- Image -->
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                data-mdb-ripple-color="light">
                                                <img src="<?php echo $row['skin']; ?>" class="w-100"
                                                    alt="<?php echo $row['model_name']; ?>" />
                                                <a href="#!">
                                                    <div class="mask"
                                                        style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                </a>
                                            </div>
                                            <!-- Image -->
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                            <!-- Data -->
                                            <p><strong><?php echo $row['model_name']; ?></strong></p>
                                            <p>Skin: <?php echo $row['skin_name']; ?></p>

                                            <form method="post" action="">
                                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>" />
                                                <button type="submit" class="btn btn-primary btn-sm me-1 mb-2"
                                                    data-mdb-toggle="tooltip" title="Remove item">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                            <!-- Data -->
                                        </div>

                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                            <!-- Quantity -->
                                            <div class="d-flex mb-4" style="max-width: 300px">
                                                <!-- Your existing quantity form elements -->
                                            </div>
                                            <!-- Quantity -->

                                            <!-- Price -->
                                            <p class="text-start text-md-center">
                                                <span id="price_<?php echo $productId; ?>"><strong><?php echo $row['price']; ?></strong></span>
                                            </p>
                                            <!-- Price -->
                                        </div>
                                    </div>
                                    <!-- Single item -->

                                <?php
                                    // Calculate subtotal for each product
                                    $subtotal = $row['price'] * 1; // Assuming quantity is always 1
                                    $totalAmount += $subtotal;
                                endwhile;
                                ?>
                            </div>
                        </div>
                         <div class="card mb-4">
                        <div class="card-body">
                            <p><strong>Expected shipping delivery</strong></p>
                            <p class="mb-0">12.10.2020 - 14.10.2020</p>
                        </div>
                    </div>

                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <p><strong>We accept</strong></p>
                            <img class="me-2" width="45px"
                                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                                alt="Visa" />
                            <img class="me-2" width="45px"
                                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                                alt="American Express" />
                            <img class="me-2" width="45px"
                                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                                alt="Mastercard" />
                            <img class="me-2" width="45px"
                                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.webp"
                                alt="PayPal acceptance mark" />
                        </div>
                    </div>
                  </div>
                     <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Products
                                    <span id="totalAmount">₹<?php echo number_format($totalAmount, 2); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span>Gratis</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total amount</strong>
                                        <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong>
                                    </div>
                                    <span id="totalAmountWithVAT"><strong>₹<?php echo number_format($totalAmount, 2); ?></strong></span>
                                </li>
                            </ul> 

                            <button type="button" class="btn btn-primary btn-lg btn-block">
                                Go to checkout
                            </button>
                        </div>
                    </div>
                </div>  
                        <!-- Your existing HTML code for shipping, payment, and summary -->
                    <?php
                    } else {
                    ?>
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <p><strong>You don't have any items in the cart. Start purchasing now!</strong></p>
                                <a href="index.php" class="btn btn-primary">Go to Home</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
// Close the statement and connection
$stmt->close();
$conn->close();

// Flush the output buffer and turn off output buffering
ob_end_flush();
?>
