
<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!--<a class="navbar-brand" href="#">Lập trình web</a>-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item " >
                        <a class="nav-link" href="index.php">Trang chủ </a>
                    </li>
                       
                    <?php if ($currentUser): ?>
                    <!--Đã đăng nhập-->
                        <li class="nav-item " >
                        <a class="nav-link" href="sum.php">Tính tổng </a>                       
                        <li class="nav-item " >
                        <a class="nav-link" href="status.php">Trạng thái </a>  
                        <li class="nav-item " >
                        <a class="nav-link" href="changepassword.php">Đổi mật khẩu </a>                                          
                        <li class="nav-item " >
                        <a class="nav-link" href="profile.php">Cá nhân </a>  
                        <li class="nav-item " >
                        <a class="nav-link" href="logout.php">Đăng xuất </a>  
                    </li> 
                    <?php else: ?>
                    <!--Chưa đăng nhập-->
                        <li class="nav-item " >
                        <a class="nav-link" href="login.php">Đăng nhập </a>
                        <li class="nav-item " >
                        <a class="nav-link" href="signup.php">Đăng kí </a>
                    </li>  
                    <?php endif; ?>                                              
                </ul>               
            </div>
        </nav>
    <h1><?php echo $title; ?></h1>
