<?php
session_start();
error_reporting(0);
$configdb = json_decode(file_get_contents('config.json'));
if(isset($_POST['submit'])) 
{ 
    $user = $_POST['username'];
    $pass = $_POST['password'];


if (file_exists(__DIR__ . "/$user/")) {
    echo "<p style='color:red;'> Sorry, but account already exists, please try again :(</p>";
} else {
	$_SESSION["logged_in"] = "true";
	$_SESSION["user"] = $user;
	$_SESSION["nonhash"] = $pass;
setcookie("1stlogin", true, time() + (86400 * 30), "/"); // 86400 = 1 day

	mkdir(__DIR__ . "/$user/", 0777);
$newhostdb = fopen(__DIR__ . "/$user/admin.php", "w") or die("Unable to open file!");
fwrite($newhostdb, "error");
fclose($newhostdb);
$newhostdb2 = fopen(__DIR__ . "/$user/readme.txt", "w") or die("Unable to open file!");
fwrite($newhostdb2, "error");
fclose($newhostdb2);
$newhostdb3 = fopen(__DIR__ . "/$user/index.html", "w") or die("Unable to open file!");
fwrite($newhostdb3, "error");
fclose($newhostdb3);
copy(__DIR__ . "/system/admin_copy.php", __DIR__ . "/$user/admin.php");
copy(__DIR__ . "/system/readme_copy.txt", __DIR__ . "/$user/readme.txt");
copy(__DIR__ . "/system/index_copy.html", __DIR__ . "/$user/index.html");
header("Location: /$user/admin.php");
}
}
?>
<title><?php echo htmlspecialchars($configdb->forumtitle); ?> | Register</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"><link rel="stylesheet" href="./style.css">
<div id="sidenavbar" class="sidenav">
  <a href="https://replit.com/@paragram" id="about">This website is a free small hosting website by paragram, click this to visit his replit &nbsp; &nbsp; ?</a>
</div>
<body class="align">
<div class="grid">
<form method="post" class="form login">
<div class="form__field">
<label for="login__username"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Username</span></label>
<input id="login__username" type="text" name="username" class="form__input" placeholder="Username" required>
</div>
<div class="form__field">
<label for="login__password"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg><span class="hidden">Password</span></label>
<input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
</div>
<div class="form__field">
<input type="submit" name="submit" value="Make Account">
</div>
</form>
<p class="text--center">Already got an account? <a href="/login.php">Login</a></p>
<p class="text--center">Admin? <a href="/system/dashboard.php">View the dashboard</a></p>
</div>
<svg xmlns="http://www.w3.org/2000/svg" class="icons"><symbol id="arrow-right" viewBox="0 0 1792 1792"><path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" /></symbol><symbol id="lock" viewBox="0 0 1792 1792"><path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" /></symbol><symbol id="user" viewBox="0 0 1792 1792"><path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" /></symbol></svg>

</body>

