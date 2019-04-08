<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div>
            <div id="user-profile-2" class="user-profile">
                <div class="tabbable">
                    <ul class="nav nav-tabs padding-16">
                        <li class="active">
                            <a data-toggle="tab" href="#home">
                                <i class="green ace-icon fa fa-user bigger-125"></i>
                                <?php echo $user['User']['name']?>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content no-border padding-24">
                        <div id="home" class="tab-pane active">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 center">
									<span class="profile-picture">
										<img class="editable img-responsive" alt="avatar" width='200px' height='200px'
                                            src="/img/user-icon.png"/>
									</span>

                                    <div class="space space-4"></div>

                                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'edit', $user['User']['id']]); ?>"
                                        class="btn btn-sm btn-block btn-success">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-110"></i>
                                        <span class="bigger-110">Chỉnh sửa thông tin khách hàng</span>
                                    </a>

                                    <div class="space space-4"></div>

                                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'delete', $user['User']['id']]); ?>"
                                        class="btn btn-sm btn-block btn-danger">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-110"></i>
                                        <span class="bigger-110">Xoá tài khoản</span>
                                    </a>
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-sm-9">
                                    <div class="profile-user-info">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Họ và tên</div>

                                            <div class="profile-info-value fullname-txt-field">
                                                <span><?php echo $user['User']['name'].' '.$user['User']['f_name']?></span>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Giới tính</div>

                                            <div class="profile-info-value">
                                                <span><?php echo $user['User']['gender']; ?></span>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Email</div>

                                            <div class="profile-info-value">
                                                <span><?php echo $user['User']['email']; ?></span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Điện thoại</div>

                                            <div class="profile-info-value">
                                                <span><?php echo $user['User']['phone']; ?></span>
                                            </div>
                                        </div>

                                    </div>




                                </div><!-- /.col -->
                            </div><!-- /.row -->

                            <div class="space-20"></div>


                        </div><!-- /#home -->

                    </div>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->







