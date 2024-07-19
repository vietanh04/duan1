

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
					<?php 
					if(isset($_SESSION['user'])){
						extract($_SESSION['user']);
					
					?>
					<div>
						<p>bạn đã đang nhap với tài khoản <?= $ten_tk?></p><br>
						<li>
							<a href="index.php?act=dangxuat">Đăng xuất</a>
						</li>

					</div>
					<?php 
					}else {
					?>
						<h2>Login to your account</h2>
						<form action="index.php?act=dangnhap" method="POST">
							<input type="text" placeholder="tên tài khoản" name="ten_tk" />
							<input type="password" placeholder="password" name="matkhau" />
							<span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default" name="dangnhap">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<li>
							
							<a href="index.php?act=dangky">Đăng ky tai khoan</a>
						</li>
					</div><!--/sign up form-->
				</div>
				<?php }		 ?>
			</div>
		</div>
	</section><!--/form-->


