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
			<div class="product-grid item col-lg-3">
				<div class="item-common-product">
					<div class="img-common-product">
						<a target="_blank" href="">
							<img style="width: 100%" src="">
						</a>
					</div>
					<div class="desc-item-product">
						<h1 style="height: 30px;">
							<a target="_blank" href=""></a>
						</h1>
						<div class="rate-product">
							<div class="star star-on"></div>
							<div class="star star-on"></div>
							<div class="star star-on"></div>
							<div class="star star-on"></div>
							<div class="star star-on"></div>
						</div>
						<div class="product-price">
							<span class="old-price"></span>
							<span class="sale-price"></span>
						</div>
					</div>
				</div>
			</div>				
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