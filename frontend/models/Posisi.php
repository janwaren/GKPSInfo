<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "posisi".
 *
 * @property integer $id
 * @property string $posisi
 *
 * @property Karir[] $karirs
 * @property KarirExternal[] $karirExternals
 * @property LevelJemaat[] $levelJemaats
 */
class Posisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['posisi'], 'required'],
            [['posisi'], 'string', 'max' => 100],
            [['posisi'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'posisi' => 'Posisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirs()
    {
        return $this->hasMany(Karir::className(), ['posisi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirExternals()
    {
        return $this->hasMany(KarirExternal::className(), ['posisi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevelJemaats()
    {
        return $this->hasMany(LevelJemaat::className(), ['posisi_id' => 'id']);
    }
}
