<div class="category-info">
	<div class="category-img">
		<img src="<?php echo $this->webroot ?>img/banner-category.jpg">
	</div>
	<h2><?php echo $name_category['Category']['category_name'] ?></h2>
</div>

<div class="custom-category">
	<div class="toolbar-product">
		<div class="toolbar-amount">
			<span><?php echo $this->Paginator->counter('Hiển thị {:start} đến {:end} sản phẩm ({:pages} trang)' ); ?></span>
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
		<?php foreach($data as $val): ?>
			<div class="product-grid item col-lg-3">
				<div class="item-common-product">
					<div class="img-common-product">
						<a href="<?php echo $this->Html->url(array(
															'controller' => 'products', 
															'action' => 'detail', 
															'?' => array('product_id' => $val['Product']['id'])))?>">
							<img style="width: 100%" src="<?php echo $this->webroot.$val['Product']['image'] ?>">
						</a>
					</div>
					<div class="desc-item-product">
						<h1 style="height: 30px;">
							<a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'detail', '?' => array('product_id' => $val['Product']['id'])))?>"><?php echo $val['Product']['name'] ?></a>
						</h1>
						<div class="rate-product">
							<div class="star star-on"></div>
							<div class="star star-on"></div>
							<div class="star star-on"></div>
							<div class="star star-on"></div>
							<div class="star star-on"></div>
						</div>
						<div class="product-price">
							<span class="old-price"><?php echo "VNĐ".$val['Product']['price'] ?></span>
							<span class="sale-price"><?php echo "VNĐ".$val['Product']['price'] ?></span>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>		
	</div>

	<div class="toolbar-product">
		<div class="toolbar-amount">
			<span><?php echo $this->Paginator->counter('Hiển thị {:start} đến {:end} sản phẩm ({:pages} trang)' ); ?></span>
		</div>
		<div class="page">
			<ul class="pagination">
				<?php echo $this->Paginator->prev(__(''), array('tag' => 'li')); ?>
				<?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '')); ?>
				<?php echo $this->Paginator->next(__(''), array('tag' => 'li')); ?>
			</ul>
		</div>		
	</div>
</div>