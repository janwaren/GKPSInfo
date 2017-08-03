<?php

namespace frontend\models;

use Yii;

use common\models\User;

/**
 * This is the model class for table "user_status".
 *
 * @property integer $id
 * @property string $user_status_name
 * @property integer $user_status_value
 *
 * @property User[] $users
 */
class UserStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_status_name', 'user_status_value'], 'required'],
            [['user_status_value'], 'integer'],
            [['user_status_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_status_name' => 'Status Name',
            'user_status_value' => 'Status Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_status_id' => 'id']);
    }
}
