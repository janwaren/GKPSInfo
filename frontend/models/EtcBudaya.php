<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "etc_budaya".
 *
 * @property integer $id
 * @property string $nama_budaya
 *
 * @property JemaatDemografi[] $jemaatDemografis
 */
class EtcBudaya extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_budaya';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_budaya'], 'required'],
            [['nama_budaya'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_budaya' => 'Nama Budaya',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatDemografis()
    {
        return $this->hasMany(JemaatDemografi::className(), ['mayoritas_budaya' => 'id']);
    }
}
