
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

                <div class="row">
                    <div class="col-xs-12">

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

                                                    <select name="role_id" id="role" class="selection form-control" style="display: none">
                                                        <option value=""> --- Lựa chọn trạng thái ---</option>
                                                        <option value="0" selected> Đã tiếp nhận đơn hàng </option>
                                                        <option value="1"> Đóng gói xong </option>
                                                        <option value="2"> Đang vận chuyển </option>
                                                        <option value="3"> Giao hàng thành công </option>
                                                        <option value="4"> Giao hàng không thành công </option>
                                                    </select>
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
                                                        <a class="blue detailOrder basicButton-<?php echo $val['Order']['id'];?>" href="#">
                                                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                        </a>

                                                        <a class="green editOrder basicButton-<?php echo $val['Order']['id'];?>" href="#">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red deleteOrder basicButton-<?php echo $val['Order']['id'];?>" href="#">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>

                                                        <a class="blue saveOrder-<?php echo $val['Order']['id'];?> editButton-<?php echo $val['Order']['id'];?>" style="display: none" href="#">
                                                            <i class="ace-icon fa fa-check bigger-130"></i>
                                                        </a>

                                                        <a class="red cancelOrder-<?php echo $val['Order']['id'];?> editButton-<?php echo $val['Order']['id'];?>" style="display: none" href="#">
                                                            <i class="ace-icon fa fa-remove bigger-130"></i>
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
                        { "bSortable": false },
                        null, null, null, null, null, null, null, null,
                        { "bSortable": false }
                    ],
                    "aaSorting": [],


                    //"bProcessing": true,
                    //"bServerSide": true,
                    //"sAjaxSource": "http://127.0.0.1/table.php"	,

                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,

                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                    //"iDisplayLength": 50


                    select: {
                        style: 'multi'
                    }
                } );



        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
            buttons: [
                {
                    "extend": "colvis",
                    "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                    "className": "btn btn-white btn-primary btn-bold",
                    columns: ':not(:first):not(:last)'
                },
                {
                    "extend": "copy",
                    "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "csv",
                    "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "excel",
                    "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "pdf",
                    "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "print",
                    "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                    "className": "btn btn-white btn-primary btn-bold",
                    autoPrint: false,
                    message: 'This print was produced using the Print button for DataTables'
                }
            ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );

        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
            defaultCopyAction(e, dt, button, config);
            $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        });


        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {

            defaultColvisAction(e, dt, button, config);


            if($('.dt-button-collection > .dropdown-menu').length == 0) {
                $('.dt-button-collection')
                    .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                    .find('a').attr('href', '#').wrap("<li />")
            }
            $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        });

        ////

        setTimeout(function() {
            $($('.tableTools-container')).find('a.dt-button').each(function() {
                var div = $(this).find(' > div').first();
                if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                else $(this).tooltip({container: 'body', title: $(this).text()});
            });
        }, 500);

        myTable.on( 'select', function ( e, dt, type, index ) {
            if ( type === 'row' ) {
                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
            }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
            if ( type === 'row' ) {
                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
            }
        } );


        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header

            $('#dynamic-table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) myTable.row(row).select();
                else  myTable.row(row).deselect();
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
            var row = $(this).closest('tr').get(0);
            if(this.checked) myTable.row(row).deselect();
            else myTable.row(row).select();
        });



        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();
        });



        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
            var $row = $(this).closest('tr');
            if($row.is('.detail-row ')) return;
            if(this.checked) $row.addClass(active_class);
            else $row.removeClass(active_class);
        });



        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }



        $(".detailOrder").on('click', function () {
            var order_id = $(this).parents('.action-buttons').attr('order_id');

            $.ajax({
                method: 'POST',
                url: '/Admin/detailOrder/',
                dataType: 'json',
                data: {
                    order_id: order_id
                },
                success: function(response) {
                    location.href = '/Admin/detailOrder/'+order_id+'';
                },
                error: function(xhr, status, err) {

                },
            });
        });

        $(".editOrder").on('click', function () {
            var order_id = $(this).parents('.action-buttons').attr('order_id');

            $(".status-"+order_id).find('.label').hide();
            $(".status-"+order_id).find('.selection').show();

            $(".basicButton-"+order_id).hide();
            $(".editButton-"+order_id).show();

            $(".saveOrder-"+order_id).off().on('click', function () {
                var status = $(".status-"+order_id).find('.selection option:selected' ).val();

                $.ajax({
                    method: 'POST',
                    url: '/Admin/editOrder/'+order_id+'',
                    dataType: 'json',
                    data: {
                        order_id: order_id,
                        status: status
                    },
                    success: function(response) {
                        switch(status) {
                            case '0':
                                $(".status-"+order_id).append('<span class="label label-sm label-primary">Đã tiếp nhận đơn hàng</span>');
                                break;
                            case '1':
                                $(".status-"+order_id).append('<span class="label label-sm label-info">Đóng gói xong</span>');
                                break;
                            case '2':
                                $(".status-"+order_id).append('<span class="label label-sm label-warning">Đang vận chuyển</span>');
                                break;
                            case '3':
                                $(".status-"+order_id).append('<span class="label label-sm label-success">Giao hàng thành công</span>');
                                break;
                            default:
                                $(".status-"+order_id).append('<span class="label label-sm label-danger">Giao hàng không thành công</span>');
                        }

                        $(".status-"+order_id).find('.selection').hide();

                        $(".basicButton-"+order_id).show();
                        $(".editButton-"+order_id).hide();
                    },
                    error: function(xhr, status, err) {

                    },
                });
            });

            $(".cancelOrder-"+order_id).off().on('click', function () {
                $(".status-"+order_id).find('.label').show();
                $(".status-"+order_id).find('.selection').hide();

                $(".basicButton-"+order_id).show();
                $(".editButton-"+order_id).hide();
            })


        });

        $(".deleteOrder").on('click', function () {

            var order_id = $(this).parents('.action-buttons').attr('order_id');

            $.ajax({
                method: 'POST',
                url: '/Admin/deleteOrder/',
                dataType: 'json',
                data: {
                    order_id: order_id
                },
                success: function(response) {
                    if (response.status == true) {
                        alert("delete success");
                        location.href = "/admin/listCart";
                    }
                },
                error: function(xhr, status, err) {

                },
            });
        });
    })
</script>

