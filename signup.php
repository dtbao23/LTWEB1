<?php 
  require_once 'init.php';
  $title = 'Sign up';
  if(isset($_POST['username']) && isset($_POST['password']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $user = findUserByUsername($username);
    if($user)
    {
        $error = 'Người dùng đã tồn tại';                 
    } 
    else
    {
        if($password!=$confirmpassword)
        {
          $error = 'Password và Confirm Password phải trùng khớp với nhau'; 
        }
        else
        {                  
          
          $user=createUser($username, password_hash($password, PASSWORD_DEFAULT));
          $_SESSION['userId'] = $user['id'];
          header('Location: index.php');
          exit();
        }        
    }
  }
?>
<?php include 'header.php'; ?>

<?php if(isset($error)) : ?>
<div class="alert alert-danger" role="alert">
  <?php echo $error; ?>
</div>
<?php else: ?>
<form method="POST" action="signup.php">
  <div class="form-group">
    <label for="username">User name</label>
    <input type="text" class="form-control" name="username">   
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password">   
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword">   
  </div> 
  <button type="submit" class="btn btn-outline-dark">Create account</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>