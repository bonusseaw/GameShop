<?php
try {
    ob_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
		//localStorage.removeItem("cart")
        let user_id=<?php echo $_SESSION['id']; ?>;
        let cart;
        let gg=getCart(user_id);
        setHtml(gg[user_id])
        function setHtml(cartP){
            let row = ''
            let txt1=''
			let total=0
			for(let i in cartP){
                if(cartP[i].status=="ยังไม่ชำระ"){
                    txt1=`<td style="text-align:center;"><img  key=${cartP[i].id} key-user=${user_id} class="btnRemoveAction" img src="Image/icon-delete.png" alt="Remove Item" /></td></tr>`
                }else{
                    txt1=`<td  style="text-align:center;color:green">ชำระเงินแล้ว</td></tr>`
                }
				row += `<tr>
					<td style="text-align:left;"><img src=${cartP[i].image} class="cart-item-image" />${cartP[i].name}</td>
					<td style="text-align:left;">${cartP[i].code}</td>
                    <td  style="text-align:center;">${cartP[i].price}</td>`+txt1
                if(cartP[i].status=="ยังไม่ชำระ"){
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
        function add(data, cart, userId) {
            let add = true
			cart[userId].forEach(c=>{
				console.log(c.id , data.id)
				if(c.id == data.id)
					add = false
			})
			if(add){
				console.log("add ")
                cart[userId] = [...cart[userId], data];
			}else{
				alert("This item is already in the cart")
            }
            return cart;
        }
        function deleteProduct(id, cart, userId) {
            cart[userId] = cart[userId].filter((item) => item.id != id);
            setCart(cart);
            return cart;
        }
        function setCart(cart) {
            localStorage.setItem("cart", JSON.stringify(cart));
        }

        $(document).on('click',".btnAddAction",function(){
			id = $(this).attr("data-id")
			image = $(this).attr("data-image")
			name = $(this).attr("data-name")
			code = $(this).attr("data-code")
            price = $(this).attr("data-price")
            userId=$(this).attr("data-user-id")
            let data1 = { id: id, image: image, name: name,code:code, price: price,status:"ยังไม่ชำระ"};
			cart = getCart(userId);
            cart = add(data1, cart, userId);
            setCart(cart);
            setHtml(cart[userId])
        })
        function checkStatus(cartC){
			for(let i in cartC){
                if(cartC[i].status=="ยังไม่ชำระ"){
                    cart = deleteProduct(cartC[i].id,cart,user_id)
                    setHtml(cart[user_id])
                }
            }
            setCart(cart)
        }
        function numPriceAll(cartS){
            var num=0
			for(let i in cartS){
                if(cartS[i].status=="ยังไม่ชำระ"){
                    num+=cartS[i].price
                }
            }
            return num;
		}
        $(document).on('click','.btnRemoveAction',function(){
			console.log("remove")
			let cart = getCart()
            id = $(this).attr("key")
            userId=$(this).attr("key-user")
            cart = deleteProduct(id,cart,userId)
            setHtml(cart[userId])
		})
        $(document).on('click','#btnEmpty',function(){
            cart = getCart(user_id);
            checkStatus(cart[user_id]); 
        })
        $(document).on('click','#btnCheckoutAction',function(){
            cart = getCart(user_id);
            priceAll=numPriceAll(cart[user_id])
            console.log(priceAll)
            if(priceAll==0){
                alert("โปรดเลือกสินค้า")
            }else{
                location.href="http://localhost/GameShop/index.php?controller=Product&action=checkOut";
            }
		})
})
</script>

<body>
    <br>
    <div align="right" style="width: 80%; margin:auto">
        <?php if(isset($_SESSION['username'])) : ?>
        <!-- <strong><?php echo $_SESSION['id'] ?></strong> -->
        <form name="logout" id="back" method="post" action=<?= Router::getSourcePath() . "logout.php"?>>
            <label><?php echo $_SESSION['username']?>&nbsp&nbsp</label>
            <button class="btn btn-reward" type="submit">Logout</button>
        </form>
        <?php endif ?>
    </div>

    <div id="shopping-cart">
        <h3 class="text-left" style="margin-left:5%"><b>Shopping Cart</b></h3>
        <div class="section-block summary" style='width: 90%; margin:auto'>
            <?php
						$pro = Product::findAll();
					?>
            <table class='table text-center bg-dark' style='width: 90%; margin:auto'>
                <thead>
                    <tr>
                        <th style="text-align:center;">Name</th>
                        <th style="text-align:left;">Code</th>
                        <th style="text-align:center;">Price</th>
                        <th style="text-align:center;">Status</th>
                    </tr>
                </thead>
                <tbody id="shopping-cart-body">
                    <!-- <tr>
								<td><img src="shoppingItem/my-time-at-portia.jpg" class="cart-item-image" />my time at portia</td>
								<td>789</td>
								<td  style="text-align:center;">$3000</td>
								<td style="text-align:center;"><a class="btnRemoveAction"><img src="Image/icon-delete.png" alt="Remove Item" /></a></td>
							</tr> -->

                </tbody>
            </table>
        </div>
        <br>
        <button type="submit" id="btnEmpty" class="btnEmpty" style='float:right; margin-right:5%'>Empty Cart</button>

        <button type="submit" class="btnCheckoutAction" id="btnCheckoutAction"
            style='float:right; margin-right:2%;'>Checkout</button>

    </div>
    <div id="product-grid">
        <h3 class="text-left" style="margin-left:5%"><b>Product</b></h3>
        <center>
            <div class="section-block summary" style='width: 90%; margin:auto'>
                <?php
				//print_r(($pro));
				foreach ($pro as $key => $value) {
				?>
                <div class="card">
                    <div class="product-item">

                        <div class="img-pro"><img src="<?php echo $pro[$key]["image"]; ?>" width=195px height=205px
                                style="border-top-left-radius:20%; border-top-right-radius:20%;"></div>
                        <p class="name-product"><b><?php echo $pro[$key]["name"]; ?></b>
                        <p>
                        <p class="price"><?php echo "$" . $pro[$key]["price"]; ?></p>
                        <div class="cart-action">
                            <input type="submit" value="Add to Cart" class="btnAddAction"
                                data-id="<?php echo $pro[$key]["id"] ?>" data-image="<?php echo $pro[$key]["image"] ?>"
                                data-name="<?php echo $pro[$key]["name"] ?>"
                                data-code="<?php echo $pro[$key]["code"] ?>"
                                data-price="<?php echo $pro[$key]["price"] ?>"
                                data-user-id=<?php echo $_SESSION['id'] ?> />
                        </div>
                    </div>
                </div>
                <?php
				}
				?>
            </div>
        </center>
    </div>

    <br><br>
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