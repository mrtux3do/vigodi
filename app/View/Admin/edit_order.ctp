<h4 class="pink">
    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
    <a href="#modal-table" role="button" class="green" data-toggle="modal"> Mã đơn hàng <?php echo "#".$order['Order']['id']; ?></a>
</h4>

<div class="hr hr-18 dotted hr-double"></div>


<form class="form-horizontal" action="<?php echo '/admin/editOrder/'.$order['Order']['id'];?>" method="POST"
      enctype="multipart/form-data" id="editUserFrm">
    <div class="tabbable">
        <div class="tab-content profile-edit-tab-content">
            <div id="edit-basic" class="tab-pane in active">
                <h4 class="header blue bolder smaller"><i class="fa fa-cubes" aria-hidden="true"></i>
                    Thông tin khách hàng</h4>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="name">Tên khách hàng</label>

                        <div class="col-sm-8">
                            <input class="col-xs-12 col-sm-10" type="text" name="name"
                                   id="name" value="<?php echo $order['Order']['name'];?>"/>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="address">Địa chỉ</label>

                        <div class="col-sm-8">
                            <input class="col-xs-12 col-sm-10" type="text" name="address"
                                   id="address" value="<?php echo $order['Order']['address'];?>"/>
                        </div>
                    </div>
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="phone">Số điện thoại</label>

                        <div class="col-sm-8">
                            <input class="col-xs-12 col-sm-10" type="text" name="phone"
                                   id="phone" value="<?php echo $order['Order']['phone'];?>"/>
                        </div>
                    </div>
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right"
                               for="role">Tình trạng đơn hàng</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="status" id="status" >
                                <option value=""> --- Lựa chọn trạng thái ---</option>
                                <option value="0" <?php echo $order['Order']['status'] == '0' ? 'selected' : '';?>> Đã tiếp nhận đơn hàng </option>
                                <option value="1" <?php echo $order['Order']['status'] == '1' ? 'selected' : '';?>> Đóng gói xong </option>
                                <option value="2" <?php echo $order['Order']['status'] == '2' ? 'selected' : '';?>> Đang vận chuyển </option>
                                <option value="3" <?php echo $order['Order']['status'] == '3' ? 'selected' : '';?>> Giao hàng thành công </option>
                                <option value="4" <?php echo $order['Order']['status'] == '4' ? 'selected' : '';?>> Giao hàng không thành công </option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit" id="update_profile_btn">
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

        </div>


</form>



<div class="hr hr-18 dotted hr-double"></div>

<script type="text/javascript">
    try{ace.settings.loadState('main-container')}catch(e){}
</script>

<div class="row">
    <div class="col-xs-12">

        <div class="row">
            <div class="col-xs-12">

                <div class="table-header">
                    Thông tin các sản phẩm
                </div>

                <!-- div.table-responsive -->

                <!-- div.dataTables_borderWrap -->
                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="center">Mã sản phẩm</th>
                            <th class="center">Chi tiết</th>
                            <th>Giá</th>
                            <th class="hidden-480">Số lượng</th>
                            <th>Giảm Giá</th>
                            <th class="right">Tạm tính</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php $sum = 0;?>
                        <?php foreach ($products as $val): ?>
                            <tr>
                                <td class="center"><?php echo $val['Product']['id'];?></td>
                                <td><a href="<?php echo "/products/detail?product_id=".$val['Product']['id'];?>" target="_blank"><?php echo $val['Product']['name'];?></a></td>
                                <td><?php echo $val['Product']['price'];?></td>
                                <td><?php echo $val['CartProduct']['number'];?></td>
                                <td><?php echo $val['Product']['sale_price'];?></td>
                                <td><?php echo $val['CartProduct']['number']*$val['Product']['price'].' '.'VND'; ?></td>
                            </tr>
                            <?php $sum += $val['CartProduct']['number']*$val['Product']['price'];?>
                        <?php endforeach;?>
                        <tr>
                            <td class="center"></td>
                            <td class="hidden-480"></td>
                            <td></td>
                            <td></td>
                            <td>Tổng tạm tính <br/> Phí vận chuyển <br/> <strong>Tổng cộng</strong> <br/></td>
                            <td class="right"><?php echo $sum;?> VND <br/> 0 VND<br/> <?php echo $sum;?> VND<br/></td>
                        </tr>

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

<style>
    #dynamic-table {
        border: none !important;
        border-left: 1px solid #000;
        border-collapse: collapse !important;

    }

</style>


<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .DataTable({
                    bAutoWidth: false,
                    "aoColumns": [
                        {"bSortable": false}, {"bSortable": false}, {"bSortable": false}, {"bSortable": false},{"bSortable": false},
                        {"bSortable": false}
                    ],
                    "aaSorting": [],



                    select: {
                        style: 'multi'
                    }
                });
    })
</script>