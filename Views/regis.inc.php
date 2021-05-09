<?php
try {
    ob_start();

?>
<body>
<script>
function myFunction() {
    if (confirm("Are you want to confirm sign up?") == true) {
        document.getElementById("signUpForm").submit();
    } 
}
</script>
    <br>
    <div align="right" style="width: 80%; margin:auto">
        <form name="back" id="back" method="post" 
        action=<?= Router::getSourcePath() . "index.php"?>>
            <button class="btn btn-reward" type="submit">Back</button>
    </form>
    </div>
    <h1 class="text-center"><b>Sign Up</b></h1>
    <br>
    <div class="section-block signup" style="width: 50%; margin:auto">
        <div class="sign-up-form">
            <form name="signUpForm" id="signUpForm" method="post" 
            action=<?= Router::getSourcePath() . "index.php?controller=Member&action=addNew"?>>
                <label class="col-sm-1" style="color: white;" align="left">Name:</label>
                <input class="signup-input" type="text" name="name" placeholder="Name" 
                required/>
                <br><br>
                <label class="col-sm-1" style="color: white;" align="left">Surname:</label>
                <input class="signup-input" type="text" name="surname" placeholder="Surname" 
                required/>
                <br><br>
                <label class="col-sm-1" style="color: white;" align="left">Username:</label>
                <input class="signup-input" type="text" name="username" placeholder="Username" 
                required/>
                <br><br>
                <label class="col-sm-1" style="color: white;" align="left">Password:</label>
                <input class="signup-input" type="password" name="password" placeholder="Password" 
                required/>
                <br><br>
                <label class="col-sm-1" style="color: white;" align="left">Email:</label>
                <input class="signup-input" type="text" name="email" placeholder="email" required/>
                <br><br>
                <button class="btn btn-signupii" type="button" onclick="myFunction();">SignUp</button>
                <button class="btn btn-cancel" type="reset">Cancel</button>
                <br>
			</form>
	    </div>
    </div>
    <br><br>
</body>
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