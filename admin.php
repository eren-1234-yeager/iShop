<?php
session_start();
$access=false;
if (isset($_SESSION['username'])and $_SESSION['username']=='adminIshop' and $_GET['pass']=='adminIshop'){
    $access=true;
}else{
    header("Location: /ishop");
}

if ($access==true) {
?>
<div class="container">
    <form method="post" action="<?php $_SERVER['REQUEST_URI'];  ?>" enctype="multipart/form-data">

        name:<input type="text" name="p_name">
        <br>
        <br>
        <!-- <input type="text" name="p_desc"> -->
        desc:<textarea name="p_desc" id="desc" cols="30" rows="10"></textarea>
        <br>
        <br>
        Price:<input type="text" name="p_price">
        <br>
        <br>
        <!-- <input type="text" name="p_features"> -->
        features:<textarea name="p_features" id="desc" cols="30" rows="10"></textarea>
        <br>
        <br>
        <!-- <input type="text" name="p_keywords"> -->
        Keyword:<textarea name="p_keywords" id="desc" cols="30" rows="10"></textarea>
        <br>
        <br>
        by<input type="text" name="p_by">
        <br>
        <br>
        brand:<input type="text" name="p_brand">
        <br>
        <br>
        Category:<input type="text" name="p_cat">
        <br>
        <br>
        Image:<input type="file" name="p_image">
        <br>
        <br>
        <!-- Image:<input type="file" name="p_image[]">
        <br>
        <br>
        Image:<input type="file" name="p_image[]">
        <br>
        <br> -->
        <button type="submit">Add Product</button>
    </form>
</div>
<?php
}
?>


<?php
include "partials/_db.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $p_name=$_POST['p_name'];
    $p_desc=$_POST['p_desc'];
    $p_price=$_POST['p_price'];
    $p_cat=$_POST['p_cat'];
    $p_features=$_POST['p_features'];
    $p_by=$_POST['p_by'];
    $p_brand=$_POST['p_brand'];
    $p_keywords=$_POST['p_keywords'];

    $p_image=$_FILES['p_image'];
    // print_r($p_image);
    $img_u=time()."_".$_SESSION['username']."_".$p_image['name'];
    move_uploaded_file($p_image['tmp_name'],"images/".$img_u);

    $sql="INSERT INTO `products` (`product_image`, `product_name`, `product_price`, `product_desc`, `product_cat`, `product_features`, `product_keywords`, `product_bywhom`, `product_brand`, `dt`) VALUES ('$img_u', '$p_name', '$p_price', '$p_desc', '$p_cat', '$p_features', '$p_keywords', '$p_by', '$p_brand', current_timestamp())";
    $result=mysqli_query($conn,$sql);
    
}

?>