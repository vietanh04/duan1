

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
	
				<div class="col-sm-4">
					<div class="login-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="index.php?act=dangky" method="post">
							<input type="text" placeholder="Tên đăng nhập" name="ten_tk" />
							<input type="password" placeholder="Password" name="matkhau" />
							<input type="email" placeholder="Email Address" name="email" />
							<button type="submit" class="btn btn-default" name="dangky">Signup</button>
							<?php
							if (isset($thongbao) && ($thongbao != "")) {
								echo $thongbao;
							}
							?>
							<div>
								<li>
									<a href="index.php?act=dangnhap">Đăng nhập</a>
								</li>
							</div>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

