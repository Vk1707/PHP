<?php
session_start();
include('config.php');
?>
<?php
if(isset($_POST['login']))
{

	$logemail = $_POST['logemail'];
	$logpass = $_POST['logpass'];
	

	$sql = "SELECT * FROM `sc_users` WHERE sc_email='$logemail' AND sc_pass='$logpass' AND sc_status='1'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
$welpost = @$row['sc_post'];
	$_SESSION['ademail'] = @$row['sc_email'];
	$_SESSION['adname'] = @$row['sc_name'];
	$_SESSION['adid'] = @$row['sc_emapid'];
	$_SESSION['adepart'] = @$row['sc_process'];
	$_SESSION['adpost'] = @$row['sc_post'];

	$build = @$row['sc_building'];
	$d1= @$row['sc_uploadon'] ;
   $d2=date_create("$d1");
   date_format($d2,'Y-m-d');
   $d3= date('Y-m-d');
   $d4= date_create($d3);
   date_format($d4, 'Y-m-d');
   $d5=date_diff($d2,$d4);
   $d6=$d5->format('%R%a');
   if($d6>30)
   {
   	 
   	 echo "<script>
     window.location.href = 'password-expired.php?em=$logemail';
      alert('Your Password has been Expired!');</script>";
   

   }
	else  if($row == true)
	{
		switch($welpost)
		{
			case"User":
			if($_SESSION['ademail']=='isms.backend@silaris.in')
			{
				header ('Location:./isms_backend/dashboard.php');
			}
			else if($_SESSION['ademail']=='rajat.chopra@silaris.in')
			{
				header ('Location:IT-AM/dashboard.php');
			}
			else if($_SESSION['ademail']=='ekta.it@silaris.in')
			{
				header ('Location:IT-backend/dashboard.php');
			}
				else if($_SESSION['ademail']=='tariq.zubair@silaris.in')
			{
				header ('Location:finance/dashboard.php');
			}
			else
			{
			header('Location:user/dashboard.php');
		  }
			break;
			case"HR":
			header('Location:hr/dashboard.php');
        	break;
			case"HRB":
			header('Location:hrb/dashboard.php');
			break;
			case"VP":
			if($_SESSION['ademail']=='samarth.jain@silaris.in')
			{ header('Location:itvp/dashboard.php');
	    }
		  else
			{ header('Location:vp/dashboard.php');
	    }
			break;
			case"ISMS":
			header('Location:itisms/dashboard.php');
			break;
			case"Network":
			header('Location:itnetwork/dashboard.php');
			break;
			case"CEO":
			header('Location:ceo/dashboard.php');
			break;
			case"CIO":
			header('Location:cio/dashboard.php');
			break;
        	case"AVP_Master":
			header('Location:avpmaster/dashboard.php');
			break;
			case"AVP":
			if($_SESSION['ademail']=='sunita.yadav@silaris.in')
			{ 
            header('Location:hravp/dashboard.php');
	    	}
		  	else
		  	{
			header('Location:avp/dashboard.php');
		  	}
			break;
        	case"SRMGR":
			header('Location:srmgr/dashboard.php');
			break;
			case"Email":
			header('Location:itemail/dashboard.php');
			break;
        	case"Guard":
        	switch($build)
            {
            	case"14A":
            	header('Location:guard/s14-1.php');
            	break;
            	case"14B":
            	header('Location:guard/s14-2.php');
            	break;
            	case"14C":
            	header('Location:guard/s14-3.php');
            	break;
            	case"A6":
            	header('Location:guard/a-6.php');
            	break;
            	case"A7":
            	header('Location:guard/a-1.php');
            	break;
            	case"A1":
            	header('Location:guard/a-1.php');
            	break;
            }
			
			break;
		}
	}
	else
	{
		echo "<script>alert('Something Went Wrong! Contact IT Team!')</script>";
	}

	}
?>