<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        Vigodi | <?php echo $this->fetch('title'); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!-- CSS -->
    <?php
    echo $this->Html->meta('icon', 'img/oassist_logo.png');

    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('font-awesome/4.5.0/css/font-awesome.min');

    echo $this->Html->css('jquery.gritter.min');
    echo $this->Html->css('bootstrap-editable.min');

    echo $this->Html->css('fonts.googleapis.com');

    echo $this->Html->css('bootstrap-datepicker3.min');
    echo $this->Html->css('ace-skins.min');
    echo $this->Html->css('ace.min');
    echo $this->Html->css('ace-rtl.min');
    echo $this->Html->css('jquery-ui.min');
    //echo $this->Html->css('style');

    echo $this->fetch('css');
    ?>

    <!-- JS -->
    <?php
    echo $this->Html->script('jquery-2.1.4.min');
    echo $this->Html->script('jquery-ui.min');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('bootstrap-datepicker.min');
    echo $this->Html->script('ace-extra.min');
    echo $this->Html->script('jquery.gritter.min');
    echo $this->Html->script('bootstrap-editable.min');
    echo $this->Html->script('ace-editable.min');
    echo $this->Html->script('jquery.maskedinput.min');
    echo $this->Html->script('bootstrap-datepicker.min');
    echo $this->Html->script('ace-elements.min');
    echo $this->Html->script('ace.min');
    echo $this->Html->script("wizard.min");
    echo $this->Html->script("jquery.validate.min");
    echo $this->Html->script("jquery-additional-methods.min");
    echo $this->Html->script("bootbox");
    echo $this->Html->script("jquery.maskedinput.min");
    echo $this->Html->script("select2.min");
    ?>
</head>
<body class="no-skin">
<!-- Header -->
<?php echo $this->element('Header/navbar'); ?>
<!-- Content -->
<div class="main-container ace-save-state" id="main-container">
    <!--Sidebar menu -->
    <?php echo $this->element('Sidebar/menu'); ?>
    <div class="main-content">
        <div class="main-content-inner">
            <?php echo $this->element('breadcrumb'); ?>
            <!-- /.breadcrumb -->
            <div class="page-content">
                <?php echo $this->element('Header/page_header'); ?>
                <!-- /.page-header -->
                <?php echo $this->fetch('content'); ?>
                <!-- /.content -->
            </div>
            <!-- /.page-content -->
        </div>

    </div>
</div>
<!-- Footer -->
<?php echo $this->element('Footer/footer'); ?>

<!-- JS -->
<?php
// custom
echo $this->Html->script('main');

echo $this->fetch('script');
?>
</body>
</html>
