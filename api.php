<?php
@session_start();
header("Content-Type:text/html; charset=utf-8");
function getRandomString($len, $chars=null)
{
    if (is_null($chars)){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    }
    mt_srand(10000000*(double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
        $str .= $chars[mt_rand(0, $lc)];
    }
    return $str;
}

if ($_POST){
    $post = $_POST;
    $conn = mysqli_connect('localhost','root','123456','dslh_web','3306') or die("Lỗi kết nối cơ sở dữ liệu!");
    $conn->query('set names utf8');
    switch ($_GET['act']){
        case 'login':{
            $user = $post['username'];
            $pass = $post['password'];
            $serverid = $post['serverid'];
			$md5pass = md5($pass);
            $result = mysqli_fetch_assoc($conn->query("SELECT * FROM user WHERE user = '$user' AND pass = '$md5pass'"));
            if ($result){
				@$_SESSION['username'] = $user;
                $token = md5("xcas2d1z32c1566@#".$user);
                $data = array(
                    'code' => '1',
                    'msg' => 'success',
                    'token' => $token,
                    'user' => $user
                );
            }else{
                $data = array(
                    'code' => '0',
                    'msg' => 'Tài khoản hoặc mật khẩu không chính xác!'
                );
            }
            exit(json_encode($data));
            break;
        }
        case 'reg':{
            $user = $post['username'];
            $pass = $post['password'];
            $pass1 = $post['password1'];
			$md5pass = md5($pass);
            if ($pass == $pass1){
                if (mysqli_fetch_assoc($conn->query("SELECT * FROM user WHERE user = '$user'"))){
                    $data = array(
                        'code' => '0',
                        'msg' => 'Tài khoản đã được đăng ký!'
                    );
                }else{
                    if ($conn->query("INSERT INTO user (user, pass) VALUES ('$user','$md5pass')")){
                        $token = md5("xcas2d1z32c1566@#".$user);
                        $data = array(
                            'code' => '1',
                            'msg' => 'success',
                            'token' => $token,
                            'user' => $user
                        );
                    }else{
                        $data = array(
                            'msg' => 'success',
                            'token' => $token,
                            'user' => $user
                        );
                    }
                }
            }else{
                $data = array(
                    'code' => '0',
                    'msg' => 'Hai mật khẩu không khớp!'
                );
            }
            exit(json_encode($data));
            break;
        }
    }
}