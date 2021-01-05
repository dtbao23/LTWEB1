<?php 
  require_once 'init.php';
  $title = 'Login';
  if(isset($_POST['username']) && isset($_POST['password']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = findUserByUsername($username);

    if(!$user)
    {
        $error = 'Không tìm thấy người dùng';
    } 
    else
    {
        if(!password_verify($password, $user['password']))
        {
          $error = 'Mật khẩu không chính xác';
        }
        else
        {                   
          
          //Gán user vào session
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

<form method="POST" action="login.php">
  <div class="form-group">
    <label for="username">User name</label>
    <input type="text" class="form-control" name="username">   
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password">   
  </div> 
  <button type="submit" class="btn btn-outline-dark">Login</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>