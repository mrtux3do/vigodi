<?php

App::uses('Model', 'Model');

class Role extends AppModel {
	var $name = 'Role' ;
    var $useTable = 'm_user_role';
}
