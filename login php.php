<?php
include 'db.php'; // connect to MySQL

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM Users WHERE username='$username'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $user = $result->fetch_assoc();
    if(password_verify($password, $user['password'])){
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php"); // logged-in page
        exit();
    } else {
        echo "Wrong password!";
    }
} else {
    echo "User not found!";
}
?>
