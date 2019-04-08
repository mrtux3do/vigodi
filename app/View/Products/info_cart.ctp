<div class="bread-crumbs">
	<div class="container">
		<div class="row">
			<div id="breadcrumbs">
				<ul>
					<li><a href="/">Home</a></li>
					<li>Thông tin đơn hàng</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<div class="info-addr">
				<div class="form-addr" style="margin-top: 0">
					<h2 id="info-name"><?php echo $address['Address']['name'] . ' ' . $address['Address']['f_name'];?></h2>
					<p id="info-address"><?php echo $address['Address']['address']; ?></p>
					<p id="info-phone"><?php echo $address['Address']['phone']; ?></p>
					<p id="info-email"><?php echo $address['Address']['email']; ?></p>
				</div>				
			</div>
		</div>
		<div class="col-lg-6">
				<div class="info-product form-list-product">
					<div class="title-product">
						<h2>Tổng quan đơn hàng</h2>
					</div>
					<div class="list-info-price">
						<span>Tạm tính:</span>
						<strong><?php echo $total;?>.000VND</strong>
					</div>
					<div class="amount-info-price">
						<span>Thành tiền:</span>
						<strong><?php echo $total;?>.000VND</strong>
						<div>(Đã bao gồm VAT)</div>
					</div>
				</div>
		</div>
	</div>
	<div class="row">
		<div id="btn-checkout-ok">
			<button class="btn-checkout-ok">
				Đặt mua
			</button>
		</div>
	</div>
</div>

<div class="popup-cart">
	<div class="pop-up-content" style="padding: 20px 40px; text-align: center;">
		<span style="display: block; margin-bottom: 20%; position: relative;"></span>
		<h2>Chúc mừng bạn đã đặt hàng thành công, Mã đơn hàng của bạn là 01234567</h2>
		<button class="btn-back">Quay lại</button>
	</div>
</div>