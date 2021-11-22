<?php 
$par1_ip = "31.31.196.33";
$par2_name = "u3581963_user";
$par3_p = "XbbVc135T";
$par4_db = "u3581963_lap135database";

$induction = mysqli_connect($par1_ip, $par2_name, $par3_p, $par4_db);

if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset($induction, "utf8");

 ?>
