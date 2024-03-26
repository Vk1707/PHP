<?php
include_once("../templates/admin/header.php");
include_once("../dal/dal.php");

$orders = GetOrders();

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Order List</h4>
    <table class="table">
        <thead>
            <tr>
                <th>S.NO.</th>
                <th>Phone Name</th>
                <th>Order Price</th>
                <th>Card Details</th>
                <th>Order Date</th>
                <th>Delivered Date</th>
                <th>Current Status</th>
                <th>Profit</th>
                <th>Selling Price</th>
                <th>App Name</th>
                <th>Edit or Delete</th>                                
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php 
            foreach($orders as $order){ 
                if(empty($order['deleted_at'])) { ?>
            <tr>
                <td><?= $order['s_no'] ?></td>
                <td>
                    <?= $order['phone_name']; ?>
                </td>
                <td>
                    <?= $order['order_price']; ?>
                </td>
                <td>
                    <?= $order['card_details']; ?>
                </td>
                <td>
                    <?= $order['order_date'] ?>
                </td>
                <td>
                    <?= $order['delivered_date']; ?>
                </td>
                <td>
                <?= $order['current_status']; ?>
                </td>
                <td>
                    <?= $order['profit'] ?>  
                </td>
                <td>
                    <?= $order['selling_price'] ?>  
                </td>
                <td>
                    <?= $order['app_name'] ?>  
                </td>
                <td>
                    <a class="dropdown-item admin-actions" href="update-order.php?s_no=<?= $order['s_no'] ?>"><i class="bx bx-edit-alt me-2"></i></a>
                    <a class="dropdown-item admin-actions" href="delete-order.php?id=<?= $order['s_no'] ?>"><i class="bx bx-trash me-2"></i></a>
                </td>
            </tr>
            <?php
                } 
            } 
            ?>
        </tbody>
    </table>
</div>

<?php
include_once("../templates/admin/footer.php");
?>