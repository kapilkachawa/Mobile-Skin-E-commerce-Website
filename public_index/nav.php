
<style>
    /* Add the new CSS for the cart sidebar */
    #cart-sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      z-index: 1;
      top: 0;
      right: 0;
      background-color: white;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    #cart-sidebar a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: black;
      display: block;
      transition: 0.3s;
    }

    #cart-sidebar a:hover {
      color: #007bff;
    }

    #cart-sidebar .close-sidebar {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    #cart-content {
      padding: 16px;
    }
  </style>

<nav>
      <h2 class="logo"><b><i>Three</i> <i style="color: gray;">Layers</i></b></h2>
      <ul id="sidemenu">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contect</a></li>
        <li><a href="logout.php">Logout</a></li>
                <li><a href="orders.php">Order</a></li>


        <i class="fa-solid not-show fa-xmark" onclick="closemenu()"></i>
      </ul>
      <div class="icons">
        <i class="fa-solid not-show fa-bars" onclick="openmenu()"></i>
        <i class="fa-solid fa-magnifying-glass"></i>

        <a href="cart-page.php">
    <i class="fas fa-shopping-cart"></i>
    <span id="cart-item" class="badge badge-danger" style="background-color: black; margin-left:-10px;">0</span>
  </a>

      </div>
    </nav>
<section class="second_navbar">
      <div class="list">
        <div><a href="index.php">Home</a></div>
        <div><a href="#">About</a></div>
        <div><a href="#">Services</a></div>
        <div><a href="#">Contect</a></div>
      </div>
    </section>