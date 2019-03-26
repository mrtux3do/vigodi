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
                                User Info
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#view_contract">
                                <i class="green ace-icon fa fa-book bigger-125"></i>
                                My Contract
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content no-border padding-24">
                        <div id="home" class="tab-pane active">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 center">
									<span class="profile-picture">
										<img class="editable img-responsive" alt="avatar" width='200px' height='200px'
                                            src="/img/product2.jpg"/>
									</span>

                                    <div class="space space-4"></div>

                                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'edit', 1]); ?>"
                                        class="btn btn-sm btn-block btn-success">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-110"></i>
                                        <span class="bigger-110">Edit profile</span>
                                    </a>

                                    <div class="space space-4"></div>
                                    <a href="#" class="btn btn-sm btn-block btn-primary">
                                        <i class="ace-icon fa fa-envelope-o bigger-110"></i>
                                        <span class="bigger-110">Send Mail</span>
                                    </a>

                                </div><!-- /.col -->

                                <div class="col-xs-12 col-sm-9">
                                    <div class="profile-user-info">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Fullname</div>

                                            <div class="profile-info-value fullname-txt-field">
                                                <span>NGUYEN THI LAN ANH</span>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Position</div>

                                            <div class="profile-info-value">
                                                <span>Developer</span>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Date Of Birth</div>

                                            <div class="profile-info-value">
                                                <span class="label label-warning">Updating...</span>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Gender</div>

                                            <div class="profile-info-value">
                                                <span>Female</span>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Email</div>

                                            <div class="profile-info-value">
                                                <span>abc@gmail.com</span>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name"> Phone</div>

                                            <div class="profile-info-value">
                                                <span><?php echo $user['users']['phone'] != '' ? : '<span class="label label-warning">Updating...</span>'; ?></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="hr hr-8 dotted"></div>

                                    <div class="profile-user-info">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name">
                                                <i class="middle ace-icon fa fa-instagram bigger-150 red"></i>
                                            </div>

                                            <div class="profile-info-value">
                                                <a href="#" target="_blank">Find me on Instargram</a>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name">
                                                <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                                            </div>

                                            <div class="profile-info-value">
                                                <a href="#" target="_blank">Find me on Facebook</a>
                                            </div>
                                        </div>

                                        <div class="profile-info-row">
                                            <div class="profile-info-name">
                                                <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
                                            </div>

                                            <div class="profile-info-value">
                                                <a href="#" target="_blank">Follow me on Twitter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                            <div class="space-20"></div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="widget-box transparent">
                                        <div class="widget-header widget-header-small">
                                            <h4 class="widget-title smaller">
                                                <i class="ace-icon fa fa-check-square-o bigger-110"></i>
                                                Little About Member
                                            </h4>
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <?php echo $user['users']['bio']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /#home -->

                        <div id="view_contract" class="tab-pane">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <?php if (AuthComponent::user('role_id') == 1 || AuthComponent::user('id') == $user['users']['id']): ?>
                                        <?php if ($user['users']['contract_id'] != '') { ?>
                                        <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Fullname </div>

                                                <div class="profile-info-value fullname-txt-field">
                                                    <span><?php echo $user['users']['fullname']; ?></span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Date Of Birth </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo ($user['users']['date_of_birth'] != '') ? $user['users']['date_of_birth'] : '<span class="label label-warning">Updating...</span>' ; ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Gender </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $user['users']['gender'] == 0 ? 'Male' : 'Female'; ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Position </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $user['positions']['name']; ?></span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Status </div>

                                                <div class="profile-info-value">
                                                    <?php if ($user['users']['status_id'] == 1) { ?>
                                                        <span class="label label-danger"><?php echo $user['status']['name'] ?></span>
                                                    <?php } elseif ($user['users']['status_id'] == 2) { ?>
                                                        <span class="label label-success"><?php echo $user['status']['name'] ?></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Created at </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo date("d/m/Y H:i:s", strtotime($user['contracts']['created_at'])); ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Last updated </div>


                                                <div class="profile-info-value">
                                                    <?php if ($user['contracts']['updated_at'] != '') { ?>
                                                        <span><?php echo date("d/m/Y H:i:s", strtotime($user['contracts']['updated_at'])); ?></span>
                                                    <?php } else { ?>
                                                        <span><?php echo date("d/m/Y H:i:s", strtotime($user['contracts']['created_at'])); ?></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Job Type</div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $user['job_types']['name']; ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Salary </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo number_format($user['contracts']['salary']); ?> VND</span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Certificate </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo ($user['certificates']['name'] != NULL) ? : "NO"; ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Date start </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo date("d/m/Y", strtotime($user['contracts']['date_start'])); ?></span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Date end </div>

                                                <div class="profile-info-value">
                                                    <?php if (!empty($user['contracts']['date_end'])) { ?>
                                                        <span><?php echo date("d/m/Y", strtotime($user['contracts']['date_end'])); ?></span>
                                                    <?php } else { ?>
                                                        <span class="label label-warning">Updating ...</span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } else { ?>
                                            <div class="alert alert-warning">Waiting for your contract...</div>
                                        <?php } ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->







