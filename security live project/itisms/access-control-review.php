<?php
include( 'header.php' );
include( '../config.php' );
include_once( '../emailconfig.php' );
include_once( '../PHPExcel/IOFactory.php' );
include( '../PHPExcel.php' );

if ( isset( $_POST[ 'emailacess' ] ) ) {
    $fileName = $_FILES[ 'fileToUpload' ][ 'name' ];
    $fileTemp = $_FILES[ 'fileToUpload' ][ 'tmp_name' ];

    $objExcel = PHPExcel_IOFactory::load( $fileTemp );
    foreach ( $objExcel->getWorksheetIterator() as $worksheet ) {
        $highestrow = $worksheet->getHighestRow();

        for ( $row = 0; $row <= $highestrow; $row++ ) {
            $employee_id = $worksheet->getCellByColumnAndRow( 1, $row )->getValue();
            $employee_name = $worksheet->getCellByColumnAndRow( 2, $row )->getValue();

            $sql1 = 'select * from access_review_ex1';
            $res1 = mysqli_query( $conn, $sql1 );
            $count = mysqli_num_rows( $res1 );

            if ( $count == 0 ) {
                $id = 1;
            } else {
                $id = $count + 1;
            }

            $sqll = "INSERT INTO access_review_ex1(id, employee_id, employee_name) VALUES ( '$id' , '$employee_id' , '$employee_name')";
            $ress = mysqli_query( $conn , $sqll );
        }
    }
    if ( $ress == true ) {
        echo "<script> alert('Data Uploaded Successfully!')</script>";
    } else {
        echo "<script> alert('PRI Number already Exist!')</script>";
    }
}
?>

<div class = 'main-dash'>
<div class = 'top-dash'>
<nav class = 'navbar navbar-expand-md bgdark navbar-dark'>
<!-- Brand -->
<a class = 'navbar-brand' href = '#'>VERSION : 1.0.1</a>

<!-- Toggler/collapsibe Button -->
<button class = 'navbar-toggler' type = 'button' data-toggle = 'collapse' data-target = '#collapsibleNavbar'>
<span class = 'navbar-toggler-icon'></span>
</button>

<!-- Navbar links -->
<div class = 'collapse navbar-collapse' id = 'collapsibleNavbar'>
<ul class = 'navbar-nav ml-auto'>
<!-- <li class = 'nav-item'>
<a class = 'nav-link' href = '#'>Home</a>
</li> -->
<li class = 'nav-item'>
<a class = 'nav-link' href = 'isms-policies.php'>ISMS Policies</a>
</li>
<li class = 'nav-item dropdown'>
<a class = 'nav-link dropdown-toggle' href = '#' data-toggle = 'dropdown' id = 'navbardrop'><i class = 'fa fa-user-circle'></i> <?php echo $adname ?></a>
<div class = 'dropdown-menu'>
<a class = 'dropdown-item' href = 'profile.php'> <i class = 'fa fa-user'></i> Profile</a>
<a class = 'dropdown-item' href = 'password.php'><i class = 'fa fa-lock'></i> Password</a>
<a class = 'dropdown-item' href = '../logout.php'><i class = 'fa fa-power-off'></i> Logout</a>
</div>
</li>
</ul>
</div>

</nav>
</div>
<div class = 'side-dash'>
<?php include( 'sidebar.php' );
?>
</div>
<div class = 'body-dash'>
<div class = 'row mb-4'>
<div class = 'col-lg-10 col-md-10 float-right'>
<form class = 'form-inline' method = 'GET' action = ''>
<select name = 'month' class = 'form-control mr-3' required>
<option disabled = '' selected = ''>Select Month</option>
<option value = 'March'>March</option>
<option value = 'June'>June</option>
<option value = 'September'>September</option>
<option value = 'December'>December</option>
</select>
<select name = 'year' class = 'form-control mr-3' required>
<option disabled = '' selected = ''>Select Year</option>
<option value = '2022'>2022</option>
<option value = '2023'>2023</option>
<option value = '2024'>2024</option>
<option value = '2025'>2025</option>
</select>
<select name = 'pro' class = 'form-control mr-3' required>
<option disabled = '' selected = ''>Select Process</option>
<option value = 'SBI'>SBI</option>
<option value = 'CPP'>CPP</option>
<option value = 'Max'>Max</option>
<option value = 'HDFC-ERGO'>HDFC ERGO</option>
<option value = 'Voltas'>Voltas</option>
<option value = 'IHO'>IHO</option>
<option value = 'Skyworth'>Skyworth</option>
<option value = 'HSBC'>HSBC</option>
<option value = 'RSA'>RSA</option>
<option value = 'TATA-AIA'>TATA-AIA</option>
<option value = 'Amex'>Amex</option>
</select>
<select name = 'subpro' class = 'form-control' required>
<option disabled = '' selected = ''>Select Sub Process</option>
<option value = 'Upgrade'>Upgrade</option>
<option value = 'Encash'>Encash</option>
<option value = 'Flexi'>Flexi</option>
<option value = 'CPP-TM'>CPP TM</option>
<option value = 'Clip'>Clip</option>
<option value = 'Quality'>Quality</option>
<option value = 'Multicard'>Multicard</option>
<option value = 'POS'>POS</option>
<option value = 'OTP'>OTP</option>
<option value = 'Inbound'>Inbound</option>
<option value = 'Welcome'>Welcome</option>
<option value = 'Service'>Service</option>
<option value = 'ISA'>ISA</option>
<option value = 'Axis'>Axis</option>
<option value = 'Money-Club'>Money Club</option>
<option value = 'Retails'>Retails</option>
<option value = 'Renewal'>Renewal</option>
<option value = 'Motors'>Motors</option>
<option value = 'NA'>NA</option>
<option value = 'NA'>NA</option>
<option value = 'NA'>NA</option>
<option value = 'MSO'>MSO</option>
<option value = 'Addon'>Addon</option>
<option value = 'Canara'>Canara</option>
<option value = 'NA'>NA</option>
<option value = 'Term'>Term</option>
<option value = 'Non Term'>Non Term</option>
<option value = 'ECM'>ECM</option>
<option value = 'Welcome'>Welcome</option>
<option value = 'EDM'>EDM</option>
</select>
<input type = 'submit' value = 'Find' class = 'ml-3 btn btn-dark'>
</form>
</div>
<div class = 'col-lg-2 col-md-2 '>
<button class = 'btndanger float-left' id = 'addform'> <i class = 'fa fa-user-plus'> </i> Add Access Control Data</button>
</div>
</div>
<div class = 'table-wrapper-scroll-y my-custom-scrollbar table-responsive'>
<table class = 'table table-bordered table-striped table-hover'>
<thead class = 'bgsky sticky-top'>
<td>S.No</td>
<td>Employee Id</td>
<td>Employee name</td>
<td>Process / Dept</td>
<td>Sub process</td>
<td>Designation</td>
<td>Windows 10 Activate / Ubuntu</td>
<td>Domain Name</td>
<td>C Drive Access</td>
<td>Any Share Drive Access</td>
<td>Local Drive D/E</td>
<td>Bitlocker Activate</td>
<td>Name</td>
<td>Install & Updated</td>
<td>ACL Activate</td>
<td>NTP</td>
<td>CRM Access</td>
<td>CRM Link</td>
<td>Any Client Based CRM</td>
<td>Number Masking</td>
<td>MS Office Install</td>
<td>MS Office version</td>
<td>MS Office Activate</td>
<td>Email ID</td>
<td>Send / Receive Access Detail ( Internal )</td>
<td>Send / Receive Access Detail ( External )</td>
<td>Any Third Party Software </td>
<td>Screenshot Disable</td>
<td>Short Cut Key</td>
<td>Internet Access</td>
<td>Administrator App</td>
<td>Control Panel</td>
<td>Command Prompt</td>
<td>Power Shell</td>
<td>Local Drive D/E</td>
<td>DLP</td>
<td>Action</td>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
</div>
<div class = 'internal-form' id = 'internal'>
<div class = 'infernal-disp'>
<form class = '' method = 'POST' action = '' enctype = 'multipart/form-data'>

<div class = 'form-group row'>
<div class = 'col-lg-4 col-md-4'>
<label>Select Quarterly Month</label>
<select class = 'form-control' name = 'empidn'>
<option value = '' disabled = '' selected = ''>Select Month</option>

</select>
</div>
<div class = 'col-lg-4 col-md-4'>
<label>Select Process</label>
<select class = 'form-control' name = 'empidn'>
<option value = '' disabled = '' selected = ''>Select Process</option>

</select>
</div>
<div class = 'col-lg-4 col-md-4'>
<label>Select Sub Process</label>
<select class = 'form-control' name = 'empidn'>
<option value = '' disabled = '' selected = ''>Select Sub Process</option>

</select>
</div>
</div>
<div class = 'form-group row'>
<div class = 'col-lg-12 col-md-12'>
<input type = 'file' name = 'fileToUpload' id = 'fileToUpload'>
</select>
</div>
</div>
<div class = 'form-group'>
<input type = 'submit' name = 'emailacess' class = 'btn btn-dark' value = 'Submit'>
<button id = 'closeform' class = 'btn btn-danger ml-2'>Close</button>
</div>
</form>
</div>
</div>

<?php
include( 'footer.php' );
?>