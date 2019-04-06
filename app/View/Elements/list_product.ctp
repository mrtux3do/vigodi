<div class="category-info">
	<div class="category-img">
		<img src="<?php echo $this->webroot ?>img/banner-category.jpg">
	</div>
	<h2>Socola marou</h2>
</div>

<div class="custom-category">
	<div class="toolbar-product">
		<div class="toolbar-amount">
			<span>1 đến 16 sản phẩm (2 trang)</span>
		</div>
		<div class="toolbar-limit" style="display: none;">
			<select class="input-limit">
				<option selected="selected">Hiển thị: 16</option>
				<option>Hiển thị: 32</option>
			</select>
		</div>
		<div class="toolbar-sorter">
			<select class="input-sort">
				<option selected="selected">Tìm Kiếm: Mặc Định </option>
				<option>Tìm Kiếm: Theo Tên(A - Z)</option>
				<option>Tìm Kiếm: Theo Tên(Z - A)</option>
				<option>Tìm Kiếm: Theo Giá(Cao - Thấp)</option>
				<option>Tìm Kiếm: Theo Tên(Thấp - Cao)</option>
			</select>			
		</div>
	</div>

	<div class="custom-list-product">
		<?php foreach($data as $res): ?>
			<div class="product-grid item col-lg-3">
				<div class="item-common-product">
					<div class="img-common-product">
						<a target="_blank" href="/products/detail?product_id=<?php echo $res['Product']['id'] ?>">
							<img style="width: 100%" src="/<?php echo $res['Product']['image'] ?>">
						</a>
					</div>
					<div class="desc-item-product">
						<h1 style="height: 30px;">
							<a target="_blank" href="/products/detail?product_id=<?php echo $res['Product']['id'] ?>"><?php echo $res['Product']['name'] ?></a>
						</h1>
						<div class="rate-product">
							<div class="star star-on"></div>
							<div class="star star-on"></div>
							<div class="star star-on"></div>
							<div class="star star-on"></div>
							<div class="star star-on"></div>
						</div>
						<div class="product-price">
							<span class="old-price"><?php echo $res['Product']['price'] ?>VND</span>
							<span class="sale-price"><?php echo $res['Product']['sale_price'] ?>VND</span>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>				
	</div>

	<div class="toolbar-product">
		<div class="toolbar-amount">
			<span>1 đến 16 sản phẩm (2 trang)</span>
		</div>
		<div class="page">
			<ul class="pagination">
				<?php echo $this->Paginator->prev(__(''), array('tag' => 'li')); ?>
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<?php echo $this->Paginator->next(__(''), array('tag' => 'li')); ?>
			</ul>
		</div>		
	</div>
</div>