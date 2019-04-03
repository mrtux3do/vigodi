
<div class="col-xs-6 col-sm-4 col-md-2">
    <?php foreach($users as $user): ?>
        <div class="thumbnail search-thumbnail user-list">
            <!-- Position -->
            <span class="search-promotion label label-success arrowed-in arrowed-in-right">
                <?php echo $user['User']['roleName']; ?>
            </span>

            <!-- Avatar -->
            <img class="media-object" src="img/tv-smart.jpg" />
            <div class="caption">
                <!-- Age -->
                <div class="clearfix">
                    <span class="pull-right label label-grey info-label">
                            <strong>Phone: </strong> <?php echo $user['User']['phone']; ?>
                    </span>
                </div>
                <!-- Fullname -->
                <h3 class="search-title">
                    <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'profile', 1]); ?>" class="blue">
                    <?php echo $user['User']['name'] . ' ' . $user['User']['f_name']; ?></a>
                </h3>
                <!-- Email -->
                <p><?php echo $user['User']['email']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
