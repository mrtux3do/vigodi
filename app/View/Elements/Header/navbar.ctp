<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">

        <div class="navbar-header pull-left">
            <a href="index.html" class="navbar-brand">
                <small>
                    <div style="color: red; font-weight: bold;">Vi<span style="color: green">Go</span>Di <span style="color: white">Admin</span></div>
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="/img/user-icon.png" alt="Jason's Photo" />
                        <span class="user-info">
                                <small>Xin chào,</small> <?php echo $infoUser['name'];?>
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="/Auth/logout">
                                <i class="ace-icon fa fa-power-off"></i>Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
