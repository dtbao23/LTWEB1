<?php 
  require_once 'init.php';
  $title = 'Cộng hai số';
  requireLoggedIn();
  if(isset($_POST['Number1']) && isset($_POST['Number2']))
  {
    $a = $_POST['Number1'];
    $b = $_POST['Number2'];
    $result = $a + $b;
  }

?>
<?php include 'header.php'; ?>
<?php if (isset($result)): ?>
<div class="alert alert-secondary" role="alert">
  Kết quả cộng hai số <?php echo $a; ?> và <?php echo $b; ?> là <?php echo $result ?>
</div>
<?php else: ?>

<form method="POST" action="sum.php">
  <div class="form-group">
    <label for="Number1">Input number 1</label>
    <input type="number" class="form-control" name="Number1">   
    <label for="Number2">Input number 2</label>
    <input type="number" class="form-control" name="Number2">   
  </div> 
  <button type="submit" class="btn btn-outline-dark">Gửi dữ liệu</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>