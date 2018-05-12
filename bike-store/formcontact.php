<?php
//terima data input dari user
$nama = @$_POST['nama'];
$namabl = @$_POST['namabl'];
$email = @$_POST['email'];
$pesan = @$_POST['pesan'];


 
//konfigurasi kiriman
$to="putri.yula@gmail.com";
$subjek="Kontak dari Form";
$from="From: $nama &lt;$email&gt;";
 
//kirimkan ke email admin
//@ mail($to, $subjek, $pesan, $from);
if($to == '' || $subjek == '' || $pesan == '' || $from == '' ){
?> <script type="text/javascript">alert("Pesan Berhasil Dikirim");</script> <?php
}

?>