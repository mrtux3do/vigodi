<?php
$controller = !empty($this->params['controller']) ? $this->params['controller'] : "";
$action = !empty($this->params['action']) ? $this->params['action'] : "";
?>

<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
    <!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts"></div> -->

    <ul class="nav nav-list">
      <li id="dashboard">
            <a href="/">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text">Trang chủ</span>
            </a>
            <b class="arrow"></b>
        </li>

        <!-- User -->
        <li class="<?php echo ($controller == "users" && ($action == 'index' || $action == 'add')) ? 'active open' : '';?>">
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Quản Lý Người Dùng </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php echo ($controller == "users" && $action == 'add') ? 'active' : '';?>">
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
                <li class="<?php echo ($controller == "products" && $action == 'index') ? 'active' : '';?>">
                    <a href="<?php echo $this->Html->url(['controller' => 'products', 'action' => 'index']); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php echo ($controller == "products" && $action == 'add') ? 'active' : '';?>">
                    <a href="<?php echo $this->Html->url(['controller' => 'products', 'action' => 'add']); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tạo mới
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <!-- Order -->
        <li class="<?php echo ($controller == "categories" && $action == '') ? 'active' : '';?>">
            <a href="<?php echo $this->Html->url(['controller' => 'categories', 'action' => '']); ?>">
                <i class="menu-icon fa fa-exchange"></i>
                <span class="menu-text">Đơn Hàng</span>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php echo ($controller == "categories" && $action == '') ? 'active' : '';?>">
                    <a href="<?php echo $this->Html->url(['controller' => 'categories', 'action' => '']); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php echo ($controller == "categories" && $action == '') ? 'active' : '';?>">
                    <a href="<?php echo $this->Html->url(['controller' => 'categories', 'action' => '']); ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tạo mới
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

    </ul><!-- /.nav-list -->
</div>
