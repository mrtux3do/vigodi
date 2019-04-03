<div class="bread-crumbs">
	<div class="container">
		<div class="row">
			<div id="breadcrumbs">
				<ul>
					<li><a href="/">Home</a></li>
					<li>Giỏ hàng</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-9 form-cart">
			<table>
				<thead>
					<tr>
						<th>Hình ảnh</th>
						<th>Tên sản phẩm</th>
						<th>Đơn giá</th>
						<th>Số lượng</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<a href="#">
								<img src="<?php echo $this->webroot ?>img/R_BR76.png">
							</a>
						</td>
						<td style="text-transform: capitalize; text-align: center;">
							Socola marou bà rịa 76%
						</td>
						<td style="text-align: center;">
							30.000VND
						</td>
						<td>
							<div class="quantity-product" style="vertical-align: top;">
								<div class="quantity-box">
									<input type="button" id="minus" value="-">
									<input type="text" name="quantity" value="1" size="2" id="input-quantity">
									<input type="button" id="plus" value="+">
								</div>
								<div class="form-del">
									<label>Xoá</label>
									<button class="btn-del-cart"></button>
								</div>
							</div>
						</td>
					</tr>				
				</tbody>
			</table>
		</div>

		<div class="col-lg-3 total-price form-list-product">
			<div class="title-product">
				<h2>Tổng quan đơn hàng</h2>
			</div>
			<div class="list-info-price">
				<span>Tạm tính:</span>
				<strong>30.000VND</strong>
			</div>
			<div class="amount-info-price">
				<span>Thành tiền:</span>
				<strong>30.000VND</strong>
				<div>(Đã bao gồm VAT)</div>
			</div>
			<a href="/products/address"> <button class="btn-checkout">
				Tiến hành đặt hàng
			</button> </a>
		</div>
	</div>
</div>