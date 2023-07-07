<?php 
error_reporting(0);
  $firstname = $_POST[ 'firstname' ];
  $lastname = $_POST[ 'lastname' ];
  $idnumber = $_POST[ 'idnumber' ];
  $email = $_POST[ 'email' ];
  $password = $_POST[ 'password' ];
  $confirmpassword = $_POST[ 'confirmpassword' ];

//database connection
$serever_name = "127.0.0.1";
$user_name = "root";
$password = "";
$database_name = "fitness_online";
$conn = mysqli_connect($serever_name, $user_name, $password, $database_name);

        $sql = "insert into registration(firstname, lastname, idnumber, email, password, confirmpassword) values ('$firstname', '$lastname', '$idnumber', '$email', '$password', '$confirmpassword');";
        echo "registration Succesfully....";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    



?>
