<?php

if (!defined('const')) {
  header("Location: /ishop");
}
session_start();
include "partials/_user.php";
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/ishop">iShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/ishop">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories:
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      <?php
      if (!isset($_SESSION['username'])) {
        echo '<div class="auth mx-1">
          <button type="button" class="mx-1 btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
      </div>';
      } else {
        echo '<div class="auth mx-1">
        <button type="button" class="btn btn-outline-success"><a class="text-dark " href="/ishop/partials/_logout.php">Logout</a></button>
        ';
      ?>
        <span class="user">
          <!-- <a href="/ishop/user.php"><img src="images/user_default.png" style="height: 30px;width: 30px;" class="uimg" alt="img" srcset=""></a> -->
          <a class="user-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <img src="images/user_default.png" style="height: 30px;width: 30px;" class="uimg" alt="img" srcset="">
      </a>
        </span>
      <?php
      }
      ?>
    </div>
  </div>
</nav>