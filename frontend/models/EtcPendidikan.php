<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "etc_pendidikan".
 *
 * @property integer $id
 * @property string $jenjang_pendidikan
 *
 * @property JemaatDemografi[] $jemaatDemografis
 */
class EtcPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenjang_pendidikan'], 'required'],
            [['jenjang_pendidikan'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenjang_pendidikan' => 'Jenjang Pendidikan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatDemografis()
    {
        return $this->hasMany(JemaatDemografi::className(), ['mayoritas_pendidikan' => 'id']);
    }
}
