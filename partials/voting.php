<?php
session_start();
include('connect.php');

$votes=$_POST['candidatevotes'];
$totalvotes=$votes+1;

$cid=$_POST['candidateid'];
$uid=$_SESSION['id'];

$updatevotes=mysqli_query($con, "update `userdata` set votes='$totalvotes' 
where id='$cid'");

$updatevotes=mysqli_query($con, "update `userdata` set status=1 where id='$uid'");

if($updatevotes and $updatestatus){
    $getcandidates=mysqli_query($con, "Select username,photo,votes,id 
    from `userdata` where standard='candidate'");
    $candidates=mysqli_fetch_all($getcandidates,MYSQLI_ASSOC);
    $_SESSION['candidates']=$candidates;
    $_SESSION['status']=1;
    echo '<script>
    alert("Voting successful");
    window.location="../partials/dashboard.php";
    
    </script>';
}else{
    echo '<script>
    alert("Technical error ! Please vote after sometime");
    window.location="../partials/dashboard.php";
    
    </script>';
}

?>