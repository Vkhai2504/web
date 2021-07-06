<?php
@error_reporting(0);
@session_start();
header("Content-Type:text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html style="min-height: 100%">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">  
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
<link rel="stylesheet" href="/theme/css/h5.css">
<link rel="stylesheet" href="/theme/css/font-awesome.css">
<script type="text/javascript" src="/theme/js/jquery.js"></script>
<script type="text/javascript" src="/theme/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="/theme/js/tab.js"></script>
<script type="text/javascript" src="/theme/js/web_h5.js"></script>
<meta name="description" content="Tây Du H5 là webgame đa nền tảng, chơi được cả trên di động. Theo đó người chơi có thể trải nghiệm ngay trên thiết bị PC hay Mobile mà không cần phải cài đặt."/>        
<meta name="keywords" content="Tây Du H5, 360 H5, game H5, game online H5, webgame H5, web game H5, online game H5, 360 game H5, 360plus H5, 360 plus H5, 360 play H5, 360play H5, 360live H5, 360 live"/>            
<meta property="og:title" content="Tây Du H5 - CỔNG GAME HTML5 Đa Nền Tảng PC và Mobile"/>
<meta property="og:description" content="Tây Du H5 là webgame đa nền tảng, chơi được cả trên di động. Theo đó người chơi có thể trải nghiệm ngay trên thiết bị PC hay Mobile mà không cần phải cài đặt."/>
<title>Tây Du H5</title>
		<style type="text/css">
			.header .account > a:before { content: none }
			.avatar > a:before { content: none;}
			.avatar:after { content: none; }
		</style>
</head>
    <body class="play-page" style="min-height: 100%; background-color: black">		
		<div class="main-content">
			<header class="header" >
					<div class="container clearfix">
					<h2 class="logo">
						<a href="/">
							<img src="/theme/img/logo_360game.svg" alt=""/>
						</a>
					</h2>
					<?php if(@$_SESSION['username']){ ?>
					<div class="account">
						<a title="Tài khoản">
							<img src="/theme/img/avatar.png" style="width: 40px; height: 40px; border-radius: 20px; border: 2px solid white;"/>
						</a>
						<div class="wrap">
							<ul class="account-manage">
								<li><a><?php echo $_SESSION['username']; ?></a></li>
								<li class="signout"><a target="_blank" href="/nap-the">Nạp Thẻ</a></li>
								<li class="signout"><a target="_blank" href="/giftcode">GiftCode</a></li>
								<li class="signout"><a href="/thoat.html">Thoát</a></li>
							</ul>
						</div>
					</div>
					<?php }else{ ?>
					<?php } ?>
				</div>
			</header>			
			<div class="iframe-box">
				<iframe src="/ingame.html" width="100%" height="100%" frameborder="0"></iframe>
			</div>
		</div>
		<div class="modal fade" id="dlgModalCont" style="display: none;background-color: rgba(0,0,0,0.4);">
			<div class="modal-dialog" role="document">
				<div class="modal-content" style="margin-top: 50px;">
					<div class="modal-header">
						<button type="button" class="close" id="myModalBtnX">
							<span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</div>
					<div class="modal-body">
						<div class="code-pop" id="myModalContent"></div>
					</div>
				</div>
			</div>
		</div>
			
    </body>
</html>