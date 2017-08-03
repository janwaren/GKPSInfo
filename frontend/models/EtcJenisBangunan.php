<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "etc_jenis_bangunan".
 *
 * @property integer $id
 * @property string $jenis_bangunan
 *
 * @property JemaatAsetBangunan[] $jemaatAsetBangunans
 */
class EtcJenisBangunan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_jenis_bangunan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_bangunan'], 'required'],
            [['jenis_bangunan'], 'string', 'max' => 30],
            [['jenis_bangunan'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_bangunan' => 'Jenis Bangunan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatAsetBangunans()
    {
        return $this->hasMany(JemaatAsetBangunan::className(), ['jenis_bangunan_id' => 'id']);
    }
}
