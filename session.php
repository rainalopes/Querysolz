<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select email_id from login where email_id= '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email_id'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.html");
   }
?>