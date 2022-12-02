<?php
   session_start();
   include "library/config.php";

   
   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $id_user = $_POST['id_user'];
   $id_pegawai = $_POST['id_pegawai'];
   

   $query = mysqli_query($con, "SELECT * FROM user INNER JOIN pegawai
   ON user.id_pegawai = pegawai.id_pegawai WHERE username='$username' AND password='$password'");
   $data = mysqli_fetch_array($query);
   $jml = mysqli_num_rows($query);
   var_dump($data);
   if($data['Role'] == "admin"){
      $_SESSION['username'] = $data['username'];
      $_SESSION['password'] = $data['password'];
      $_SESSION['id_user'] = $data['id_user'];
      $_SESSION['id_pegawai'] = $data['id_pegawai'];
      
      header('location: index.php');
   }else if($data ['Role'] == "user"){
      $_SESSION['username'] = $data['username'];
      $_SESSION['password'] = $data['password'];
      $_SESSION['id_user'] = $data['id_user'];
      $_SESSION['id_pegawai'] = $data['id_pegawai'];
      
      header('location: user.php');
      
   }else{
      echo "Login Gagal";
   }
?>