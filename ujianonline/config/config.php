<?php
$conn=mysqli_connect("localhost", "root", "","exam_system");

if(mysqli_connect_errno()){
    echo "gagal menyambungkan ke database". mysqli_connect_errno();
    exit();
}
?>