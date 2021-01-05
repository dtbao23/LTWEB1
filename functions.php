<?php
function sum($a, $b){
    return $a + $b;
}

function findUserById($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findUserByUsername($username)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute(array($username));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function createUser($username, $password)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?,?)");
    $stmt->execute(array($username,$password));
    return findUserById($db->lastInsertId());
}

function changePassword($newpassword,$id)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->execute(array($newpassword,$id));
}

function createStatus($status, $userID)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO posts (content,userID) VALUES (?,?)");
    $stmt->execute(array($status, $userID));
}

function findPostUserByUserId($userID)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM posts WHERE userID=?");
    $stmt->execute(array($userID));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findPostUser()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM posts");
    $stmt->execute(array());
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCurrentUser()
{
    if(isset($_SESSION['userId']))
    {
        return findUserById($_SESSION['userId']);
    }
    return null;
}

function resizeImage($filename, $max_width, $max_height)
{
  list($orig_width, $orig_height) = getimagesize($filename);

  $width = $orig_width;
  $height = $orig_height;

  # taller
  if ($height > $max_height) {
      $width = ($max_height / $height) * $width;
      $height = $max_height;
  }

  # wider
  if ($width > $max_width) {
      $height = ($max_width / $width) * $height;
      $width = $max_width;
  }

  $image_p = imagecreatetruecolor($width, $height);

  $image = imagecreatefromjpeg($filename);

  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

  return $image_p;
}

function requireLoggedIn() 
{
    global $currentUser;
    if(!$currentUser)
    {
        header('Location: login.php');
        exit();
    }
}

