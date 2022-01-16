<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection failed : ".mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$balance = $_POST['balance'];
$sql = "INSERT INTO `users`(`name`, `email`, `balance`) VALUES ('".$name."','".$email."','".$balance."')";
if(empty($name)){
    echo "<script>alert('Please enter a username.')</script>";
}elseif(!preg_match('/^[a-zA-Z0-9_]+$/', $name)){
    header("location: createuser.html");
}elseif(empty($email)){
    echo "<script>alert('Please enter a email.')</script>";
}elseif($balance <= 0 || preg_match('/^[a-zA-Z _]+$/', $balance)){
    echo "alert('balance field shouldn't contain negative numbers or letters')";
    header("location: createuser.html");
}elseif(mysqli_query($conn, $sql)){
    // echo "<script>alert('Hurray...!! data updated succeddfully')</script>";
    header("location: users.php");
}else{
    echo "Error creating table: ".mysqli_error($conn);
}

mysqli_close($conn);
?>