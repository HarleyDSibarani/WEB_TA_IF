<?php
//insert.php
if(isset($_POST["Nama"]))
{
 include("connect.php");
 $Nama = mysqli_real_escape_string($connect, $_POST["Nama"]);
 $Nim = mysqli_real_escape_string($connect, $_POST["Nim"]);
 $judul = mysqli_real_escape_string($connect, $_POST["judul"]);
 $dos1 = mysqli_real_escape_string($connect, $_POST["dos1"]);
 $dos2 = mysqli_real_escape_string($connect, $_POST["dos2"]);

 $query = "
 INSERT INTO comments(nama, nim, Judul, Dosen_pembimbing_1, Dosen_pembimbing_2)
 VALUES ('$Nama', '$Nim', '$judul', '$dos1', '$dos2')
 ";
 mysqli_query($connect, $query);
}
?>