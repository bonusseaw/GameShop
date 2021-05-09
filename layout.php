<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="unititled">
	<meta name="keywords" content="HTML5 Crowdfunding Profile Template">
    <meta name="author" content="Audain Designs">
    <link rel="shortcut icon" href="favicon.ico">  
    <!-- Gobal CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Template CSS -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!--Fonts-->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <title>Game Shop</title>
    
</head>
<body>
<div class="wrapper">
    <div id="header">
        <?php include("Templates/header.inc.php"); //หาไม่เจอ จะหาที่โฟลเดอร์เดียวกัน ?>
    </div>
    
    <div id="content">
            <?= $content ?>
    </div>

    <div id="footer">
        <?php include("Templates/footer.inc.php"); ?>
    </div>
</div>
</body>
</html>