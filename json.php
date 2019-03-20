<html>
   <body>
       <h3>JSON TEST</h3>
   </body>
</html>
<script src="js/validation.js" ></script>
<?php
$conn = mysqli_connect("localhost","root","","pnc");
if(!$conn){  
echo "<script type='text/javascript'>alert('Database failed');</script>";
 	die('Could not connect: '.mysqli_connect_error());  
}

$query = "SELECT * FROM guest";
$res = mysqli_query($conn, $query);	
if($res)
{  
$message = "You have been successfully registered";
}
else
{  
$message = "Could not insert record"; 
}

$data_array = array(); 
while($rows =mysqli_fetch_assoc($res)) {
   $data_array[] = $rows; 
   
}

$fp = fopen('guest.json', 'w'); //fwrite($fp, json_encode($data_array));
if(!fwrite($fp, json_encode($data_array))) 
{ die('Error : File Not Opened. ' . mysqil_error()); } 
else{ echo "Data Retrieved Successully!!!"; } 
fclose($fp);

?>