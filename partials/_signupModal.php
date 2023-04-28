<?php

if (!defined('const')) {
  header("Location: /ishop");
}
?>
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Signup to iShop</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="partials/_signup.php">

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
          </div>
          <h6>Tell Me about Your Interest:(optional)</h6>
          <div class="interest my-2" id="interest">
          <?php
            $interest=['Books','Electronics','Clothes','Decors'];
            foreach($interest as $value){
              echo'
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" name="interest[]" value="'.$value.'"  id="'.$value.'">
              <label class="form-check-label" for="'.$value.'">'.$value.'</label>
            </div>';
            }
            ?>
        </div>
            
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>