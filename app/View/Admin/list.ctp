
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
                                    <th class="center">Mã đơn hàng</th>
                                    <th class="hidden-480">Tình Trạng</th>
                                    <th>
                                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                        Ngày tạo
                                    </th>
                                    <th class="hidden-480">Đơn Giá</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Điện Thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Ghi chú</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($data as $val): ?>
                                    <tr>
                                        <td class="center"><?php echo $val['Order']['id'];?></td>
                                        <td class="hidden-480 status-<?php echo $val['Order']['id'];?>">
                                            <?php if ($val['Order']['status'] === '0'): ?>
                                                <span class="label label-sm label-primary">Đã tiếp nhận đơn hàng</span>
                                            <?php elseif ($val['Order']['status'] === '1'): ?>
                                                <span class="label label-sm label-info">Đóng gói xong</span>
                                            <?php elseif ($val['Order']['status'] === '2'): ?>
                                                <span class="label label-sm label-warning">Đang vận chuyển</span>
                                            <?php elseif ($val['Order']['status'] === '3'): ?>
                                                <span class="label label-sm label-success">Giao hàng thành công</span>
                                            <?php else: ?>
                                                <span class="label label-sm label-danger">Giao hàng không thành công</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $val['Order']['created_at'];?></td>
                                        <td>$45</td>
                                        <td><?php echo $val['Order']['name'];?></td>
                                        <td><?php echo $val['Order']['email'];?></td>
                                        <td class="hidden-480"><?php echo $val['Order']['phone'];?></td>
                                        <td><?php echo $val['Order']['address'];?></td>
                                        <td>abc</td>
                                        <td>
                                            <div class="hidden-sm hidden-xs action-buttons" order_id = "<?php echo $val['Order']['id'];?>">
                                                <a class="blue detailOrder basicButton-<?php echo $val['Order']['id'];?>" href="<?php echo '/admin/detailOrder/'.$val['Order']['id']?>">
                                                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                </a>

                                                <a class="green editOrder basicButton-<?php echo $val['Order']['id'];?>" href="<?php echo '/admin/editOrder/'.$val['Order']['id']?>">
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a class="red deleteOrder basicButton-<?php echo $val['Order']['id'];?>" href="<?php echo '/admin/deleteOrder/'.$val['Order']['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xoá đơn hàng này?');">
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
                .DataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                        null, null, null, { "bSortable": false }, null, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false },
                        { "bSortable": false }
                    ],
                    "aaSorting": [],

                    select: {
                        style: 'multi'
                    }
                } );

    })
</script>

