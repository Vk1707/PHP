<?php
include_once("../dal/dal.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
  $Sno = $_POST['s_no'];
  $phone_name = $_POST['phone_name'];
  $order_price = $_POST['order_price'];
  $card_details = $_POST['card_details'];
  $order_date = date('Y-m-d' , strtotime($_POST['order_date']));
  $delivered_date = date('Y-m-d' , strtotime($_POST['delivered_date']));
  $current_status = $_POST['current_status'];
  $profit = $_POST['profit'];
  $selling_price = $_POST['selling_price'];
  $app_name = $_POST['app_name'];

  UpdateOrder($Sno, $phone_name, $order_price, $card_details, $order_date, $delivered_date, $current_status, $profit, $selling_price, $app_name);
  header('location:orders-list.php');
}
else{
    $Sno = $_GET['s_no'];
    $order = GetOrder($Sno);
}


include_once("../templates/admin/header.php");
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Update Order</h4>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-body">
          <form enctype="multipart/form-data" method="POST">
            <input type="hidden" name="s_no" value="<?= $order['s_no'] ?>">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Phone Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="phone_name" value="<?= $order['phone_name'];?>" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Order Price</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="order_price" value="<?= $order['order_price'];?>" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-message">Card Details</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="card_details" value="<?= $order['card_details'];?>" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Order Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="order_date" value="<?= $order['order_date'];?>" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Delivered Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="delivered_date" value="<?= $order['delivered_date'];?>" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-message">Current Status</label>
              <div class="col-sm-10">
              <input class="form-check-input" type="radio" name="current_status" value="Poccessing" <?= $order['current_status']=='Processing'?'checked':'' ?> /> <label class="form-check-label" for="inlineRadio1">Processing</label>
              <input class="form-check-input" type="radio" name="current_status" value="Shipped" <?= $order['current_status']=='Shipped'?'checked':'' ?> /> <label class="form-check-label" for="inlineRadio2">Shipped</label>
              <input class="form-check-input" type="radio" name="current_status" value="Delivered" <?= $order['current_status']=='Delivered'?'checked':'' ?> /> <label class="form-check-label" for="inlineRadio2">Delivered</label>
            </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Profit</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="profit" value="<?= $order['profit'];?>" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Selling Price</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="selling_price" value="<?= $order['selling_price'];?>" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-message">App Name</label>
              <div class="col-sm-10">
              <input class="form-check-input" type="radio" name="app_name" value="Flipkart" <?= $order['app_name']=='Flipkart'?'checked':'' ?> /> <label class="form-check-label" for="inlineRadio1">Flipkart</label>
              <input class="form-check-input" type="radio" name="app_name" value="Amazon" <?= $order['app_name']=='Amazon'?'checked':'' ?> /> <label class="form-check-label" for="inlineRadio2">Amazon</label>
              &nbsp; Or
              <label class="form-check-label" for="inlineRadio2">Enter App name</label>
              <input type="text" class="form-control" name="app_name" value="<?= $order['app_name'];?>" /> 
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update Order</button>
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