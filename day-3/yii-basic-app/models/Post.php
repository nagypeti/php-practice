<?php

namespace  app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord {

    public function rules() {
        return [
            ['title', 'required'],
            ['content', 'url'],
            ['likes', 'default', 'value'=>'0']
        ];
    }

}

?>