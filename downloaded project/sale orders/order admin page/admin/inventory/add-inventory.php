<?php
include_once("../dal/dal.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
  $quantity = $_POST['quantity'];
  
  // AddInventory($quantity);
  header('location:inventory-list.php');
}

include_once("../templates/admin/header.php");
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Add Inventory</h4>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-body">
          <form enctype="multipart/form-data" method="POST">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Quantity</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="quantity" id="basic-default-name" placeholder="Product quantity" />
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add Quantity</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->
<?php
include_once("../templates/admin/footer.php");
?>