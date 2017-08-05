<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "status_jemaat".
 *
 * @property integer $id
 * @property string $status
 *
 * @property Jemaat[] $jemaats
 */
class StatusJemaat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_jemaat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaats()
    {
        return $this->hasMany(Jemaat::className(), ['status_jemaat_id' => 'id']);
    }
}
