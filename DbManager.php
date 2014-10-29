<?php

namespace usefulweb;

use \yii\db\Query;

class DbManager extends yii\rbac\DbManager
{
    public function removeUserRole($user_id,$roleName)
    {
        $users = is_array($user_id) ? $user_id : [$user_id];
        $roles = is_array($roleName) ? $roleName : [$roleName];
        
        $query = new Query;
        $query
        ->createCommand()
        ->delete($this->assignmentTable,['item_name' => $roleName,'user_id'=>$users])
        ->execute();
    }
}