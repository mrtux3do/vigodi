<?php
$status = '';
switch ($order['Order']['status']) {
    case '0':
        $status = 'Đã tiếp nhận đơn hàng';
        break;
    case '1':
        $status = 'Đóng gói xong';
        break;
    case '2':
        $status = 'Đang vận chuyển';
        break;
    case '3':
        $status = 'Giao hàng thành công';
        break;
    default:
        $status = 'Giao hàng không thành công';
}
?>
<h4 class="pink">
    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
    <a href="#modal-table" role="button" class="green" data-toggle="modal"> Mã đơn hàng <?php echo "#".$order['Order']['id']; ?> - <strong><?php echo $status; ?></strong></a>
</h4>

<div class="hr hr-18 dotted hr-double"></div>
<div class="row">
    <div class="col-sm-4">
        <div class="row">
            <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                <b>Thông tin khách hàng</b>
            </div>
        </div>

        <div class="space-12"></div>
        <div class="row">
        <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
                <div class="profile-info-name"> Tên khách hàng </div>

                <div class="profile-info-value">
                    <span class="editable" id="username"><?php echo $order['Order']['name']; ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Địa chỉ </div>

                <div class="profile-info-value">
                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                    <span class="editable" id="country"><?php echo $order['Order']['address']; ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Email </div>

                <div class="profile-info-value">
                    <span class="editable" id="age"><?php echo $order['Order']['email']; ?></span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> Số điện thoại </div>

                <div class="profile-info-value">
                    <span class="editable" id="signup"><?php echo $order['Order']['phone']; ?></span>
                </div>
            </div>
        </div>
        </div>
    </div><!-- /.col -->
</div>


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