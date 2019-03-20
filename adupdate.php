
<html>
<head>
<style type="text/css">
	#contenar{
		height: 100%;
		width: 100%;
		
	}
	

	</style>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
     
</head>

<body>
<?php
include('connectdb.php');
session_start();
if(isset($_POST['sub']))
{
$username=$_POST['username'];
$roomtype=$_POST['field_1'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$room_nos=$_POST['room_nos'];
$amount=$_POST['roomprice'];

$checkroom= "SELECT count(*) from roomdetail where room_type='$roomtype' ";
$check=mysqli_query($con,$checkroom) or die (mysqli_error($con));
$roomcount=mysqli_fetch_array($check);
$checkcount=$roomcount[0];
if($checkcount>=10)
{
?> <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
<?php }
else{
$s1="UPDATE roomdetail set username='$username',checkin_date='$startdate',checkout_date='$enddate',room_type='$roomtype',no_of_room='$room_nos',amount='$amount' where id='$id'";
mysqli_query($con,$s1) or die (mysqli_error($con));
header('location:adminlogin.php');
}
}
?>

<div id="contenar">
<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$getdata= "select * from roomdetail where id='$id' ";
$check1=mysqli_query($con,$getdata) or die (mysqli_error($con));
$room=mysqli_fetch_array($check1);
}
?>
	<div id="r">
	<form action="adupdate.php" method="POST">
	<h2 align="center" id="h"><u><i>Book Room</i></u></h2>
	<h3> Welcome <?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } if(isset($_GET['id'])){ echo $room['username']; }  ?> !!!</h3>
        <table >
		
          <tr>
            <td width="113">Check in Date</td>
            <td width="215">
			<?php if(isset($_GET['id'])){ ?>
			 <input name="id" type="hidden" min="<?php echo date('Y-m-d')?>" value="<?php if(isset($_GET['id'])){ echo $_GET['id']; }  ?>" /> <?php } ?>
              <input name="startdate1" type="date" min="<?php echo date('Y-m-d')?>" value="<?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; } if(isset($_GET['id'])){ echo $room['checkin_date']; }  ?>" /></td>
          </tr>
          <tr>
            <td>Check out Date</td>
            <td>
			<?php if(isset($_GET['id'])){ ?>
			 <input name="id" type="hidden"  value="<?php if(isset($_GET['id'])){ echo $_GET['id']; }  ?>" /> <?php } ?>
              <input name="enddate1" type="date" value="<?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }if(isset($_GET['id'])){ echo $room['checkout_date']; }  ?> "  /></td>
          </tr>
			
       </table>
		</form>
		<form action="adupdate.php" method="POST">
        <table >
		
          <tr>
            <td width="113"></td>
            <td width="215">
              <input name="startdate" type="hidden" value=" <?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1'];  } if(isset($_GET['id'])){ echo $room['checkin_date']; }?> " /></td>
          </tr>
          <tr>
            <td></td>
            <td><input name="username" type="hidden" value="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } if(isset($_GET['id'])){ echo $room['username']; }  ?>"  />
              <input name="enddate" type="hidden" value=" <?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; } if(isset($_GET['id'])){ echo $room['checkout_date']; }?> "  /></td>
          </tr>
		  <tr>
            <td>Room Type </td>
            <td>
              <select class="text_select" id="field_1" name="field_1" >  
				<option value="00">- Select -</option>
				<option value="2500">Single Room</option>
                <option value="3500">Double Room</option>
                <option value="4500">Deluxe Room</option>
                <option value="5000">Deluxe Supreme Room</option>
                <option value="10000">Penthouse Suite</option>  
<?php if(isset($_POST['startdate1'])){
$paymentDate = $_POST['startdate1'];
$contractDateBegin = '2018-12-20';
$contractDateEnd ='2019-03-25';

if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd))
{
 $s2="select * from roomtype where room_seson ='high season' ";
$s3=mysqli_query($con,$s2);
}
else
{
$s2="select * from roomtype where room_seson='low season' ";
$s3=mysqli_query($con,$s2);
}


?>
<?php while($catdata=mysqli_fetch_array($s3)) { ?>  <option value="<?php echo $catdata['room_price']; ?>"><?php echo $catdata['room_type']; ?></option>
           <?php } ?>
		   <?php } ?>
           </select></td>
          </tr>
		  <tr>
            <td>Price per Room</td>
            <td>
             Rs.<span id="a1"  ></span>
           </td>
          </tr>
		   <tr>
            <td>No. of Guest per Room</td>
            <td>
              <input name="guest" type="text " size="10"/></td>
          </tr>
		  <tr>
            <td>No. of Rooms </td>
            <td>
              <input name="room_nos" id="room_nos" type="text " size="10" onChange="gettotal1()" /></td>
          </tr>
		  <tr>
            <td>Total Amount To Pay</td>
            <td>
             <input type="text" name="roomprice" id="total1"  size="10px" readonly="" />
           </td>
          </tr>
		  
          <tr>
            <td colspan="2" align="center">
			<input type="submit" name="sub" value="Pay & Book" /></td>
            </tr>
			
       </table>
		</form>
		
		<script language="javascript" type="text/javascript">

		
function notEmpty(){

var e = document.getElementById("field_1");
var strUser = e.options[e.selectedIndex].value;
var strUser=document.getElementById('a1').innerHTML=strUser;


}
notEmpty()
    
    document.getElementById("field_1").onchange = notEmpty;


   function gettotal1(){
      var gender1=document.getElementById('a1').innerHTML;
      var gender2=document.getElementById('room_nos').value;
      
	  
	  var gender3=parseFloat(gender1)* parseFloat(gender2);
			
      document.getElementById('total1').value=gender3;
	
   }
	</script>
 
		
	</div>
</div>
</body>
</html>