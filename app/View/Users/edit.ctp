<div class="row">
    <div class="col-xs-12 col-sm-12">
        <form class="form-horizontal" action="/users/edit/1" method="POST"
              enctype="multipart/form-data" id="editUserFrm">
            <div class="tabbable">
                <ul class="nav nav-tabs padding-16">
                    <li class="active">
                        <a data-toggle="tab" href="#edit-basic">
                            <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
                            User Info
                        </a>
                    </li>
                </ul>
                <div class="tab-content profile-edit-tab-content">
                    <div id="edit-basic" class="tab-pane in active">
                        <h4 class="header blue bolder smaller"><i class="fa fa-cubes" aria-hidden="true"></i>
                            General</h4>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="fullname">Fullname</label>

                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" name="fullname"
                                               id="fullname" placeholder="Fullname"
                                               value="Nguyen Thi Lan Anh"/>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="bio">Introduce
                                        yourself</label>

                                    <div class="col-sm-8">
                                        <textarea class="col-xs-12 col-sm-10" rows="5" type="textarea"
                                                  name="bio" id="bio"
                                                  placeholder="Introduce yourself">My nam is Lan Anh. I'm 26 years old.</textarea>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="date">Birth
                                        Date</label>

                                    <div class="col-sm-8">
                                        <div class="input-medium" id="birthday_area">
                                            <div class="input-group">
                                                <input class="input-medium date-picker" id="date_of_birth"
                                                       type="text" data-date-format="yyyy-mm-dd"
                                                       placeholder="yyyy-mm-dd"
                                                       value="25/10/1993"
                                                       name="date_of_birth"/>
                                                <span class="input-group-addon">
                                                    <i class="ace-icon fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right">Gender</label>

                                    <div class="col-sm-8 gender-area">
                                        <label class="inline">
                                            <input name="gender" type="radio" class="ace"
                                                   value="0" checked/>
                                            <span class="lbl middle"> Male</span>
                                        </label>
                                        &nbsp; &nbsp; &nbsp;
                                        <label class="inline">
                                            <input name="gender" type="radio" class="ace"
                                                   value="1"/>
                                            <span class="lbl middle"> Female</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="position">Position</label>
                                    <div class="col-sm-3">
                                        <select name="position_id" id="position" class="form-control">
                                            <option value="">--- Choose ---</option>
                                            <option value="Developer" selected> Developer </option>
                                            <option value="Developer"> Admin HR </option>
                                            <option value="Developer"> Manager </option>
                                        </select>
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
                                         src="/img/headphone.jpg" id="img-profile"/>
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
                                        <span class="lbl"> Change password</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="change_pass_panel">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="old_pass">Old
                                    Password</label>

                                <div class="col-sm-9">
                                    <input type="password" id="old_pass" name="old_pass"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="new_pass">New
                                    Password</label>

                                <div class="col-sm-9">
                                    <input type="password" id="new_pass" name="new_pass"/>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="confirm_pass">Confirm
                                    Password</label>

                                <div class="col-sm-9">
                                    <input type="password" id="confirm_pass" name="confirm_pass"/>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="space-4"></div>
                        <div class="space"></div>
                        <h4 class="header blue bolder smaller"><i class="fa fa-phone" aria-hidden="true"></i>
                            Contact</h4>

                        <div class="form-group" id="email_area">
                            <label class="col-sm-3 control-label no-padding-right" for="email">Email</label>

                            <div class="col-sm-9">
                                <span class="input-icon">
                                    <input type="email" name="email"
                                           value="abc@gmail.com"/>
                                    <i class="ace-icon fa fa-envelope"></i>
                                </span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="phone">Phone</label>

                            <div class="col-sm-9 phone-area">
                                <span class="input-icon">
                                    <input class="input-medium input-mask-phone" type="text" id="phone"
                                           name="phone" value="0123456789"/>
                                    <i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
                                </span>
                            </div>
                        </div>

                        <div class="space"></div>
                        <h4 class="header blue bolder smaller"><i class="fa fa-share-square"
                                                                  aria-hidden="true"></i> Social</h4>

                        <div class="form-group social-link">
                            <label class="col-sm-3 control-label no-padding-right" for="facebook">Facebook</label>

                            <div class="col-sm-9">
                                <span class="input-icon">
                                    <input type="text" id="facebook"
                                           value="Okita"
                                           placeholder="https://facebook.com" name="facebook"/>
                                    <i class="ace-icon fa fa-facebook blue"></i>
                                </span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group social-link">
                            <label class="col-sm-3 control-label no-padding-right" for="twitter">Twitter</label>

                            <div class="col-sm-9">
                                <span class="input-icon">
                                    <input type="text" placeholder="https://twitter.com"
                                           value="Killua_1007" id="twitter"
                                           name="twitter"/>
                                    <i class="ace-icon fa fa-twitter light-blue"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group social-link">
                            <label class="col-sm-3 control-label no-padding-right" for="instagram">Instagram</label>

                            <div class="col-sm-9">
                                <span class="input-icon">
                                    <input type="text" id="instagram"
                                           value="Okita"
                                           placeholder="https://instagram.com" name="instagram"/>
                                    <i class="ace-icon fa fa-instagram blue"></i>
                                </span>
                            </div>
                        </div>

                        <div class="space-4"></div>
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


