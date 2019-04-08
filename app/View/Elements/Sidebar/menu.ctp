<?php
$controller = !empty($this->params['controller']) ? $this->params['controller'] : "";
$action = !empty($this->params['action']) ? $this->params['action'] : "";
?>

<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
    <!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts"></div> -->
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
      <li id="dashboard">
            <a href="/">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text">Trang chủ</span>
            </a>
            <b class="arrow"></b>
        </li>

        <!-- User -->
        <li class="<?php echo ($controller == "users") ? 'active open' : '';?>">
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Quản Lý Người Dùng </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php echo ($controller == "users" && $action == 'index') ? 'active' : '';?>">
                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'index']); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php echo ($controller == "users" && $action == 'add') ? 'active' : '';?>">
                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'add']); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tạo mới
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        <!-- Product -->
        <li class="<?php echo ($controller == "products") ? 'active open' : '';?>">
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">Quản Lý Sản Phẩm</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php echo ($controller == "products" && $action == 'listProductAdmin') ? 'active' : '';?>">
                    <a href="<?php echo $this->Html->url(['controller' => 'products', 'action' => 'listProductAdmin']); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php echo ($controller == "products" && $action == 'addProduct') ? 'active' : '';?>">
                    <a href="<?php echo $this->Html->url(['controller' => 'products', 'action' => 'addProduct']); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tạo mới
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <!-- Order -->
        <li class="<?php echo ($controller == "admin") ? 'active open' : '';?>">
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">Quản Lý Đơn Hàng</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php echo ($controller == "admin" && $action == 'listCart') ? 'active' : '';?>">
                    <a href="<?php echo $this->Html->url(['controller' => 'admin', 'action' => 'listCart']); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

    </ul><!-- /.nav-list -->
</div>
