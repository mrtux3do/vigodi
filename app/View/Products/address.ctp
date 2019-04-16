<div class="bread-crumbs">
	<div class="container">
		<div class="row">
			<div id="breadcrumbs">
				<ul>
					<li><a href="/">Home</a></li>
					<li>Địa chỉ</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 style="margin-bottom: 20px">2. Địa chỉ giao hàng</h2>
			<p>Chọn địa chỉ giao hàng có sẵn bên dưới:</p>
			<div class="form-addr">
				<h2><?php echo $user['User']['name'] . ' ' . $user['User']['f_name']; ?></h2>
				<p>Dia chi:
					<?php if (isset($user['User']['address'])) {
						echo $user['User']['address'];
					} else echo "Chua co dia chi";?>
				</p>
				<p>Dien thoai:<?php echo $user['User']['phone']; ?></p>
				<a href="/products/infoCart?cart_id=<?php echo $cart_id;?>"><button class="btn-product" type="button" <?php if (!isset($user['User']['address'])){ ?> disabled class="btn-disable" <?php } ?>>Giao hàng đến địa chỉ này</button></a>
				<!-- <button class="btn-edit-addr" style="margin-left: 30px">Sửa</button> -->
			</div>
			<h2>Bạn muốn giao hàng đến địa chỉ khác? <a href="#" style="text-decoration: none; color: #006838">Thêm địa chỉ giao hàng mới</a></h2>
			<div class="form-add-addr">
				<div class="reg-form">
					<form method="POST", action="/products/address">
						<div class="form-group">
							<label class="required">First Name</label>
							<input type="text" name="first-name" required placeholder="First name">
						</div>
						<div class="form-group">
							<label class="required">Last Name</label>
							<input type="text" name="last-name" required placeholder="Last name">
						</div>
						<div class="form-group">
							<label class="required">Email</label>
							<input type="e-mail" name="e-mail" required placeholder="Email">
						</div>
						<div class="form-group">
							<label class="required">Phone Number</label>
							<input type="number" name="phone-number" required placeholder="Phone Number">
						</div>
						<div class="form-group">
							<label class="required">Addres</label>
							<input type="text" name="address" required placeholder="Addres">
						</div>
						<div class="form-group">
							<button type="submit" class="btn-add-addr">Giao đến địa chỉ này</button>
						</div>
					</form>
				</div>				
			</div>
		</div>
	</div>
</div>