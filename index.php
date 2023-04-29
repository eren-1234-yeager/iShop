
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>iShop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<link rel="stylesheet" href="index.css">

<?php
define('const',true);
require "partials/_db.php" ;
include "partials/_header.php" ;
include "partials/_loginModal.php";
include "partials/_signupModal.php";
?>
<body>
  <div class="container-fluid my-0 mx-0 messages">
    <?php
    if(isset($_COOKIE['message']) and isset($_GET['m'])){
      echo  '<div class="my-0 alert alert-'.$_GET['t'].' alert-dismissible fade show" role="alert">
      <strong>MESSAGE!</strong> '.$_GET['m'].'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
  </div>
  <div class="container-fluid my-0 mx-0">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://source.unsplash.com/random/1200X900/?coding,python" class="cimg d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://source.unsplash.com/random/1200X900/?coding,java" class="cimg d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://source.unsplash.com/random/1200X900/?coding,php" class="cimg d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="container my-3">
    <h2>Top Picks for You:</h2>

    <div id="cardsCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        $sql="SELECT * FROM `products` ORDER BY RAND() LIMIT 14";
        $result=mysqli_query($conn,$sql);

        $no=ceil(mysqli_num_rows($result)/4);
        $count=0;
        
        for($i=0;$i<$no;$i++){
          if ($i==0) { 
            echo '<div class="carousel-item active">';
          }else{
            echo '<div class="carousel-item">';
          }
              while($row=mysqli_fetch_assoc($result)){
                $count+=1;
              if ($count>4) {
                  $count=0;
                  break;
              }
            echo '
                <div class="card">
                <a href="/ishop/product.php?id='.$row['product_id'].'&cat='.$row['product_cat'].'"> <img src="images/'.$row['product_image'].'" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">'.'
                        <a class="text-dark" href="/ishop/product.php?id='.$row['product_id'].'&cat='.$row['product_cat'].'">'.
                        substr($row['product_name'],0,30).'...
                        </a></h5>'.'
                        <h6 class="card-title"><b>₹'.substr($row['product_price'],0,30).'</b></h6>
                          <p class="card-text">'. substr( $row['product_desc'],0,60).'...</p>
                          <a href="/ishop/product.php?id='.$row['product_id'].'&cat='.$row['product_cat'].'" class="btn btn-primary">View Product</a>
                    </div>
                  </div>
                ';
             
          }     
         echo '</div>';   
        }
          ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#cardsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#cardsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


  </div>

<section class="container items">
  <?php
  if (isset($_SESSION['username'])) {
    echo '<div class="card" style="width: 18rem;">
    <img src="https://source.unsplash.com/random/1200X900/?'.$_COOKIE['fav'].'" class="card-img-top" alt="...">
    <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
    </div>
    </div>';
  }
// echo $_COOKIE['fav'];
?>
</section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="index.js"></script>
</body>

</html>