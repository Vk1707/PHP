<?php
include_once("../templates/admin/header.php");
include_once("../dal/dal.php");

// $inventories = GetInventories();

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Product Inventory List</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Quantity</th>
                <th>Edit or Delete</th>                                
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php 
            foreach($inventories as $inventory){ 
                if(empty($inventory['deleted_at'])) { ?>
            <tr>
                <td><?= $inventory['id'] ?></td>
                <td>
                    <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong><?= $inventory['quantity']; ?></strong>
                </td>
                <td>
                    <div class="dropdown">
                        <a class="dropdown-item" href="update-inventory.php?id=<?= $inventory['id'] ?>"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                        <a class="dropdown-item" href="delete-inventory.php?id=<?= $inventory['id'] ?>"><i class="bx bx-trash me-2"></i> Delete</a>
                    </div>
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