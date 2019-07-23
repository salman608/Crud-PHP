<?php include 'inc/header.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php
if(!isset($_GET['stuid']) || $_GET['stuid']==NULL ){
  echo "<script>window.location='index.php';</script>";
}else{
  $sid=$_GET['stuid'];
}
 ?>
 <?php
 //error_reporting(0);
$db=new Database();
  ?>

 <?php

 if($_SERVER['REQUEST_METHOD']=="POST"){
   $name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   if(empty($name) ||  empty($email) || empty($phone)){
     echo'<div class="alert alert-danger"><strong>ERROR!!</strong>Field Must Not be Empty!!</div>';
   }else{
     $query="UPDATE tbl_stu
     SET
      name='$name',
      email='$email',
      phone='$phone'
      WHERE id='$sid' ";
     $insert_row=$db->insert($query);
     if($insert_row){
       echo'<div class="alert alert-success"><strong>SUCCESS!!</strong>Data Upadte successfully!!</div>';
     }else{
       echo'<div class="alert alert-danger "><strong>ERROR!!</strong>Data Updated not successfully!!</div>';
     }
   }

 }
  ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-heading">
      <span class="text-primary">Update Student</span>
      <!-- <a class="btn btn-secondary" href="#" style="color:white;">Update Student</a> -->
     <a style="color:white;"class="btn btn-info pull-right"href="index.php" >Back</a>
    </h3>
  </div>
  <div class="panel-body">
    <?php
$query="SELECT * FROM tbl_stu WHERE id='$sid' ORDER BY id DESC";
$estu=$db->select($query);
if($estu){
  while($result=$estu->fetch_assoc()){


     ?>
    <form style="width:60%; margin:auto;" action="" method="post">
      <div class="form-group">
        <label for="name">Student Name</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $result['name']; ?>" >
      </div>
      <div class="form-group">
        <label for="email">Student Email</label>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo $result['email']; ?>">
      </div>
      <div class="form-group">
        <label for="phone">Student Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $result['phone']; ?>" >
      </div>
      <div class="form-group">
      <input type="submit" name="submit" value="Update Student" class="btn btn-primary">
      </div>

    </form>
  <?php }} ?>

  </div>
</div>
