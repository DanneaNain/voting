<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../');
}
$data=$SESSION['data'];
if($_SESSION['status']==1){
    $status='<b class="text-success">Voted</b>';
}else{
    $status='<b class="text-danger">Not Voted</b>';
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Online Voting System</title>
    
     <!-- Bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    
</head>
<body class="bg-secondary text-light>
    <div class="container my-5">
<a href="../"><button class="btn btn-dark, text-light px-3">Back</button></a>
<a href="logout.php"><button class="btn btn-dark, text-light px-3">Logout</button></a>
<h1 class="my-3">Online Voting System</h1>
<div class="row my-5">
    <div class="col-md-7">
        <?php
  if(isset($_SESSION['candidates'])){
    $candidates=$_SESSION['candidates'];
    for($i=0;$i<count($candidates);$i++){
        ?>
        <div class="row">
        <div class="col-md-4">
            <img src="../uploads/<?php echo $candidates[$i]['photo']  ?>" alt="Candidate Image">
        </div>
        <div class="col-md-8">
            <strong class="text-dark h5">Candidate name:</strong><?php echo $candidates[$i]['username']  ?><br>
            <strong class="text-dark h5">Votes:</strong><?php echo $candidates[$i]['votes']  ?><br>
        </div>
    </div>
  
    <form action="../actions/voting.php" method="POST">
<input type="hidden" name="candidatevotes" value="<?php echo $candidates[$i]['votes']  ?>">
<input type="hidden" name="candidateid" value="<?php echo $candidates[$i]['id']  ?>">

<?php
if($_SESSION['status']==1){
    ?>
    <button class="bg-success my-3 text-white px-3">Voted</button>
    <?php
}else{
    ?>
    <button class="bg-danger my-3 text-white px-3" type="submit">>Vote</button>
    <?php
}
?>
    </form>
    <hr>
    <?php
    }
  }else{
      ?>
      <div class="container">
          <p>No candidates to display</p>
      </div>
    <?php
  }
    ?>
        <! -- candidates -->
    </div>
    <div class="col-md-5">
        <! -- user profile -->
        <img src="../uploads/<?php echo $data['photo']?>" alt="User Image">
        <br>
        <br>
        <strong class="text-dark h5">Name:</strong><?php echo $data['username'];?><br><br>
        <strong class="text-dark h5">Mobile:</strong><?php echo $data['mobile'];?><br><br>
        <strong class="text-dark h5">Status:</strong><?php echo $status['status'];?><br><br>

    </div>
</div>
    
</body>
</html>