<div class="row user-add-basic">
    <div class="col-xs-12 add-user-pg-header">
        <h4>Basic Information</h4>
        <div>
            <small>All (*) fields are necessary</small>
        </div>

        <form class="form-horizontal" id="validation-form" method="post">

            <div class="space-20"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email Address <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="email" name="email" id="email" class="col-xs-12 col-sm-4" />
                    </div>
                    <div class="existed_email_err"></div>
                </div>
            </div>

            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="fullname">Fullname <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="text" id="fullname" name="fullname" class="col-xs-12 col-sm-4" />
                    </div>
                </div>
            </div>

            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="password" name="password" id="password" class="col-xs-12 col-sm-4" />
                    </div>
                </div>
            </div>

            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Confirm Password</label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="password" name="password2" id="password2" class="col-xs-12 col-sm-4" />
                    </div>
                </div>
            </div>
            <div class="space-10"></div>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="position">Position <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <select class="col-xs-12 col-sm-4" name="position_id" id="position_id"
                                data-placeholder="Choose a position...">
                            <option value="">Choose a position...</option>
                                <option value="Admin">Admin</option>
                                <option value="Admin">Customer</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="space-10"></div>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="role">Role <span class="mark-star-fields">*</span></label>

                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <select class="col-xs-12 col-sm-4" name="role_id" id="role_id"
                                data-placeholder="Choose a role...">
                            <option value="">Choose a role...</option>
                            <option value="Admin">Admin</option>
                            <option value="Admin">User</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="space-10"></div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info user-add-btn" data-last="Finish">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn user-reset-btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div><!-- /.col -->
</div><!-- /.row -->

<div id="dialog-confirm" class="hide">
    <div class="alert alert-info bigger-110">
        These items will be permanently deleted and cannot be recovered.
    </div>

    <div class="space-6"></div>

    <p class="bigger-110 bolder center grey">
        <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
        Are you sure?
    </p>
</div><!-- #dialog-confirm -->
