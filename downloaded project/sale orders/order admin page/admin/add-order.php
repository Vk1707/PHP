<?php
include_once("../dal/dal.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
  $phone_name = $_POST['phone_name'];
  $order_price = $_POST['order_price'];
  $card_details = $_POST['card_details'];
  $order_date = date('Y-m-d' , strtotime($_POST['order_date']));
  $delivered_date = date('Y-m-d' , strtotime($_POST['delivered_date']));
  $current_status = $_POST['current_status'];
  $profit = $_POST['profit'];
  $selling_price = $_POST['selling_price'];
  $app_name = $_POST['app_name'];

  AddOrder($phone_name, $order_price, $card_details, $order_date, $delivered_date, $current_status, $profit, $selling_price, $app_name);
  header('location:orders-list.php');
}


include_once("../templates/admin/header.php");
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Add Order</h4>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-body">
          <form enctype="multipart/form-data" method="POST">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Phone Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="phone_name"  placeholder="Phone Name" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Order Price</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="order_price" placeholder="Order Price" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-message">Card Details</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="card_details"  placeholder="Card Details" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Order Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="order_date" placeholder="Order Date" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Delivered Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="delivered_date" placeholder="delivered Date" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-message">Current Status</label>
              <div class="col-sm-10">
              <input class="form-check-input" type="radio" name="current_status" value="Poccessing"/> <label class="form-check-label" for="inlineRadio1">Processing</label>
              <input class="form-check-input" type="radio" name="current_status" value="Shipped"/> <label class="form-check-label" for="inlineRadio2">Shipped</label>
              <input class="form-check-input" type="radio" name="current_status" value="Delivered"/> <label class="form-check-label" for="inlineRadio2">Delivered</label>
            </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Profit</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="profit" placeholder="Profit" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Selling Price</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="selling_price" placeholder="Selling Price" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-message">App Name</label>
              <div class="col-sm-10">
              <input class="form-check-input" type="radio" name="app_name" value="Flipkart"/> <label class="form-check-label" for="inlineRadio1">Flipkart</label>
              <input class="form-check-input" type="radio" name="app_name" value="Amazon"/> <label class="form-check-label" for="inlineRadio2">Amazon</label>
              &nbsp; Or
              <label class="form-check-label" for="inlineRadio2">Enter App name</label>
              <input type="text" class="form-control" name="app_name"  placeholder="App Name" /> 
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add Order</button>
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