<?php 
$conn=new mysqli("localhost","root","","qlmusic");
if (!$conn){
  echo("Connect failed.");
}
// else 
// {  echo ("Connected sucessfully.");
// }
?>

<?php include "header.php" ?>
<!-- <php require_once("includes/connection.php"); ?> -->
<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($username == "" || $password == ""  || $email == "") {
            echo "bạn vui lòng nhập đầy đủ thông tin";           
		}
		else{
			$sql = "INSERT INTO user(username, password, idgroup , email ) VALUES ( '$username', '$password',0,'$email')";
			// thực thi câu $sql với biến conn lấy từ file connection.php
            mysqli_query($conn,$sql); 
            ?>
                <script> alert("chúc mừng bạn đã đăng ký thành công"); 
                         window.location.href = "index.php";
                </script>
            <?php 
        }
	}
    echo '<link rel="stylesheet" href="../css/login.css">';
?>
	<form action="Register.php" method="post">
		<table >
			<tr>
				<td class="text" colspan="2">Register</td>
			</tr>	
			<tr>
				<td>Username:</td>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td>Password </td>
				<td><input type="password" id="password" name="password"></td>
			</tr>
			<tr>
				<td>Email </td>
				<td><input type="text" id="email" name="email"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Đăng Ký"></td>
			</tr>
 
		</table>
		
	</form>