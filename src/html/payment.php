<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$cnum = $_POST["cnum"];
$idnum = $_POST["idnum"];
$cvv = $_POST["cvv"];
$date = $_POST["date"];
$package = $_POST["basic"];
$term = $_POST["one"];
switch ($package) {
    case "Basic":
        $packageValue = 25;
        break;
    case "Premium":
        $packageValue = 45;
        break;
    case "Optimum":
        $packageValue = 50;
        break;
    default:
        break;
}
switch ($term) {
    case "1 Month":
        $total = $packageValue;
        break;
    case "6 Month":
        $total = $packageValue*6;
        break;
    case "1 Year":
        $total = $packageValue*12;
        break;
    default:
        break;
}
$server_name = "127.0.0.1";
$user = "root";
$pw = "";
$db = "fitness_online";
$con = mysqli_connect($server_name,$user,$pw,$db);
$sql = "Insert Into payment(first_name,second_name,id_number,card_number,cvv,exp_month,package,term,total) values('$fname','$lname','$cnum','$idnum','$cvv','$date','$package','$term','$total');";
mysqli_query($con,$sql);
mysqli_close($con);
header("Location:payment.html");
?>