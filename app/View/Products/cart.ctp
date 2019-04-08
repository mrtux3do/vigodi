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
				<tbody class="cart-id" card_id="<?php echo $cart_id?>">
					<?php if(isset($products)): ?>
					<?php foreach($products as $val): ?>
					<tr>
						<td>
							<a href="#">
								<img src="<?php echo $this->webroot . $val['Product']['image'];?>">
							</a>
						</td>
						<td style="text-transform: capitalize; text-align: center;">
							<?php echo $val['Product']['name'];?>
						</td>
						<td style="text-align: center;">
							<?php echo $val['Product']['sale_price'];?>
						</td>
						<td>
							<div class="quantity-product" style="vertical-align: top;" cart_product_id="<?php echo $val['CartProduct']['id']; ?>">
								<div class="quantity-box">
									<input type="button" class="cart-minus" value="-">
									<input type="text" name="quantity" value="<?php echo $val['Product']['number'];?>" size="2" class="cart-input-quantity">
									<input type="button" class="cart-plus" value="+">
								</div>
								<div class="form-del">
									<label>Xoá</label>
									<button class="btn-del-cart"></button>
								</div>
							</div>
						</td>
					</tr>
					<?php endforeach; ?>
					<?php endif; ?>					
				</tbody>
			</table>
		</div>

		<div class="col-lg-3 total-price form-list-product">
			<div class="title-product">
				<h2>Tổng quan đơn hàng</h2>
			</div>
			<div class="list-info-price">
				<span>Tạm tính:</span>
				<strong class="cart-total"><?php echo $total;?> VND</strong>
			</div>
			<div class="amount-info-price">
				<span>Thành tiền:</span>
				<strong class="cart-total"><?php echo $total;?> VND</strong>
				<div>(Đã bao gồm VAT)</div>
			</div>
			<a href="/products/address?cart_id=<?php echo $cart_id;?>"> <button class="btn-checkout">
				Tiến hành đặt hàng
			</button> </a>
		</div>
	</div>
</div>