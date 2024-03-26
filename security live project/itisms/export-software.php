<?php
session_start();
include('../config.php');


header('Content-type:application/vnd-ms-excel');
$filename = date('d-m-Y') . "-Master_Data-Issue-Headset.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");

?>

<table border="1">
    <tr>
        <th>Sr. No.</th>
        <th>Software Name</th>
        <th>Version</th>
        <th>Licence</th>
        <th>Deploy</th>
        <th>Balance</th>
        <th>Audit Done By</th>
        <th>Auditor</th>
        <th>Auditor Remark</th>
        <th>Review</th>


    </tr>
    <?php

    $sql = "SELECT * FROM `sc_inventory`";
    $res = mysqli_query($conn, $sql);
    while ($mrow = mysqli_fetch_array($res)) {
    ?>
        <tr>
            <td><?php echo $mrow['id']; ?></td>
            <td><?php echo $mrow['inventory']; ?></td>
            <td><?php echo $mrow['version']; ?></td>
            <td><?php echo $mrow['licence']; ?></td>
            <td><?php echo $mrow['deploy']; ?></td>
            <td><?php echo $mrow['balance']; ?></td>
            <td><?php echo $mrow['checker']; ?></td>
            <td><?php echo $mrow['auditor']; ?></td>
            <td><?php echo $mrow['auditor_remark']; ?></td>
            <td><?php echo $mrow['review']; ?></td>



        </tr>
    <?php

    }

    ?>
</table>