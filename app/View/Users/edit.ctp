
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <?php echo $this->Session->flash('bad'); ?>
        <form class="form-horizontal" action="/users/edit/1" method="POST"
              enctype="multipart/form-data" id="editUserFrm">
            <div class="tabbable">
                <ul class="nav nav-tabs padding-16">
                    <li class="active">
                        <a data-toggle="tab" href="#edit-basic">
                            <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
                            Thông tin khách hàng
                        </a>
                    </li>
                </ul>
                <div class="tab-content profile-edit-tab-content">
                    <div id="edit-basic" class="tab-pane in active">
                        <h4 class="header blue bolder smaller"><i class="fa fa-cubes" aria-hidden="true"></i>
                            Thông tin cá nhân</h4>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="f_name">Họ</label>

                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" name="f_name"
                                               id="f_name" placeholder="Fullname"
                                               value="<?php echo $user['User']['f_name'];?>"/>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="name">Tên</label>

                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" name="name"
                                               id="name" placeholder="Fullname"
                                               value="<?php echo $user['User']['name'];?>"/>
                                    </div>
                                </div>
                                <div class="space-4"></div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right">Giới tính</label>

                                    <div class="col-sm-8 gender-area">
                                        <label class="inline">
                                            <input name="gender" type="radio" class="ace"
                                                   value="Male" checked/>
                                            <span class="lbl middle"> Name</span>
                                        </label>
                                        &nbsp; &nbsp; &nbsp;
                                        <label class="inline">
                                            <input name="gender" type="radio" class="ace"
                                                   value="Female"/>
                                            <span class="lbl middle"> Nữ</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="space-4"></div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right"
                                           for="role">Role</label>
                                    <div class="col-sm-3">
                                        <select name="role_id" id="role" class="form-control">
                                            <option value=""> --- Select role ---</option>
                                            <option value="Developer" selected> Developer </option>
                                            <option value="Developer"> Admin </option>
                                            <option value="Developer"> User </option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-4 upload-profile-area">
                                <span class="profile-picture">
                                    <img class="editable img-responsive" alt="User Profile"
                                         src="/img/user-icon.png" id="img-profile"/>
                                </span>
                                <div class="space space-4"></div>
                                <!-- Upload profile button -->
                                <div class="upload-btn-wrapper">
                                    <button class="btn btn-block btn-sm upload-file-btn">Update profile</button>
                                    <input type="file" name="img-profile" accept="image/*"/>
                                </div>
                                <p class="error-file-msg"></p>
                                <div id="upload_img_rule">
                                    <p><i>Max file size: 10 MB</i></p>
                                    <p><i>Only format: JPEG, PNG</i></p>
                                </div>
                            </div>
                        </div>

                        <hr/>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label">
                                        <input type="checkbox" id="chk_change_pwd">
                                        <span class="lbl"> Thay đổi mật khẩu</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="change_pass_panel">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="old_pass">Mật khẩu cũ</label>

                                <div class="col-sm-9">
                                    <input type="password" id="old_pass" name="old_pass"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="new_pass">Mật khẩu mới</label>

                                <div class="col-sm-9">
                                    <input type="password" id="new_pass" name="new_pass"/>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="confirm_pass">Xác thực</label>

                                <div class="col-sm-9">
                                    <input type="password" id="confirm_pass" name="confirm_pass"/>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="space-4"></div>
                        <div class="space"></div>
                        <h4 class="header blue bolder smaller"><i class="fa fa-phone" aria-hidden="true"></i>
                            Liên hệ</h4>

                        <div class="form-group" id="email_area">
                            <label class="col-sm-3 control-label no-padding-right" for="email">Email</label>

                            <div class="col-sm-9">
                                <span class="input-icon">
                                    <input type="email" name="email"
                                           value="<?php echo $user['User']['email'];?>"/>
                                    <i class="ace-icon fa fa-envelope"></i>
                                </span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="phone">Số điện thoại</label>

                            <div class="col-sm-9 phone-area">
                                <span class="input-icon">
                                    <input class="input-medium input-mask-phone" type="text" id="phone"
                                           name="phone" value="<?php echo $user['User']['phone'];?>"/>
                                    <i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit" id="update_profile_btn">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Save
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


