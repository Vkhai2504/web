<?php
@session_start();
@error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_SESSION['adminuser'])) {
	header('Location: action.php');
}
include "../config.php";
if (@$_GET['act'] == "do") {
    $username = addslashes($_POST['user']);
    $password =  addslashes($_POST['pass']);
	$md5password = md5($password);
	$sql_query = "SELECT id, admin, pass FROM gm_user WHERE admin = '{$username}' LIMIT 1";
	$sql_result = $pdo->query($sql_query);
	$member = $sql_result->fetch(PDO::FETCH_ASSOC);
	if (empty($username) || empty($password)) {
        print "<script>alert('Vui lòng nhập đầy đủ thông tin!');window.location.href='index.php';</script>";
        exit;
	}
    if ($member === false)
    {
        print "<script>alert('Tài khoản không tồn tại!');window.location.href='index.php';</script>";
        exit;
    }
    if ($md5password != $member['pass'])
    {
        print "<script>alert('Mật khẩu không chính xác!');window.location.href='index.php';</script>";
        exit;
    }
    @$_SESSION['adminuser'] = $member['admin'];
    print "<script>window.location.href='action.php';</script>";
}
else
{
print <<<EOF
EOF;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Đăng nhập GMPanel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<style>
input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
input[type=password], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4c75af;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    width: 22%;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
</head>
<body>
<center>
<h1>Đăng nhập Panel</h1>
<div class="container">
  <form action="?act=do" method="post">
    <label for="fname">Tài khoản</label>
    <input type="text" id="user" name="user" placeholder="Nhập tài khoản" value="">
	<label for="fname">Mật khẩu</label>
    <input type="password" id="pass" name="pass" placeholder="Nhập mật khẩu" value="">
    <input type="submit" value="Đăng nhập">
  </form>
</div>
</center>
</body>
</html>
