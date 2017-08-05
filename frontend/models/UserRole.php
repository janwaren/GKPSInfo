<?php

namespace frontend\models;

use Yii;

use common\models\User;

/**
 * This is the model class for table "user_role".
 *
 * @property integer $id
 * @property string $user_role_name
 * @property integer $user_role_value
 *
 * @property User[] $users
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_role_name', 'user_role_value'], 'required'],
            [['user_role_value'], 'integer'],
            [['user_role_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_role_name' => 'Role Name',
            'user_role_value' => 'Role Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_role_id' => 'id']);
    }
}
