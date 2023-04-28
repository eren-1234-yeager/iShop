<!-- <?php
session_start();
?> -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php echo "Hello ".$_SESSION['username']?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="actions">
      <div>
        My Profile
      </div>
      <div>
        My Orders
      </div>
      <div>
        My Cart
      </div>
    </div>
  </div>
</div>