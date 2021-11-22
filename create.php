<?php
//C-Create

require_once 'database.php';

if (mysqli_connect_errno()) {
    die("Error connect to database!");
}

$departament = $_POST ['departament'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$patron= $_POST['patron'];
$birth = $_POST['birth'];
$all_work = $_POST['all_work'];
$teach_work= $_POST['teach_work'];
$education = $_POST['education'];
$ped_edu = $_POST['ped_edu'];

$sql = "INSERT INTO employee (`departament`, `lastname`, `firstname`, `patron`, `birth`, `all_work`, `teach_work`, `education`, `ped_edu` )VALUES('$departament','$lastname','$firstname','$patron','$birth ', '$all_work', '$teach_work','$education',$ped_edu')";

if($connect->query($sql)) {            //Fatal error: Uncaught Error: Call to a member function query() on null in C:\OpenServer\domains\prog\create.php:22 Stack trace: #0 {main} thrown in C:\OpenServer\domains\prog\create.php on line 22
    echo "Данные добавлены";
}
else {
    echo "Ошибка";

}
$connect -> close();

header('Location: /');

?>
