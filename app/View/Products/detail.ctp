<div class="bread-crumbs">
	<div class="container">
		<div class="row">
			<div id="breadcrumbs">
				<ul>
					<li><a href="/">Home</a></li>
					<li><?php echo $data['Product']['name'] ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-5">
			<div class="img-product-detail">
				<img id="zoom-img" src="<?php echo $this->webroot.$data['Product']['image'] ?>">
				<div id="img-result" class="img-zoom-result"></div>
			</div>
			<p class="icon-zoom">Rê chuột để xem chi tiết ảnh sản phẩm</p>
		</div>
		<div class="col-lg-7">
			<div class="title-product-detail">
				<h2><?php echo $data['Product']['name']  ?></h2>
				<div class="rate-product">
					<div class="star star-on"></div>
					<div class="star star-on"></div>
					<div class="star star-on"></div>
					<div class="star star-on"></div>
					<div class="star star-on"></div>
				</div>
				<div class="product-price">
					<span class="old-price"><?php echo "VNĐ".$data['Product']['price'] ?></span>
					<span class="sale-price"><?php echo "VNĐ".$data['Product']['price'] ?></span>
				</div>
				<div class="des-product-detail">
					<p><?php echo $data['Product']['description'] ?></p>
				</div>
				<div class="quantity-product">
					<label>Số lượng</label>
					<div class="quantity-box">
						<input type="button" id="minus" value="-">
						<input type="text" name="quantity" value="1" size="2" id="input-quantity">
						<input type="button" id="plus" value="+">
					</div>
				</div>
				<div class="box-cart">
					<button class="add-to-cart">Add to cart</button>
					<button class="wish-list"></button>
				</div>	
			</div>
		</div>
	</div>
	<row>
		<div class="desc-product-detail">
			<ul class="detail-tabs">
				<li class="active">
					<a href="#tab-description" data-toggle="tab" aria-expanded="true">Description</a>
				</li>
				<li>
					<a href="#tab-review" data-toggle="tab" aria-expanded="false">Reviews</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab-description">
					<p><?php echo $data['Product']['description'] ?></p>
				</div>
				<div class="tab-pane" id="tab-review">
					<table class="box-review">
						<?php foreach($comments as $comment): ?>
							<tr>
								<td><?php echo $comment['User']['name']; ?></td>
								<td><?php echo $comment['Comment']['created_at']; ?></td>
							</tr>
							<tr>
								<td colspan="2">
									<p><?php echo $comment['Comment']['message']; ?></p>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
					<div class="comment">
						<?php if(isset($user)){ ?>			
							<h2>Để lại bình luận</h2>
							<form action="" method="">
								<textarea name="text" id="input-review" rows="10"></textarea>
								<button type="button" id="btn-cmt">Gửi bình luận</button>
							</form>						
						<?php } else { ?>
							<h2>Hãy đăng nhập để để lại bình luận</h2>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>		
	</row>
	<row>
		<div class="relate-product form-list-product">
			<div class="title-product">
				<h2>Sản phẩm liên quan</h2>
			</div>
			<div>
			<div class="relate-product-slide common-box owl-carousel owl-theme owl-loaded">
				<?php if(isset($relate)): ?>
					<?php foreach($relate as $val): ?>
						<div class="item-common-product">
							<div class="img-common-product">
								<a target="_blank" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'detail',$val['Product']['id']))?>">
									<img src="<?php echo $this->webroot.$val['Product']['image'] ?>">
								</a>
								<div class="product-flag">
									<div class="discount-percent-tag"> 20% </div>
									<div class="new-tag">New</div>
								</div>
							</div>
							<div class="desc-item-product">
								<h1>
									<a target="_blank" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'detail',$val['Product']['id']))?>"><?php echo $val['Product']['name'] ?></a>
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
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</row>
</div>
<script type="text/javascript">
	//Zoom image
	imageZoom("zoom-img", "img-result");
</script>