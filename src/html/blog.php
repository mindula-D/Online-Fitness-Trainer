
<?php
$comment = $_POST["message"];
$member_id = $_POST["id"];
$article_id = $_POST["aid"];
$rate = $_POST["rate111"];
if (strlen($member_id)==10) {
    if (strlen($member_id)==10) {
        $server_name = "127.0.0.1";
        $user = "root";
        $pw = "";
        $db = "fitness_online";
        $con = mysqli_connect($server_name,$user,$pw,$db);
        $sql = "Insert Into blog_review(comment,member_id,article_id,rating) values('$comment','$member_id','$article_id','$rate');";
        mysqli_query($con,$sql);
        mysqli_close($con);
    }
}
header("Location:blog review.html");
?>
