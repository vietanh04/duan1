<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
			<table  class="table table-condensed">
    <thead>
        <tr class="cart_menu">
            <th class="image">STT</th>
           
            <th class="description">Tên Sản Phẩm</th>
			 <th class="image">Ảnh</th>
            <th class="price">Giá</th>
            <th class="quantity">Số Lượng</th>
            <th class="total">Thành Tiền</th>
            <!-- <th class="total">Chức Năng</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        // Bắt đầu session
        // Kiểm tra xem giỏ hàng có sản phẩm không
        if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
            $i = 1;
            foreach ($_SESSION['giohang'] as $item) {
                $tt = $item[3] * $item[4];
                echo '<tr>
                        <td class="image">' . $i . '</td>
                        <td class="description">' . $item[1] . '</td>
                        <td class="image"><img src="' . $item[2] . '" alt="Product Image"></td>
                        <td class="price">' . $item[3] . '</td>
						
                         <td class="quantity">' . $item[4] . '</td>
                        <td class="total">' . $tt . '</td>
                        <td class="total">
                            <!-- Các chức năng hoặc nút xóa sản phẩm -->
                            <!-- ... -->
                        </td>
                    </tr>';
                $i++;
            }
        }
        ?>
        <tr>
            <td colspan="7">
                <a href="index.php?act=delcart">XÓA giỏ hàng</a>
				<a href="index.php">Tiếp tục mua hàng</a>
            </td>
        </tr>
    </tbody>
</table>
			</div>
		</div>
	<!-- </section> /#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Bạn Muốn Làm Gì Tiếp Theo ?</h3>
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Giá sản phẩm<span>$59</span></li>
							<li>Phí vận chuyển<span>Free</span></li>
							<li>Tổng tiền <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>