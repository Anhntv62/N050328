<?php 
	$conn = new mysqli("localhost","root","","qlmusic");
	if (!$conn){
	echo("Connect failed.");
	}
	session_start(); 
?>
<?php
// require_once("./include/connection.php");
// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
if (isset($_POST["btn_submit"])) {
	// lấy thông tin người dùng
	$username = $_POST["username"];
	$password = $_POST["password"];
//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($username == "" || $password =="") 
		echo "username hoặc password bạn không được để trống ";
	else{
		$sql = "select * from user where username = '$username' and password = '$password' ";
	//    echo $sql;
		$query = mysqli_query($conn , $sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows == 0)
			echo "tên dang nhập hoặc mật khẩu không dúng !";
		else{
			// Lấy ra thông tin người dùng và lưu vào session
			while ( $data = mysqli_fetch_array($query) ) {
	    		$_SESSION["userid"] = $data["userid"];
				$_SESSION['username'] = $data["username"];
                $_SESSION["email"] = $data["email"];
				$_SESSION["idgroup"] = $data["idgroup"];
				$_SESSION["nickname"] = $data["nickname"];									
            }
            // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            header('location:index.php');
        }
	}
	echo '<link rel="stylesheet" href="../css/login.css">';
}
?>
 	<form method="POST" action="login.php">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input type="submit" name="btn_submit" value="Đăng nhập"></td>
	    		</tr>
	    	</table>
  </fieldset>
  </form>