<?php
/**
 * Comment model.
 *
 */

App::uses('Model', 'Model');

class Comment extends AppModel
{
    public $useTable = "t_comment";

    public $belongsTo = array(
            "User" => array(
                    "className" => "User",
                    "foreignKey" => "user_id"
            )
    );
}
