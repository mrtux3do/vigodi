<div class="bread-crumbs">
	<div class="container">
		<div class="row">
			<div id="breadcrumbs">
				<ul>
					<li><a href="/">Home</a></li>
					<li><?php echo $name_category['Category']['category_name'] ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-3 side-left-bar form-list-product">
			<div class="title-bar title-product">
				<h2>Danh mục sản phẩm</h2>
			</div>
			<div class="content-side-bar">
				<div class="filter-group">
					<div class="add-filter filter-hbh">
						<a>Hàng Bách Hoá</a>
						<ul class="sub-filter sub-hbh">
							<?php foreach($category as $data): ?>
								<?php if($data['Category']['type'] == 1): ?>
									<a href="<?php echo $this->Html->url(array(
													'controller' => 'products', 
													'action' => 'listProduct', 
													'?' => array('category_id' => $data['Category']['id'])))?>"><li><?php echo $data['Category']['category_name'] ?></li></a>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="add-filter filter-hln">
						<a>Hàng Lưu Niệm</a>
						<ul class="sub-filter sub-hln">
							<?php foreach($category as $data): ?>
								<?php if($data['Category']['type'] == 2): ?>
									<a href="<?php echo $this->Html->url(array(
													'controller' => 'products', 
													'action' => 'listProduct', 
													'?' => array('category_id' => $data['Category']['id'])))?>"><li><?php echo $data['Category']['category_name'] ?></li></a>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>					
				</div>
				<div class="filter-price">
					<div class="box-price">
						<h2>Price</h2>
						<form>
							<div class="form-group">
								<input type="range" class="custom-range" id="formControlRange" min="10000" max="1000000" step="10000">
								<label id="val-price" style="float: right; margin-top: 15px;">500K</label>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-9">
			<?php echo $this->element('list_product'); ?>
		</div>
	</div>
</div>