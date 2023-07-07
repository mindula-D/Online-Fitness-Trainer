<?php
    //Getting inputs from html form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    //Database Connection
    $serever_name = "localhost";
    $user_name = "root";
    $password = "";
    $database_name = "fitness_online";
    $conn = mysqli_connect($serever_name, $user_name, $password, $database_name);
    //Check the connection
    if($conn -> connect_error){
        die("Connection Failed : " .$conn -> connect_error);
    }
    //Insert data into the table
    else{
        $sql = "insert into comments(name, email, comment) values ('$name', '$email', '$comment');";
            if($conn -> query($sql) == TRUE){
                echo "Submission Successfull!"."<br>";
            }
            else{
                echo "Submission Unsuccessfull!"."<br>";
            }
    }
    //Select the columns
    $sql = "SELECT name,email,comment FROM comments";
    $result = $conn -> query($sql);
    //Display data
    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            echo "<br>Name : ".$row["name"]."<br>"." Email : ".$row["email"]."<br>"." Comment : ".$row["comment"]."<br><br>";        
        }
    }
    //Close the connection
    $conn->close();
?>