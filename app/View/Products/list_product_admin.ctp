
<script type="text/javascript">
    try{ace.settings.loadState('main-container')}catch(e){}
</script>

<div class="row">
    <div class="col-xs-12">
        <?php echo $this->Session->flash('good'); ?>
        <?php echo $this->Session->flash('bad'); ?>
        <div class="row">
            <div class="col-xs-12">

                <div class="table-header">
                    Danh sách đơn hàng
                </div>

                <!-- div.table-responsive -->

                <!-- div.dataTables_borderWrap -->
                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="center">Mã sản phẩm</th>
                            <th class="hidden-480">Hình ảnh</th>
                            <th class="hidden-480">Tên sản phẩm</th>
                            <th>Thể loại</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Giảm giá</th>
                            <th>Ghi chú</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($products as $val): ?>
                            <tr>
                                <td class="center"><?php echo $val['Product']['id'];?></td>
                                <td>
                                    <img src="<?php echo "/".$val['Product']['image']; ?>" style="height: 100px; width: 100px;"/>
                                </td>
                                <td><?php echo $val['Product']['name'];?></td>
                                <td><?php echo $val['Product']['type'];?></td>
                                <td style="width: 30%;"><?php echo $val['Product']['description'];?></td>
                                <td><?php echo $val['Product']['price'];?></td>
                                <td><?php echo $val['Product']['sale_price'];?></td>
                                <td></td>

                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons" product_id = "<?php echo $val['Product']['id'];?>">
                                        <a class="blue detailProduct" href="<?php echo '/products/detail?product_id='.$val['Product']['id']?>" target="_blank">
                                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                        </a>

                                        <a class="green editProduct" href="<?php echo '/products/editProduct/'.$val['Product']['id']?>">
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>

                                        <a class="red deleteProduct" href="<?php echo '/products/deleteProduct/'.$val['Product']['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?');">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>




<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .DataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                        null, { "bSortable": false }, null, null, { "bSortable": false }, null, null, null,
                        { "bSortable": false }
                    ],
                    "aaSorting": [],

                    select: {
                        style: 'multi'
                    }
                } );
    })
</script>

