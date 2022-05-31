<?php
session_start();
include('connect.php');

$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$std=$_POST['std'];

$sql="Select * from `userdata` where username='$username' and mobile='$mobile' 
and password='$password' and standard='$std'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    $sql="Select username,photo,votes,id from `userdata` where standard='candidate'";
    $resultcandidate=mysqli_query($con,$sql);
    if(mysqli_num_rows($resultcandidate)>0){
        $candidates=mysqli_fetch_all($resultcandidate,MYSQLI_ASSOC);
        $_SESSION['candidates']=$candidates;
    }
    $datadata=mysqli_fetch_array($result);
    $_SESSION['id']=$data['id'];
    $_SESSION['status']=$data['status'];
    $_SESSION['data']=$data;

    echo '<script>
    window.location="../partials/dashboard.php";
    </script>';

}else{
    echo '<script>
    alert("Invalid credentials");
    window.location="../";
    </script>';
}
        
?>