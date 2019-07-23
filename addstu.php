<?php
 include 'inc/header.php';
 include 'lib/Database.php';
 ?>
 <?php
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
    $query="INSERT INTO tbl_stu(name,email,phone) VALUES('$name','$email','$phone')";
    $insert_row=$db->insert($query);
    if($insert_row){
      echo'<div class="alert alert-success"><strong>SUCCESS!!</strong>Data Inserted successfully!!</div>';
    }else{
      echo'<div class="alert alert-danger "><strong>ERROR!!</strong>Data Inserted not successfully!!</div>';
    }
  }

}
 ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-heading">
      <h2 style="color:green;display:inline;">Add Student Data</h2>
     <a style="color:white;"class="btn btn-info pull-right"href="index.php" >Student List</a>
    </h3>
  </div>
  <div class="panel-body">
    <form style="width:60%; margin:auto;" action=" " method="post">
      <div class="form-group">
        <label for="name">Student Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name...">
      </div>
      <div class="form-group">
        <label for="email">Student Email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email...">
      </div>
      <div class="form-group">
        <label for="phone">Student Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone...">
      </div>
      <div class="form-group">
      <input type="hidden" name="action" value="add">
      <input type="submit" name="submit" value="Add Student" class="btn btn-primary">
      </div>

    </form>

  </div>
</div>
