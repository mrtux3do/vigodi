<div class="row user-add-basic">
    <div class="col-xs-12 add-user-pg-header">
        <h4>Thông tin cơ bản</h4>
        <div>
            <small>Tất cả các trường có dấu (*) là bắt buộc</small>
        </div>

        <form class="form-horizontal" id="validation-form" method="post">

            <div class="space-20"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="f_name">Họ <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="text" id="f_name" name="f_name" class="col-xs-12 col-sm-4" />
                    </div>
                </div>
            </div>

            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Tên <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="text" id="name" name="name" class="col-xs-12 col-sm-4" />
                    </div>
                </div>
            </div>

            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right">Giới tính</label>

                <div class="col-sm-8 gender-area">
                    <label class="inline">
                        <input name="gender" type="radio" class="ace" value="Male"/>
                        <span class="lbl middle"> Name</span>
                    </label>
                    &nbsp; &nbsp; &nbsp;
                    <label class="inline">
                        <input name="gender" type="radio" class="ace" value="Female"/>
                        <span class="lbl middle"> Nữ</span>
                    </label>
                </div>
            </div>

            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="email" name="email" id="email" class="col-xs-12 col-sm-4" />
                    </div>
                    <div class="existed_email_err"></div>
                </div>
            </div>

            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Mật khẩu <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="password" name="password" id="password" class="col-xs-12 col-sm-4" />
                    </div>
                </div>
            </div>

            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="re-password">Xác thực mật khẩu <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="password" name="password2" id="re-password" class="col-xs-12 col-sm-4" />
                    </div>
                </div>
            </div>

            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Số điện thoại</label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="text" name="phone" id="phone" class="col-xs-12 col-sm-4" />
                    </div>
                </div>
            </div>

            <div class="space-10"></div>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="user_role_id">Quyền <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <select class="col-xs-12 col-sm-4" name="user_role_id" id="user_role_id" data-placeholder="Choose a role...">
                            <option value="">Lựa chọn quyền...</option>
                            <option value="2">Quản trị viên</option>
                            <option value="1">Người dùng</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="space-10"></div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info user-add-btn" data-last="Finish" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                    </button>

                    <button class="btn user-reset-btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div><!-- /.col -->
</div><!-- /.row -->
