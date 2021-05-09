<?php
    try {
        ob_start();
    
?>
<html>
    <br>
    <script>
        function checkEmpty(){
            var use = document.getElementById("username");
            var pas = document.getElementById("password");
            if(use.value == ""){
                alert("Please Enter Your Username!!!");
                use.focus();
            }
            else if(pas.value == ""){
                alert("Please Enter Your Password!!!");
                pas.focus();
            }
            else if(use.value == "" || pas.value == ""){
                alert("Please Enter Your Username and Password");
                use.focus();
                pas.focus();
            }
            else{
                document.getElementById("loginForm").onsubmit;
            }

        }

        function textSelect(elem){
            elem.select();
        }
    </script>
    <div align="right" style="width: 80%; margin:auto">
        <form name="signUp" id="signUp" method="post" 
        action=<?= Router::getSourcePath() . "index.php?controller=Member&action=signUp" ?>>
            <label>สมัครสมาชิก&nbsp&nbsp</label>
            <button class="btn btn-reward" type="submit">Sign Up</button>
    </form>
    </div>
    <h1 class="text-center"><b>Login</b></h1>
    <br>
    <div class="section-block signup" style="width: 50%; margin:auto">
        <div class="text-danger" align="center" style="color: white;">
            <?= $_GET['msg'] ?? "" ?>
        </div>
        <br>
		<div class="sign-up-form">
            <form name="loginForm" id="loginForm" method="post" 
            action=<?= Router::getSourcePath() . "index.php?controller=Member&action=login" ?>>
                <label style="color: white;" align="right">Username:&nbsp&nbsp</label>
                <input class="signup-input" type="text" name="username" id="username" placeholder="Username" onfocus="textSelect(this)" required/>
                <br><br>
                <label style="color: white;" align="right">Password:&nbsp&nbsp</label>
                <input class="signup-input" type="password" name="password" id="password" placeholder="Password" onfocus="textSelect(this)" required/>
                <br><br>
                <button class="btn btn-signup" type="submit" onclick="checkEmpty();">Login</button>
                <button class="btn btn-cancel" type="reset">Cancel</button>
                <br>
			</form>
	    </div>
    </div>
    <br><br>
</html>
<?php

    $content = ob_get_clean();

    include Router::getSourcePath()."layout.php";
} // -- try
catch (Throwable $e) {
    ob_clean(); // ล้าง output เดิมที่ค้างอยู่จากการสร้าง page
    echo "Access denied: No Permission to view this page";
    exit(1);
}
?>