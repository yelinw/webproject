<?php include('registerdb.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>

	<link rel="stylesheet" href="stylelogre.css">
</head>
<body>
	
	<form id="register_form">
		<h1>สมัครเข้าใช้งาน</h1>
		<div id="error_msg"></div>
		<input type="text" name="Name_User" placeholder="ชื่อ-สกุล" id="Name_User" required>
        </div>

        <div>
            <input type="email" name="Email_User" placeholder="อีเมล" id="Email_User" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" required>
            <span></span>
        </div>     

        <div>
            <input type="tel" name="Tel_User" placeholder="เบอร์โทร" id="Tel_User"  pattern="0[1-9]{9}" required>
			<span></span>
        </div>
		
		<div>
			<input type="password" name="Pass_User" placeholder="รหัสผ่าน" id="Pass_User" required>
		</div>

		<div>
			<input type="password" name="Pass_User2" placeholder="ยืนยันรหัสผ่าน" id="Pass_User2" required>
			<span></span>
		</div>
		<div>
			<button tyoe="button" name="register" id="reg_btn">สมัครเพื่อเข้าใช้งาน</button>
		</div>
		<div>          
			<p>มีบัญชีแล้วใช่ไหม <a href="login.php">เข้าสู่ระบบ</a></p>
        </div>
	</form>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="registerscript.js"></script>
</body>
</html>