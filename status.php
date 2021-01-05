<?php 
  require_once 'init.php';
  $title = 'Trạng thái';
  requireLoggedIn();
  if(isset($_POST['status']))
  {
    $status = $_POST['status'];
    $userID = $_SESSION['userId'];
    createStatus($status, $userID); 
    header('Location: index.php');
    exit();      
  }
  
?>
<?php include 'header.php'; ?>

<?php if(isset($error)) : ?>
<div class="alert alert-danger" role="alert">
  <?php echo $error; ?>
</div>
<?php else: ?>
<form method="POST" action="status.php">
  <div class="form-group">
    <label for="username"><?php echo $currentUser['username']; ?> ơi, bạn đang nghĩ gì thế?</label>
    <input type="text" class="form-control" name="status">   
  </div> 
  <button type="submit" class="btn btn-primary btn-sm">Đăng</button>
</form>
<?php endif; ?>

<!--Hiển thị trạng thái của người dùng-->
</br>
<?php 
global $userID;
$userPost=findPostUserByUserId($userID);
if($userPost==null) :
?>
<div class="card">
  <div class="card-header">
    Dòng thời gian
  </div>     
</div>

<?php else: 
$i=0;
foreach( $userPost as $value ) 
{?>
<div class="card">
  <div class="card-header">
    Dòng thời gian
  </div>
  <div class="card-body">
    <p class="card-text">
      <?php        
        echo $value['content'];     
        echo "</br>";
      ?>
    </p>
</div>
<?php 
  $i++;
}
endif; 
?>
<?php include 'footer.php'; ?>

