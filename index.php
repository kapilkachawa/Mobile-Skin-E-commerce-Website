<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_acc"])) {
  // If not logged in, redirect to the login page
  header("Location: login.php");
  exit();
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
  <link rel="stylesheet" href="cc.css">
              <link rel="stylesheet" href="all CSS/products_page_css.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/d871e58d52.js" crossorigin="anonymous"></script>
</head>

<body>  


  


          <?php include ('public_index/nav.php');?>

    



  <!-- -----------------------------------------main photo-------------------------------------- -->

  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="#"><img src="image/by layers.png" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
        <a href="#"><img src="image/more big ad.png" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
        <a href="#"><img src="image/more big ad.png" class="d-block w-100" alt="..."></a>
      </div>
    </div>
  </div>

  <!-- -----------------------------brands------------------------------ -->
  <div class="brand-container">
    <h1>Select Your Brand</h1>
    <div class="wrapper">
     
      <div class="item"><a href="phone_details.php?brand=apple"><img src="image/apple 1.png" class="brand-logo"></a>
  <div class="text">Apple</div>
</div>


      <div class="item"><a href="phone_details.php?brand=samsung"><img src="image/samsung 2.png" class="brand-logo"></a>
        <div class="text">Samsung</div>
      </div>

      <div class="item"><a href="phone_details.php?brand=google"><img src="image/google 12.png" class="brand-logo"></a>
        <div class="text">Google</div>
      </div>

      <div class="item"><a href="phone_details.php?brand=oneplus"><img src="image/one plus 3.png" class="brand-logo"></a>
        <div class="text">OnePlus</div>
      </div>

      <div class="item"><a href="phone_details.php?brand=realme"><img src="image/realme 4.png" class="brand-logo"></a>
        <div class="text">Realme</div>
      </div>

      <div class="item"><a href="phone_details.php?brand=xiaomi"><img src="image/xiamoi 5.png" class="brand-logo"></a>
        <div class="text">Xiaomi</div>
      </div>

      <div class="item"><a href="phone_details.php?brand=oppo"><img src="image/oppo 6.png" class="brand-logo"></a>
        <div class="text">Oppo</div>
      </div>

      <div class="item"><a href="phone_details.php?brand=asus"><img src="image/asus 7.png" class="brand-logo"></a>
        <div class="text">Asus</div>
      </div>
     
      <div class="item"><a href="phone_details.php?brand=nothing"><img src="image/nothing 8.png" class="brand-logo"></a>
        <div class="text">Nothing</div>
      </div>
      
      <div class="item"><a href="phone_details.php?brand=iqoo"><img src="image/iqoo 9.png" class="brand-logo"></a>
        <div class="text">Iqoo</div>
      </div>
      
      <div class="item"><a href="phone_details.php?brand=vivo"><img src="image/vivo 11.png" class="brand-logo"></a>
        <div class="text">Vivo</div>
      </div>
     
      <div class="item"><a href="phone_details.php?brand=poco"><img src="image/poco 10.png" class="brand-logo"></a>
        <div class="text">Poco</div>
      </div>
    </div>
  </div>

  <!-- ------------------------------------------------------------------------- -->

  <div id="carouselExampleDark" class="carousel carousel-dark slide lol">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="image/product.png" class="d-block w-100 h-200" alt="photo">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="image/product.png" class="d-block w-100 h-200" alt="photo">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="image/product.png" class="d-block w-100 h-200" alt="photo">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="big-photos">
    <div class="twobigbox">
      <img src="image/bigphoto01.png" class="b1">
      <img src="image/bigphoto01.png" class="b1">
    </div>
  </div>

  <!-- ------------------categorys--------------------- -->

  <div class="category">
    <h2>
      Shop by Category</h2>
    <div class="all-cat">
      <div class="cat-box">
        <div class="cats"><img src="image/cat1.png" class="cat">
          <h3 class="cat-name">Ear pods</h3>
        </div>
        <div class="cats"><img src="image/cat1.png" class="cat">
          <h3 class="cat-name">Ear pods</h3>
        </div>
        <div class="cats"><img src="image/cat1.png" class="cat">
          <h3 class="cat-name">Ear pods</h3>
        </div>
        <div class="cats"><img src="image/cat1.png" class="cat">
          <h3 class="cat-name">Ear pods</h3>
        </div>
      </div>
      <div class="cat-box">
        <div class="cats"><img src="image/cat1.png" class="cat">
          <h3 class="cat-name">Ear pods</h3>
        </div>
        <div class="cats"><img src="image/cat1.png" class="cat">
          <h3 class="cat-name">Ear pods</h3>
        </div>
        <div class="cats"><img src="image/cat1.png" class="cat">
          <h3 class="cat-name">Ear pods</h3>
        </div>
        <div class="cats"><img src="image/cat1.png" class="cat">
          <h3 class="cat-name">Ear pods</h3>
        </div>
      </div>
    </div>
  </div>

  <!-- --------------------------big ad----------------------------------- -->

  <div class="offer">
    <div class="row">
      <div class="col-2">
        <img src="image/cat1.png" class="offer-img">
      </div>
      <div class="col-3">
        <p>Exclusively Available on Case Club</p>
        <h1>Headphone's</h1>
        <small>Aroma NB119C Carter 48 Hours Playing Time Fast Charging Bluetooth Neckband Earphone Bluetooth Headset
          (Black, Silver, In the Ear)</small>
        <a href="#" id="buttonn">Buy Now &#8594;</a>
      </div>
    </div>
  </div>

  <!-- ----------------------products---------------------- -->

  <div class="containerr">
    <h2 id="product-title">Iphone Skin Designs</h2>
    <div class="row-container">
      <div class="first-row">
        <div class="product"><img src="image/i phone1.png" class="product-img">
          <div class="price">
            <h5>iphone Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/i phone1.png" class="product-img">
          <div class="price">
            <h5>iphone Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/i phone1.png" class="product-img">
          <div class="price">
            <h5>iphone Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/i phone1.png" class="product-img">
          <div class="price">
            <h5>iphone Skin</h5>
            <p>499/-</p>
          </div>
        </div>
      </div>
      <div class="first-row">
        <div class="product"><img src="image/i phone1.png" class="product-img">
          <div class="price">
            <h5>iphone Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/i phone1.png" class="product-img">
          <div class="price">
            <h5>iphone Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/i phone1.png" class="product-img">
          <div class="price">
            <h5>iphone Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/i phone1.png" class="product-img">
          <div class="price">
            <h5>iphone Skin</h5>
            <p>499/-</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="buttonnn">
    <div class="button-div">
      <a href="#" id="buttonn">View More &#8594;</a>
    </div>
  </div>

  <!-- ----------------------------more big ad---------------------------------- -->

  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="mimage/more big ad.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">image/
        <img src="image/more big ad.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="image/more big ad.png" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>

  <!-- ----------------------------------laptop skin------------------------------------- -->

  <div class="containerr">
    <h2 id="product-title">Laptop Skin Designs</h2>
    <div class="row-container">
      <div class="first-row">
        <div class="product"><img src="image/laptop skins.png" class="product-img">
          <div class="price">
            <h5>Laptop Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/laptop skins.png" class="product-img">
          <div class="price">
            <h5>Laptop Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/laptop skins.png" class="product-img">
          <div class="price">
            <h5>Laptop Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/laptop skins.png" class="product-img">
          <div class="price">
            <h5>Laptop Skin</h5>
            <p>499/-</p>
          </div>
        </div>
      </div>
      <div class="first-row">
        <div class="product"><img src="image/laptop skins.png" class="product-img">
          <div class="price">
            <h5>Laptop Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/laptop skins.png" class="product-img">
          <div class="price">
            <h5>Laptop Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/laptop skins.png" class="product-img">
          <div class="price">
            <h5>Laptop Skin</h5>
            <p>499/-</p>
          </div>
        </div>
        <div class="product"><img src="image/laptop skins.png" class="product-img">
          <div class="price">
            <h5>Laptop Skin</h5>
            <p>499/-</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="buttonnn">
    <div class="button-div">
      <a href="#" id="buttonn">View More &#8594;</a>
    </div>
  </div>

  <!-- ----------------------------------our features----------------------------- -->

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

  <!-- --------------------------------footer----------------------------------------- -->

      <?php include ('public_index/footer.php');?>


  <script src="all js/loljs.js"></script>
 
   <script>
    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'GET',
        data: {
          cartItem: "cart_item"
        },
        success: function (response) {
          // Assuming your response is just a number, update the HTML element with id 'cart-item'
          $("#cart-item").text(response);
        },
        error: function (error) {
          console.error('Error loading cart item number:', error);
        }
      });
    }

    // Call the function when the document is ready
    $(document).ready(function () {
      load_cart_item_number();
    });
  </script>

  



</body>

</html>