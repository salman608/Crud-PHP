<?php
//include 'config/config.php';
include 'inc/header.php';
 include 'lib/Database.php';

  ?>
  <?php
  error_reporting(0);
$db=new Database();
   ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-heading">
            <span class="text-primary">Student List</span>
            
           <a style="color:white;"class="btn btn-info pull-right"href="addstu.php" >Add Student</a>
          </h3>
<?php
//delete Query---------------------------------------------
if(isset($_GET['studel']) ){
  $delid=$_GET['studel'];
  $delquery="DELETE FROM tbl_stu WHERE id='$delid'";
  $delres=$db->delete($delquery);
  if($delres){
    echo'<div class="alert alert-success"><strong>SUCCESS!!</strong>Data Delete successfully!!</div>';
  }else{
    echo'<div class="alert alert-danger "><strong>ERROR!!</strong>Data Delete not successfully!!</div>';
  }


}
 ?>
        </div>
        <div class="panel-body">
           <table class="table table-striped">
             <tr>
               <th>Serial</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Action</th>
             </tr>
  <?php
  $query="SELECT * FROM tbl_stu";
  $data=$db->select($query);
  if($data){
    $i=0;
    while($result=$data->fetch_assoc()){
      $i++;


    ?>
             <tr>
               <td><?php echo  $i; ?></td>
               <td><?php echo $result['name'];  ?></td>
               <td><?php echo $result['email'];  ?></td>
               <td><?php echo $result['phone'];  ?></td>
               <td>
                 <a class="btn btn-warning" href="editstu.php?stuid=<?php echo $result['id']; ?>">Edit</a>
                 <a class="btn btn-danger" href="?studel=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure to Delete!!')">Delete</a>
               </td>
             </tr>

<?php }} ?>
           </table>
        </div>

      </div>
      <?php include 'inc/footer.php'; ?>
