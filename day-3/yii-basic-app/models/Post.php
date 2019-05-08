<?php

namespace  app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord {

    public function rules() {
        return [
            [['title', 'content'], 'required'],
            ['likes', 'default', 'value'=>'0']
        ];
    }

}

?>