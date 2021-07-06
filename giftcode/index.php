<?php
@session_start();
if (!isset($_SESSION['username'])) {
	 header('Location: /index.php');
}
$username = $_SESSION['username'];
if (@$_GET['act'] == "do") {
	$giftcode = addslashes($_POST['code']); //Mã Giftcode
	$serverId = intval($_POST["serverid"]); //Server ID
	include "../config.php";
	$giftCodeQuery = "SELECT * FROM gift_code WHERE code = '{$giftcode}' LIMIT 1";
	$result_giftCodeQuery = $pdo->query($giftCodeQuery);
	$row_giftCodeQuery = $result_giftCodeQuery->fetch(PDO::FETCH_ASSOC);
	if (empty($username) || empty($giftcode) || empty($serverId)) {
        print "<script>alert('Thông tin không hợp lệ!');window.location.href='/giftcode';</script>";
        exit;
	}
	if ($row_giftCodeQuery === false) {
        print "<script>alert('Giftcode không hợp lệ -1!');window.location.href='/giftcode';</script>";
        exit;
	}
	if ($row_giftCodeQuery['is_limited'] == 1 && $row_giftCodeQuery['limit_number'] <= 0) {
	    print "<script>alert('Giftcode đã được sử dụng quá số lần cho phép!');window.location.href='/giftcode';</script>";
        exit;
	}
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	if (!empty($row_giftCodeQuery['expired_date']) && strtotime($row_giftCodeQuery['expired_date']) < time()) {
	    print "<script>alert('Giftcode đã hết hạn!');window.location.href='/giftcode';</script>";
        exit;
	}
	if ($row_giftCodeQuery['server'] != $serverId && $row_giftCodeQuery['server'] != 'all') {
	    print "<script>alert('Giftcode không hợp lệ -2!');window.location.href='/giftcode';</script>";
        exit;
	}
	$giftCodeId = $row_giftCodeQuery['id'] . "_" . $serverId;
	$checkUsedCode = "SELECT * FROM `used_code` WHERE (`username` = '$username' AND `gift_code` = '".$giftCodeId."') LIMIT 1";
	$result_checkUsedCode = $pdo->query($checkUsedCode);
	$row_checkUsedCode = $result_checkUsedCode->fetch(PDO::FETCH_ASSOC);
	if ($row_checkUsedCode !== false) {
		print "<script>alert('Giftcode đã được sử dụng!');window.location.href='/giftcode';</script>";
        exit;
	}
		include "../config2.php";
		$itemid = $row_giftCodeQuery['item'];
		$itemtype = 1;
		$huobiid = '';
		$itemnum = 1;
		$itemstr = $itemtype .= '_';
	    if ($itemtype == 0) {
		$itemstr .= $huobiid .= '_';
		}elseif ($itemtype == 1) {
			if ($itemnum < 1 || $itemnum > 999999) {
				echo '<script language="javascript">alert("Số lượng từ 1 - 999999!")</script>';
		}
		$itemstr .= $itemid .= '_';
	    }

	    $itemstr .= $itemnum;
	    $items = explode('_', $itemstr);
	
		$sql = "select * from `players` where account = '$username' and serverid = '$serverId';";
		$sql_result = $pdo2->query($sql);
		$player = $sql_result->fetchAll();
		$playerid = $player[0]['dbid'];
	
		$sql = "insert into gmcmd (`serverid`, `cmd`, `param1`, `param2`, `param3`, `param4`) values('$serverId','mail','$playerid','$items[0]','$items[1]','$items[2]')";
        $result = $pdo2->query($sql);
		
		if($result){
		    //Lưu used
			$sql_used = "INSERT INTO `used_code` (`username`, `gift_code`) VALUES ('$username', '$giftCodeId')";
			$result_used = $pdo->query($sql_used);
			print "<script>alert('Đổi Giftcode thành công, hãy kiểm tra hòm thư!');window.location.href='/giftcode';</script>";
            exit;
		}else{
			print "<script>alert('Đổi Giftcode thất bại -2, vui lòng kiểm tra lại!');window.location.href='/giftcode';</script>";
            exit;
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Giftcode - Tây Du H5</title>
<link href="../static/Register_files/sweet-alert.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
<link rel="stylesheet" href="../static/Register_files/bootstrap.min.css">
<link href="../static/Register_files/Site.css" rel="stylesheet">
</head>
<body style="">
<div class="container body-content">
<div class="row">
<div class="col-md-12">
<div style="border: 1px solid #428bca; border-radius: 5px; padding: 0 !important">
<div class="list-group header-title">
<div class="list-group-item active" style="border-radius: 5px 5px 0px 0px">
<h3 class="list-group-item-heading"><i class="fa fa-info-circle"></i>NHẬN GIFTCODE</h3>
<p class="list-group-item-text">
<a href="/"><i class="fa fa-home"></i> Trang chủ</a>
<span>/</span>
<span>Giftcode</span>
</p>
</div>
</div>
<div class="alert">
<div id="MainContent_pnlInputInfo">
<form action="?act=do" method="POST">
<div class="form-group">
<label for="txtServer">Máy chủ:</label>
<select name="serverid" class="form-control" required>
<option value=""> -- Chọn máy chủ -- </option>
<option value="1">Tây Du S1</option>
<!--<option value="2">Tây Du S2</option>
<option value="3">Tây Du S3</option>
<option value="4">Tây Du S4</option>
<option value="5">Tây Du S5</option>-->
</select>
</div>
<div class="form-group">
<label for="txtUsername">Tài khoản:</label>
<input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username']; ?>" disabled>
</div>
<div class="form-group">
<label for="txtCode">Mã GiftCode:</label>
<input type="text" name="code" class="form-control" placeholder="Nhập mã Code" required>
</div>
<input type="submit" value="Xác Nhận" class="btn btn-success">
</form>
</div>
</div>
</div>
</div>
</div>
<hr>
<footer>
<div class="footer">
<ul>
<li><a href="/"><i class="fa fa-home"></i>Trang chủ</a></li>
<li>
<a href="https://www.facebook.com/netdevgame" target="_blank"><i class="fa fa-facebook">Facebook</i>
</a>
</li>
</ul>
<div style="clear: both"></div>
</div>
</footer>
</div>
</body>
</html>