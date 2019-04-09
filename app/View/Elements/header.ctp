<div class="top-nav">
	<div class="container">
		<div class="row">
			<div id="content-header">
<!-- 				<div id="lang-mo">
					<ul>
						<li id="language"> 
							<p class="eng"> EN </p>
							<p class="vi"> Vi </p> 
						</li>
						<li> USD </li>
					</ul>
				</div> -->

				<div id="menu-top" class="pull-right">
					<ul>
						<li>Hỗ Trợ</li>
						<li id="myaccount">
							<p><?php if(!empty($infoUser)) {
										echo $infoUser['name'] . ' ' . $infoUser['f_name'];
									} else {echo "Đăng nhập/Đăng Ký";}
							?></p>
							<ul id="account">
								<li> 
									<?php if(empty($infoUser)) {
										echo $this->Html->link( 'Đăng Ký', 
											array(
												'controller' => 'Users',
												'action' => 'register',
												'full_base' => true
											)); 
										}
									?>
								</li>
								<li> 
									<a class="btn-popup"> <?php if(!empty($infoUser)) {
										echo $this->Html->link( 'Logout', 
												array(
													'controller' => 'Auth',
													'action' => 'logout',
													'full_base' => true
												)); 									
									} else {echo "Đăng Nhập";}
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
			<!-- <div class="row"> -->
				<div id="logo" class="col-lg-2">
					<a href="/"><div style="color: red">Vi<span style="color: green">Go</span>Di</div></a>
				</div>

				<div id="search" class="col-lg-7">
					<form method="GET" action="/products/search">
						<input class="input-search" type="text" name="search" placeholder="Nhập để tìm kiếm...">
						<button class="btn-search"></button>
					</form>
				</div>

				<div id="cart-wish" class="col-lg-3">
					<ul>
						<li id="compare"><span>0</span></li>
						<li id="wishlist"><span>0</span></li>
						<li id="cart">
							<span id="cart-number"><?php if (isset($cart)) { echo $cart; } else {echo 0;} ?></span>
						</li>
					</ul>
					<div class="cart-noti">
						Giỏ hàng của bạn đang rỗng!
					</div>
				</div>
			<!-- </div> -->
		</div>
		</div>
	</div>
</div>
<div class="menu">
	<div class="container">
		<div class="row">
		<div id="main-menu">
			<div class="col-lg-3" style="position: unset;">
				<div class="row">
					<div id="sort-category">
					<button>Danh mục sản phẩm</button>
					<div class="item-categories">
						<ul>
							<?php if(isset($category)): ?>
								<?php foreach($category as $data): ?>
									<a href="<?php echo $this->Html->url(array(
														'controller' => 'products', 
														'action' => 'listProduct', 
														'?' => array('category_id' => $data['Category']['id'])))?>"><li> <?php echo $data['Category']['category_name'] ?> </li></a>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 menu-normal" style="position: unset;">
				<div class="row">
					<ul class="drop-down">
					<li><a href="/" style="text-decoration: none; color: #000; font-size: 15px">Trang Chủ</a></li>
					<li id="menu-active" class="hbh">
						Hàng Bách hóa
						<div class="sub-menu-hbh">
							<div id="menu-hbh">
								<?php foreach($category as $data): ?>
									<?php if($data['Category']['type'] == 1): ?>
										<a href="<?php echo $this->Html->url(array(
														'controller' => 'products', 
														'action' => 'listProduct', 
														'?' => array('category_id' => $data['Category']['id'])))?>"><div><?php echo $data['Category']['category_name'] ?></div></a>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</li>
					<li id="menu-active" class="hln">
						hàng lưu niệm
						<div class="sub-menu-hln">
							<div id="menu-hln">
								<?php foreach($category as $data): ?>
									<?php if($data['Category']['type'] == 2): ?>
										<a href="<?php echo $this->Html->url(array(
														'controller' => 'products', 
														'action' => 'listProduct', 
														'?' => array('category_id' => $data['Category']['id'])))?>"><div><?php echo $data['Category']['category_name'] ?></div></a>
									<?php endif; ?>
								<?php endforeach; ?>	
							</div>
						</div>					
					</li>
					</ul>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>