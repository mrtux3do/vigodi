<?php if (!empty($commons['breadcrumbs'])): ?>
    <div class="breadcrumbs ace-save-state" style="height: 39px" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo $this->Html->url([
                    'controller' => 'users',
                    'action' => 'index',
                ]); ?>" title="TOP">Trang chủ</a>
            </li>
            <?php foreach ($commons['breadcrumbs'] as $value): ?>
                <?php if (!empty($value[1])): ?>
                    <li><a href="<?php echo $this->Html->url($value[1]); ?>"
                           title="<?php echo $value[0]; ?>"><?php echo $value[0]; ?></a></li>
                <?php else: ?>
                    <li class="active"><?php echo $value[0]; ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>