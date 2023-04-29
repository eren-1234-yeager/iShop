<?php
define('const', true);
include "_header.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo "Welcome " . $_SESSION['username']; ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<style>
  body {
    height: 631px;
  }

  .side {
    height: 100%;
    width: 220px;
  } 

  #main {
    height: 631px;
    display: flex;

  }
</style>

<body>

  <div class="main my-2" id="main">
    <div class="side p-3 bg-light" id="side">
      <span class="fs-4">Users</span>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="/ishop/partials/_user.php?tab=settings" id="settings" class="myd nav-link link-dark" aria-current="page">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#home"></use>
            </svg>
            Settings
          </a>
        </li>

        <li>
          <a href="/ishop/partials/_user.php?tab=orders" id="orders" class="myd nav-link link-dark">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#table"></use>
            </svg>
            Orders
          </a>
        </li>
        <li>
          <a href="/ishop/partials/_user.php?tab=cart" id="cart" class="myd nav-link link-dark">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#grid"></use>
            </svg>
            Cart
          </a>
        </li>
        <li>
          <a href="/ishop/partials/_user.php?tab=care" id="care" class="myd nav-link link-dark">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#people-circle"></use>
            </svg>
            Customer Care
          </a>
        </li>
      </ul>
      <hr>

      <a href="#" class="d-flex align-items-center link-dark text-decoration-none " id="dropdownUser2" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?php echo $_SESSION['username'] ?></strong>
      </a>
    </div>
    <?php
    if (!isset($_GET['tab'])) {
      echo "user ";
    }else{
    switch ($_GET['tab']) {
      case 'settings':
        include "_settings.php";
        break;
      case 'orders':
        include "_orders.php";
        break;
      case 'cart':
        include "_cart.php";
        break;
      case 'care':
        include "_care.php";
        break;
      
      default:
        echo "users";
        break;
    }
  }
    ?>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script>
    let e = document.getElementById('<?php echo $_GET['tab'] ?>')
    e.className += " active"
  </script>
</body>

</html>