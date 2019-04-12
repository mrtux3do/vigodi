<?php $type = array("SINGLE ORIGINS", "ORIGIN PLUS", "may tre dan", "ca phe", "nhau noni", "cao atiso", "lua to tam", "tui vi vai handmade", "thu len dan moc bang tay", "tui balo vi tho cam");?>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <form class="form-horizontal" action="<?php echo $this->action == 'addProduct' ? '/products/addProduct' : '/products/editProduct/'.$product['Product']['id']?>" method="POST" enctype="multipart/form-data">
            <div class="tabbable">
                <ul class="nav nav-tabs padding-16">
                    <li class="active">
                        <a data-toggle="tab" href="#edit-basic">
                            <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
                            <?php echo $this->action == 'addProduct' ? 'Thêm sản phẩm mới' : 'Chỉnh sửa sản phẩm';?>
                        </a>
                    </li>
                </ul>
                <div class="tab-content profile-edit-tab-content">
                    <div id="edit-basic" class="tab-pane in active">
                        <h4 class="header blue bolder smaller"><i class="fa fa-cubes" aria-hidden="true"></i>
                            Thông tin sản phẩm</h4>
                        <div class="row">
                            <div class="col-xs-12 col-sm-2 upload-profile-area">
                                <span class="profile-picture">
                                    <img class="editable img-responsive" alt="Vigodi Image"
                                         src="<?php echo $this->action == 'addProduct' ? '/img/no-photo.png' : '/'.$product['Product']['image']?>" id="image"/>
                                </span>
                                <div class="space space-10"></div>
                                <!-- Upload profile button -->
                                <div class="upload-btn-wrapper">
                                    <button class="btn btn-block btn-sm upload-file-btn">Upload hình ảnh</button>
                                    <input type="file" name="image" accept="image/*"/>
                                </div>
                                <p class="error-file-msg"></p>
                                <div id="upload_img_rule">
                                    <p><i>Kích thước tối đa: 10 MB</i></p>
                                    <p><i>Định dạng hỗ trợ: JPEG, PNG</i></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="name">Tên sản phẩm</label>

                                    <div class="col-sm-10">
                                        <input class="col-xs-12 col-sm-10" type="text" name="name"
                                               id="name" placeholder="Tên sản phẩm"
                                               value="<?php echo $this->action == 'addProduct' ? '' : $product['Product']['name']?>"/>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="price">Giá sản phẩm</label>

                                    <div class="col-sm-10">
                                        <input class="col-xs-12 col-sm-10" type="text" name="price"
                                               id="price" placeholder="Giá sản phẩm"
                                               value="<?php echo $this->action == 'addProduct' ? '' : $product['Product']['price']?>"/>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="sale_price">Giảm giá</label>

                                    <div class="col-sm-10">
                                        <input class="col-xs-12 col-sm-10" type="text" name="sale_price"
                                               id="sale_price" placeholder="Giảm giá"
                                               value="<?php echo $this->action == 'addProduct' ? '' : $product['Product']['sale_price']?>"/>
                                    </div>
                                </div>
                                <div class="space-4"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right"
                                           for="category_id">Danh mục sản phẩm</label>
                                    <div class="col-sm-3">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <?php foreach ($categories as $val) : ?>
                                            <option value="<?php echo $val['Category']['id']; ?>" <?php echo ($this->action == 'editProduct') && ($val['Category']['id'] == $product['Product']['category_id']) ? '' : 'selected'?>> <?php echo $val['Category']['category_name']; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <label class="col-sm-2 control-label no-padding-right socola_type"
                                           for="role">Loại sản phẩm</label>
                                    <div class="col-sm-3 socola_type">
                                        <select name="type" id="type" class="form-control">
                                            <?php foreach ($type as $val) : ?>
                                            <option value="<?php echo $val; ?>" <?php echo ($this->action == 'editProduct') && ($val == $product['Product']['type']) ? '' : 'selected'?>> <?php echo $val; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="description">Mô tả</label>

                                    <div class="col-sm-10">
                                        <textarea class="col-xs-12 col-sm-10" name="description"
                                                  id="description" placeholder="Mô tả sản phẩm"><?php echo $this->action == 'addProduct' ? '' : $product['Product']['description']?></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                    </button>
                    &nbsp; &nbsp;&nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<style>
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .upload-file-btn {
        border: 1px solid gray !important;
        color: gray;
        background-color: #1783af!important;
        padding: 4px 44px;
        border-radius: 4px;
        font-size: 16px;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
</style>
<script src="/js/edit_user.js"></script>
<script src="/js/main.js"></script>
