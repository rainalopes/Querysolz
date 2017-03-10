<?php

include('config.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_REQUEST['submit'])!='')
{
$dupemail=mysqli_query($conn,"select email_id from login where email_id='".$_REQUEST['email']."';");
$count=mysqli_num_rows($dupemail);

$sql="insert into login  values( '".$_REQUEST['email']."', '".$_REQUEST['passwd']."','student','images/default.png');";
$sql .="insert into student values('".$_REQUEST['email']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['dob']."','".$_REQUEST['college']."');";
/*if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} 
else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/
if($count==0 )
{
$res=mysqli_multi_query($conn,$sql);

header("location:Thankyou.php");
}
 else if($count>=1)
{
Echo("Email id already in use");
}

else
Echo("Unable to create your account....sorry for the inconvinience,If the problem persists contact us");
}

mysqli_close($conn);
       ?>