<?php

ob_start();
session_start();

if(!isset($_SESSION['id_user'])){
  die("<b>Oops!</b> Access Failed.
      <p>Sistem Logout. Anda harus melakukan Login kembali.</p>
      <button type='button' onclick=location.href='./'>Back</button>");
}


include "library/config.php";

?>

<html>
<body>
  <center>


    <h2>Welcome ...!</h2>
    <?php
        $tampilPeg    =mysqli_query($con, "SELECT * FROM pegawai WHERE id_pegawai='$_SESSION[id_pegawai]'");
        $peg    =mysqli_fetch_array($tampilPeg);
    ?>

    

  <div class="card" style="width: 18rem;">
  <img src="gambar/<?=$peg['foto']?>" class="card-img-top" width="300" height="320"/>
  <div class="card-body">
    <h1 class="card-title">Your Account</h1>
    <table border="2" cellpadding="4">
        <tr>
            <td width="90">NIP</td>
            <td width="300">: <?=$peg['id_pegawai']?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?=$peg['nama_pegawai']?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>: <?=$peg['tgl_lahir']?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?=$peg['jenis_kelamin']?></td>
        </tr>
    </table>
    <a href="logout.php">Logout</a></td>


  </div>
</div>
</body>
</html>