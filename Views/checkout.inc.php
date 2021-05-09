<?php
try {
    ob_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
	function getOTP(){
		$sys = $_SESSION['email'];
		//$output = json_decode(exec("genOTP.py $sys "));
		//print_r($output);
		$output = exec("genOTP.py $sys  ");
		return $output;
	}

	// function checkOTP(){
	// 	$alpha = $_SESSION['alpha'];
	// 	$s = $_SESSION['otp'];
	// 	$result = exec("checkOTP.py $alpha $s  ");
	// 	return $result;
	// }
?>
<script>
        $(document).ready(function() {
		//localStorage.removeItem("cart")
        let user_id=<?php echo $_SESSION['id']; ?>;
        let cart;
        let gg=getCart(user_id);
        setHtml(gg[user_id])
        function setHtml(cartP){
			let row = ''
			let total=0
			for(let i in cartP){
				if(cartP[i].status=="ยังไม่ชำระ"){
					row += `<tr>
					<td style="text-align:left;"><img src=${cartP[i].image} class="cart-item-image" />${cartP[i].name}</td>
					<td style="text-align:left;">${cartP[i].code}</td>
					<td  style="text-align:center;">${cartP[i].price}</td>
					</tr>`
					total+=parseFloat(cartP[i].price)
				}
			}
			total=total.toFixed(2)
			row += `<tr>
				<td colspan="2" align="right">Total:</td>
				<td align="center"><strong>${total}</strong></td>
				<td></td>
			</tr>`
			$("#shopping-cart-body").html(row)
		}
        function getCart(userId) {
            let cart = [];
            if (localStorage.getItem("cart") != null) {
                cart = JSON.parse(localStorage.getItem("cart"));
                if (!JSON.parse(localStorage.getItem("cart"))[userId]) {
                cart[userId] = [];
                }
                return cart;
            }
            cart[userId] = [];
            return cart;
		}
		function setCart(cart) {
            localStorage.setItem("cart", JSON.stringify(cart));
        }
		function setStatusCart(cartS){
			for(let i in cartS){
				cartS[i].status="ชำระเงินแล้ว"
			}
			setCart(cart)
		}
		
		$(document).on('click','#con',function(){
			let op = <?php echo getOTP() ?>;
			let otp = prompt("Please enter OTP from "+op.val+":", "XXXXXX");
			if(otp == op.otp){
				alert("ชำระเงินเรียบร้อยค่ะ")
				cart = getCart(user_id);
				setStatusCart(cart[user_id]);
				location.href="http://localhost/GameShop/index.php?controller=Member&action=backhome";
			 }
			 else{
				 
				 alert("รหัสไม่ถูกต้อง กรุณารอรับ OTP ใหม่อีกครั้งค่ะ")
				 location.reload()
			 }
		
        })
	})

</script>
<body>
<br>
	<div align="right" style="width: 80%; margin:auto">
    <?php if(isset($_SESSION['username'])) : ?>
		<!-- <strong><?php echo $_SESSION['username'] ?></strong> -->
		<form name="logout" id="back" method="post" 
        action=<?= Router::getSourcePath() . "logout.php"?>>
		<label><?php echo $_SESSION['username']?>&nbsp&nbsp</label>
            <button class="btn btn-reward" type="submit">Logout</button>
    </form>
		<?php endif ?>
	</div>
<div id="shopping-cart">
			<h3 class="text-left" style="margin-left:5%"><b>Shopping Cart</b></h3>
			<div class="section-block summary" style='width: 90%; margin:auto'>
					<table class='table text-center bg-dark' style='width: 90%; margin:auto'>
						<thead>
							<tr>
							<th style="text-align:center;" >Name</th>
							<th style="text-align:left;" >Code</th>
							<th style="text-align:center;" >Price</th>
							
							</tr>
						</thead>
						<tbody id="shopping-cart-body">
							
						</tbody>
					</table>
			</div>
</div>
<div align="right" style="width: 80%; margin:auto">
<button class="btn btn-signupii" id="con" type="button">Confirm</button>
<a href="index.php?controller=Member&action=backhome" class="btn btn-cancel">Back</a>
</div><br><br>
</body>
<?php

    $content = ob_get_clean();

    include Router::getSourcePath() . "layout.php";
} // -- try
 catch (Throwable $e) {
    ob_clean(); // ล้าง output เดิมที่ค้างอยู่จากการสร้าง page
    echo "Access denied: No Permission to view this page";
    exit(1);
}
?>
