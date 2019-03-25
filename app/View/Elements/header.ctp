<div class="top-nav">
	<div class="container">
		<div class="row">
			<div id="content-header">
				<div id="lang-mo">
					<ul>
						<li id="language"> 
							<p class="eng"> EN </p>
							<p class="vi"> Vi </p> 
						</li>
						<li> USD </li>
					</ul>
				</div>

				<div id="menu-top" class="pull-right">
					<ul>
						<li>Help & Contact</li>
						<li>Order Status</li>
						<li id="myaccount">
							<p><?php if(!empty($user)) {
										echo $user['name'];
									} else {echo "My Account";}
							?></p>
							<ul id="account">
								<li> 
									<?php echo $this->Html->link( 'Register', 
										array(
											'controller' => 'Users',
											'action' => 'register',
											'full_base' => true
										)); 
									?>
								</li>
								<li> 
									<a class="btn-popup"> <?php if(!empty($user)) {
										echo $this->Html->link( 'Logout', 
												array(
													'controller' => 'Auth',
													'action' => 'logout',
													'full_base' => true
												)); 									
									} else {echo "Login";}
							?> </a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="header-inner">
	<div class="container">
		<div class="row">
		<div id="top-menu">
			<div class="row">
				<div id="logo" class="col-lg-2">
					<div>Vigodi</div>
				</div>

				<div id="search" class="col-lg-7">
					<input type="text" name="search" placeholder="Search for products...">
					<button class="btn-search"></button>
					<!-- <span id="all-category">All Categories</span> -->
				</div>

				<div id="cart-wish" class="col-lg-3">
					<ul>
						<li id="compare"><span>0</span></li>
						<li id="wishlist"><span>0</span></li>
						<li id="cart">
							<span>0</span>
						</li>
					</ul>
					<div class="cart-noti">
						Giỏ hàng của bạn đang rỗng!
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="menu">
	<div class="container">
		<div class="row">
		<div id="main-menu">
			<div class="col-lg-3 col-md-3" style="position: unset;">
				<div id="sort-category">
				<button>Danh mục sản phẩm</button>
				<div class="item-categories">
					<ul>
						<?php if(isset($category)): ?>
							<?php foreach($category as $data): ?>
								<li> <?php echo $data['Category']['category_name'] ?> </li>
							<?php endforeach; ?>
						<?php endif; ?>
					</ul>
				</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9" style="position: unset;">
				<ul class="drop-down">
				<li>Trang Chủ</li>
				<li id="menu-active" class="hbh">
					Hàng Bách hóa
					<div class="sub-menu-hbh">
						<div id="menu-hbh">
							<div>Cà phê</div>
							<div>Nhàu Noni</div>
							<div>Cao Atiso</div>
							<div>Socola Marou</div>
						</div>
					</div>
				</li>
				<li id="menu-active" class="hln">
					hàng lưu niệm
					<div class="sub-menu-hln">
						<div id="menu-hln">
							<div>Mây tre đan, Cói</div>
							<div>Lụa tơ tằm</div>
							<div>Túi, ví vải Handmade</div>
							<div>Thú len đan móc bằng tay</div>
							<div>Túi, ba lô, ví thổ cẩm</div>
						</div>
					</div>					
				</li>
				</ul>
			</div>
		</div>
		</div>
	</div>
</div>