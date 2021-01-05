<?php 
  require_once 'init.php';
  $title = 'Trang chủ';
?>
<?php include 'header.php'; ?>

<?php if($currentUser) : ?>
<div class="alert alert-warning" role="alert">
  Chào <?php echo $currentUser['username']; ?>, chúc bạn một ngày tốt lành
</div>
<?php
$allPostUser=findPostUser();
$row=count($allPostUser);//lấy số dòng trả về trong CSDL
for($i=$row-1;$i>=0;$i--)
{ ?>
  <div class="card mb-3 " style="border-radius: 10px">
    <div class="card-header ">
      <img src="./avatars/<?php echo $currentUser['id']; ?>.jpg" class="card-img-top " alt="No avatar" style="width:50px;height:50px;border-radius: 50%" />
      <h3>
      <?php 
        $statusUsername=findUserById($allPostUser[$i]["userID"]);
        echo $statusUsername['username']; 
      ?>
      </h3>
      <footer class="blockquote-footer"><cite title="Source Title"></cite>        
          <small class="text-muted">
          <?php
            echo "Đăng lúc: " .$allPostUser[$i]["createdTime"]; 
          ?>
          </small>
      </footer>
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <?php
          echo $allPostUser[$i]["content"]; 
        ?>      
      </blockquote>
    </div>
  </div>
<?php
}
else : ?>
<div class="alert alert-warning" role="alert">
  Bạn chưa đăng nhập
</div>

<?php endif; ?>
  
<?php include 'footer.php'; ?>