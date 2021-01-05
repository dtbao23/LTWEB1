<?php 
  require_once 'init.php';
  $title = 'Change Password';


  if(isset($_POST['password']) && isset($_POST['confirmpassword']))
  {
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password!=$confirmpassword)
    {
        $error = 'Password và Confirm Password phải trùng khớp với nhau';  
    }
    else
    {          
        changePassword(password_hash($confirmpassword, PASSWORD_DEFAULT), $_SESSION['userId']);
        echo 'Thay đổi mật khẩu thành công';
    }        
    
  }
?>
<?php include 'header.php'; ?>

<?php if(isset($error)) : ?>
<div class="alert alert-danger" role="alert">
  <?php echo $error; ?>
</div>
<?php else: ?>
    
<form method="POST" action="changepassword.php">
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password">   
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword">   
  </div> 
  <button class="btn btn-outline-dark">Đồng ý</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>