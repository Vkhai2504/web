<?php
@session_start();
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (!isset($_SESSION['adminuser'])) {
	 header('Location: index.php');
}
include "../config2.php";
if (!empty($_POST['recharge'])) {
	$account = trim($_POST["user"]);
	$serverid = intval($_POST["serverid"]);
	$num = intval($_POST["gold"]);
	$time = time();
	$accname = 's'.'.'.$account;
	//Dùng lúc gộp server
	if ($serverid == 1){
		$server = 1;
	}else if ($serverid == 2){ //Có bao nhiêu server gộp chung thì thêm bấy nhiêu
		$server = 1; //Nếu server chọn là 2 thì id sẽ là 1 vì gộp server 2 vào 1
	}else{
		$server = $serverid; //Ngoài ra thì là chính server đã chọn
	}
    $sql = "select * from `players` where account = '$accname' and serverid = '$server';";
    $sql_result = $pdo2->query($sql);
    $player = $sql_result->fetchAll();
    $UserName = $player[0]['dbid'];

    $sql = "insert into pay (`dbid`, `playerid`, `serverid`, `goodsid`) value('$time','$UserName','$server','$num')";
	$result = $pdo2->query($sql);
    
	////////////////////////////////////////////////////////////
	if($result){
		echo '<script language="javascript">alert("Gửi KNB thành công!")</script>';
	}else{
		echo '<script language="javascript">alert("Gửi KNB thất bại!")</script>';
	}
}
if (!empty($_POST['sendmail'])) {
	$account = trim($_POST["user"]);
	$serverid = intval($_POST["serverid"]);
	$accname = 's'.'.'.$account;
	//Dùng lúc gộp server
	if ($serverid == 1){
		$server = 1;
	}else if ($serverid == 2){ //Có bao nhiêu server gộp chung thì thêm bấy nhiêu
		$server = 1; //Nếu server chọn là 2 thì id sẽ là 1 vì gộp server 2 vào 1
	}else{
		$server = $serverid; //Ngoài ra thì là chính server đã chọn
	}
	$itemtype = trim($_POST["itemtype"]);
	$huobiid = trim($_POST["huobiid"]);
	$itemid = intval($_POST["item"]);
	$num = intval($_POST["num"]);
	$itemstr = $itemtype .= '_';
	if ($itemtype == 0) {
		$itemstr .= $huobiid .= '_';
		}elseif ($itemtype == 1) {
			if ($num < 1 || $num > 999999) {
				echo '<script language="javascript">alert("Số lượng từ 1 - 999999!")</script>';
		}
		$itemstr .= $itemid .= '_';
	}

	$itemstr .= $num;
	$items = explode('_', $itemstr);
	
	$sql = "select * from `players` where account = '$accname' and serverid = '$server';";
    $sql_result = $pdo2->query($sql);
    $player = $sql_result->fetchAll();
    $playerid = $player[0]['dbid'];
	
	$sql = "insert into gmcmd (`serverid`, `cmd`, `param1`, `param2`, `param3`, `param4`) values('$server','mail','$playerid','$items[0]','$items[1]','$items[2]')";
    $result = $pdo2->query($sql);

	////////////////////////////////////////////////////////////
	if($result){
		echo '<script language="javascript">alert("Gửi Mail thành công!")</script>';
	}else{
		echo '<script language="javascript">alert("Gửi Mail thất bại!")</script>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>GMPanel - Phàm Nhân Tu Tiên H5</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
input[type=number], select, textarea {
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
<h1>Gửi KNB</h1>
<div class="container">
  <form action="" method="post" name="recharge">
    <label for="fname">Tài khoản</label>
    <input type="text" id="user" name="user" placeholder="Nhập tên tài khoản">
	<label for="fname">Máy chủ</label>
	<select id="serverid" name="serverid">
	<option value=""> -- Chọn máy chủ -- </option>
	<option value="1">Tu Tiên S1</option>
	<option value="2">Tu Tiên S2</option>
	<!--<option value="3">Tu Tiên S3</option>
	<option value="4">Tu Tiên S4</option>
	<option value="5">Tu Tiên S5</option>-->
	</select>
    <label for="fname">KNB</label>
	<select id="gold" name="gold">
	<option value=""> -- Chọn số KNB -- </option>
	<?php
		foreach($charges as $k=>$v){
		echo '<option value="'.$k.'">'.$v.'</option>';
		}
	?>
	</select>
    <input type="submit" value="Gửi KNB" name="recharge">
  </form>
</div>
</br>
<h1>Gửi Mail</h1>
<div class="container">
  <form action="" method="post" name="sendmail">
    <label for="fname">Tài khoản</label>
    <input type="text" id="user" name="user" placeholder="Nhập tên tài khoản">
	<label for="fname">Máy chủ</label>
    <select id="serverid" name="serverid">
	<option value=""> -- Chọn máy chủ -- </option>
	<option value="1">Tu Tiên S1</option>
	<option value="2">Tu Tiên S2</option>
	<!--<option value="3">Tu Tiên S3</option>
	<option value="4">Tu Tiên S4</option>
	<option value="5">Tu Tiên S5</option>-->
	</select>
	<label for="fname">Loại hình gửi</label>
	<select id="itemtype" name="itemtype">
	<option value=""> -- Chọn loại -- </option>
	<option value="1">Vật phẩm</option>
    <option value="0">Tiền tệ</option>                     
	</select>
	<label for="fname">Loại tiền tệ</label>
	<select id="huobiid" name="huobiid">
	<option value=""> -- Mời lựa chọn -- </option>
	<option value="0">EXP</option>
    <option value="1">Bạc</option>
    <option value="2">NB</option>
    <option value="3">NB khóa</option>
	</select>
	<label for="fname">Vật phẩm</label>
	<select id="item" name="item">
		<?php
        $file = fopen("item.txt", "r");
        while(!feof($file))
        {
            $line=fgets($file);
			$txts=explode(';',$line);
			if(count($txts)==2){
				echo '<option value="'.$txts[0].'">'.$txts[1].'</option>';
			}
        }
        fclose($file);
		?>
	</select>
	<!--<input type="number" id="item" name="item" placeholder="Nhập ID item">-->
    <label for="fname">Số lượng</label>
    <input type="number" id="num" name="num" placeholder="Nhập số lượng item">
    <input type="submit" value="Gửi Mail" name="sendmail">
  </form>
</div>
</center>
</body>
</html>