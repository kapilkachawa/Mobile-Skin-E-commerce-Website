  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="all CSS/lolcss.css">
    <link rel="stylesheet" href="all CSS/single_product_page.css">
            <link rel="stylesheet" href="all CSS/products_page_css.css">
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d871e58d52.js" crossorigin="anonymous"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> 
  </head>

  <body>
     

      <div id="cart-sidebar" class="cart-sidebar">
        <button class="close-sidebar" onclick="closeCartSidebar()">&times;</button>
        <h2>Your Cart</h2>
        <div id="cart-content">
            <?php include('cart_content.php'); ?>
        </div>
    </div>



          <?php include ('public_index/nav.php');?>


    

    <!-- ------------------------------------------------------------------------------------------------------------------------------- -->
    
    <?php
if (isset($_GET['id'])) {
    $selectedId = $_GET['id'];

    // Use $selectedId to fetch and display the skin of the selected ID
    // You need to replace this with your database connection and query
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bhavani";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM skins WHERE id = '$selectedId'";
    $result = $conn->query($sql);

    // Check if a skin with the given ID exists
    if ($result->num_rows > 0) {
        // Fetch the skin details
        $row = $result->fetch_assoc();

        // Display the skin information
        echo '<form class="form-submit">';

        echo '<div class="hole">';
        echo '<div class="all-items">';
        
        echo '<a><img src="' . $row["skin"] . '" class="single-page-img"></a>';
        echo '<div class="information">';
        echo '<h5>' . $row["model_name"] . '</h5>';
        echo '<h2 class="animate__animated animate__bounceInDown">' . $row["skin_name"] . '</h2>';
        echo '<div class="product-price">';
        echo '<span class="price-1">₹ ' . $row["price"] . '</span>';
        echo '<span class="original-price">₨ 999.00</span>';

        echo '</div>';
         echo '<input type="hidden" class="form-control pqty" value="' . $row['product_qty'] . '">';
                    echo '<input type="hidden" class="pid" value="' . $row['id'] . '">';
                    echo '<input type="hidden" class="pname" value="' . $row['model_name'] . '">';
                    echo '<input type="hidden" name="pprice" value="' . $row['price'] . '">';
                    echo '<input type="hidden" class="pimage" value="' . $row['skin'] . '">';
                    

 echo '<button type="button" class="btn btn-info btn-block addItemBtn" onclick="addToCart()">';
                    echo '<i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart';
                    echo '</button>';
       








        echo '<div class="share-">';
        echo '<span>Share:</span>';
        echo '<a href="#"><i class="fa-brands fa-whatsapp"></i></a>';
        echo '<a href="#"><i class="fa-brands fa-instagram"></i></a>';
        echo '<a href="#"><i class="fa-brands fa-facebook"></i></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
    } else {
        // Handle the case where the skin with the given ID does not exist
        echo '<p>Skin not found.</p>';
    }
}
?>

    <!-- ----------------------------------------------------------Camera Skin's---------------------------------------------------------------------- -->

    <div class="single-info-page">
      <div class="single-info-text">
        <h3><b>Camera Skin's</b></h3>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet vitae molestiae ex repudiandae cum incidunt earum
        odio quod quam deleniti! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ipsam illum
        similique eius et, qui ipsa dignissimos impedit nostrum assumenda.
      </div>
      <div class="single-info-img">
        <img src="all images/camera photo.png" alt="image" class="info-img">
      </div>
    </div>

    <!-- -------------------------------------------------------------Laptop Skin's---------------------------------------------------------------- -->

    <div class="single-info-page">
      <div class="single-info-text">
        <h3><b>Laptop Skin's</b></h3>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet vitae molestiae ex repudiandae cum incidunt earum
        odio quod quam deleniti! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ipsam illum
        similique eius et, qui ipsa dignissimos impedit nostrum assumenda.
      </div>
      <div class="single-info-img">
        <img src="all images/laptop photo.png" alt="image" class="info-img">
      </div>
    </div>

    <!-- ----------------------------------------------------------------Charger Skin's---------------------------------------------------------------- -->

    <div class="single-info-page">
      <div class="single-info-text">
        <h3><b>Mobile Charger Skin's</b></h3>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet vitae molestiae ex repudiandae cum incidunt earum
        odio quod quam deleniti! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ipsam illum
        similique eius et, qui ipsa dignissimos impedit nostrum assumenda.
      </div>
      <div class="single-info-img">
        <img src="all images/charger-skin.png" alt="image" class="info-img">
      </div>
    </div>

    <!-- -----------------------------------------------------------------How to Apply-------------------------------------------------------------------- -->

    <div class="info-video">
      <div class="how-to-apply">
        <h2>How to Apply Skin</h2>
      </div>
      <div class="video">
        <video autoplay muted>  
          <source src="all images/how to apply.mp4" type="video/mp4">  
          Your browser does not support.  
        </video> 
      </div>
    </div>

    <!-- ----------------------------------------------------------------------Features------------------------------------------------------------------ -->
    <section class="features">
      <div class="this-row">
        <h2 class="section-heading">Our features</h2>
      </div>
      <div class="this-row">
        <div class="this-column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-truck-ramp-box"></i>
            </div>
            <h3 class="h03">features name</h3>
            <p class="p01">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptatibus animi, eaque
              molestiae tenetur
              distinctio laboriosam! Error, asper</p>
          </div>
        </div>
        <div class="this-column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-truck-ramp-box"></i>
            </div>
            <h3 class="h03">features name</h3>
            <p class="p01">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptatibus animi, eaque
              molestiae tenetur
              distinctio laboriosam! Error, asper</p>
          </div>
        </div>
        <div class="this-column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-truck-ramp-box"></i>
            </div>
            <h3 class="h03">features name</h3>
            <p class="p01">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptatibus animi, eaque
              molestiae tenetur
              distinctio laboriosam! Error, asper</p>
          </div>
        </div>
        <div class="this-column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-truck-ramp-box"></i>
            </div>
            <h3 class="h03">features name</h3>
            <p class="p01">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptatibus animi, eaque
              molestiae tenetur
              distinctio laboriosam! Error, asper</p>
          </div>
        </div>
        <div class="this-column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-truck-ramp-box"></i>
            </div>
            <h3 class="h03">features name</h3>
            <p class="p01">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptatibus animi, eaque
              molestiae tenetur
              distinctio laboriosam! Error, asper</p>
          </div>
        </div>
        <div class="this-column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-truck-ramp-box"></i>
            </div>
            <h3 class="h03">features name</h3>
            <p class="p01">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptatibus animi, eaque
              molestiae tenetur
              distinctio laboriosam! Error, asper</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ----------------------------------------------------footer-------------------------------------------------------------------- -->
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
              <li><a href="#">Accessories</a></li>
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

        <script>
             function openCartSidebar() {
                document.getElementById("cart-sidebar").style.width = "400px";
                document.getElementById("cart-overlay").style.display = "block";
                loadCartContent();
                hideElementsDuringSidebarOpen();
            }

            function closeCartSidebar() {
                document.getElementById("cart-sidebar").style.width = "0";
                document.getElementById("cart-overlay").style.display = "none";
                showElementsAfterSidebarClose();
            }

            function hideElementsDuringSidebarOpen() {
                $(".list_product, .footer").addClass("hidden-during-sidebar");
            }

            function showElementsAfterSidebarClose() {
                $(".list_product, .footer").removeClass("hidden-during-sidebar");
            }

            $(document).ready(function () {
                closeCartSidebar();

                $('#cart-icon').on('click', function (e) {
                    openCartSidebar();
                });

                $('#close-sidebar').on('click', function () {
                    closeCartSidebar();
                });
            });
        </script>


  </body>

  </html>