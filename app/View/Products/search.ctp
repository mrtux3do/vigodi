<div class="bread-crumbs">
	<div class="container">
		<div class="row">
			<div id="breadcrumbs">
				<ul>
					<li><a href="/">Home</a></li>
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
							<li>cà phê</li>
							<li>nhàu noni</li>
							<li>cao atiso</li>
							<a href="<?php echo $this->Html->url(array(
													'controller' => 'products', 
													'action' => 'listProduct', 
													'?' => array('category_id' => 1)))?>"><li>socola marou</li></a>
						</ul>
					</div>
					<div class="add-filter filter-hln">
						<a>Hàng Lưu Niệm</a>
						<ul class="sub-filter sub-hln">
							<li>mây tre đan, cói</li>
							<li>lụa tơ tằm</li>
							<li>túi, ví vải handmade</li>
							<li>thú len đan móc bằng tay</li>
							<a href="<?php echo $this->Html->url(array(
													'controller' => 'products', 
													'action' => 'listProduct', 
													'?' => array('category_id' => 2)))?>"><li>túi, balo, ví thổ cẩm</li></a>
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
			<?php if(isset($data)): ?>
				<?php echo $this->element('search'); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
