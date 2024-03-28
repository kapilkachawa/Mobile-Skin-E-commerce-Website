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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/d871e58d52.js" crossorigin="anonymous"></script>
        <style>
            /* Add your styles here */

            .addItemBtn {
                background-color: white;
                color: black;
                border: 2px solid #000;
                padding: 8px 110px;
                font-size: 16px;
                cursor: pointer;
                -webkit-transition: background-color 0.3s, color 0.3s;
                -o-transition: background-color 0.3s, color 0.3s;
                transition: background-color 0.3s, color 0.3s;
                display: block;
                margin: 0 auto;
                text-align: center;
            }

            .addItemBtn:hover {
                background-color: #000;
                color: #fff;
            }

            .item {
                margin-bottom: 20px;
            }

            .price {
                font-size: 18px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start;
                margin-top: 5px;
                margin-bottom: 10px;
                padding-left: 5px;
                color: #120000;
            }

            .model-name {
                font-family: 'Caveat', cursive;
                text-align: left;
                font-size: 20px;
                padding-left: 5px;
            }

            .price-container {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }

            .original-price {
                text-decoration: line-through;
                margin-right: 10px;
                color: #363535;
            }

            .pqty {
                display: none;
            }
        </style>
    </head>

    <body>




                 <div id="cart-content"></div>



        <?php include('public_index/nav.php'); ?>

        <div class="list_product">
    <?php
            if (isset($_GET['model'])) {
                $selectedModel = $_GET['model'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bhavani";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM skins WHERE model_name = '$selectedModel'";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo '<form class="form-submit">';
                    echo '<div class="item">';
                    echo '<a href="single_product_information_page.php?id=' . $row['id'] . '"><img src="' . $row["skin"] . '" class="photo"></a>';
                    echo '</div>';

                    echo '<h2 class="model-name">' . $row['model_name'] . '</h2>';

                    echo '<div class="price-container">';
                    echo '<div class="price">₨ ' . $row['price'] . '</div>';
                    echo '<span class="original-price">₨999.00</span>';
                    echo '</div>';

    echo '<input type="text" class="pqty" value="' . $row['product_qty'] . '" readonly>';
                    echo '<input type="hidden" class="pid" value="' . $row['id'] . '">';
                    echo '<input type="hidden" class="pname" value="' . $row['model_name'] . '">';
                    echo '<input type="hidden" name="pprice" value="' . $row['price'] . '">';
                    echo '<input type="hidden" class="pimage" value="' . $row['skin'] . '">';
                    echo '<button type="button" class="btn btn-info btn-block addItemBtn" onclick="addToCart()">';
                    echo '<i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart';
                    echo '</button>';
                    echo '</form>';
                }

                $result->close();
                $conn->close();
            }
            ?>
        </div>

        <footer class="footer">
            <div class="containerrr">
                <div class="rowwww">
                    <div class="footer-col">
                        <h4>Shop</h4>
                        <ul class="footer-ul">
                            <li><a href="#">CASE CLUB</a></li>
                            <li><a href="#">Our services</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Products</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Get Help</h4>
                        <ul class="footer-ul">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Pay Method</a></li>
                            <li><a href="#">Help Center</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Online Shop</h4>
                        <ul class="footer-ul">
                            <li><a href="#">Watch</a></li>
                            <li><a href="#">Mobiles</a></li>
                            <li><a href="#">Skins</a></li>
                            <li><a href="#">Accessories</a></li> <!-- Typo corrected: asus -->
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Follow Us</h4>
                        <div class="social-link">
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

      <script type="text/javascript">
    $(document).ready(function () {
        $(".addItemBtn").click(function (e) {
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find("input[name=pprice]").val();
            var pimage = $form.find(".pimage").val();
            var pqty = $form.find(".pqty").val();

            $.ajax({
                url: 'action.php',
                method: 'post',
                data: {
                    pid: pid,
                    pname: pname,
                    pprice: pprice,
                    pqty: pqty,
                    pimage: pimage,
                },
                success: function (response) {
                    $("#message").html(response);
                    window.scrollTo(0, 0);
                    load_cart_item_number();
                    load_cart_content(); // Add this line to load cart content dynamically
                }
            });
        });

        load_cart_item_number();
        load_cart_content(); // Add this line to load cart content when the page loads

        function load_cart_content() {
            $.ajax({
                url: 'cart_content.php', // Modify the path accordingly
                method: 'get',
                success: function (response) {
                    $("#cart-content").html(response);
                }
            });
        }

        function load_cart_item_number() {
            $.ajax({
                url: 'action.php',
                method: 'get',
                data: {
                    cartItem: "cart_item"
                },
                success: function (response) {
                    $("#cart-item").html(response);
                }
            });
        }
    });
</script>

        
       

        


    </body>

    </html>
